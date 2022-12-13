<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ThreadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('home.threads.my-threads.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validaciones
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'unique:threads,title'],
            'description' => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'max:1048'],
            'category_id' => ['required'],
            'user_id' => ['required']
        ]);

        if ($request->file('image')) {
            // guardar archivo en disco y guardar registro en base de datos img
            // devuelve videos/ nombre.png
            $imagen = $request->image->store('images-threads');

            Thread::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagen,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
            ]);
        } else {
            Thread::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
            ]);
        }

        $user = Auth::user();

        return redirect()->route('threads.mythreads', $user)->with('info', 'Thread created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('home.threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        $categories = Category::all();
        return view('home.threads.my-threads.edit', compact('thread', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
         // validaciones
         $request->validate([
            'title' => ['required', 'string', 'min:3', 'unique:threads,title,'.$thread->id],
            'description' => ['required', 'string', 'min:10'],
            'image' => ['nullable', 'image', 'max:1048'],
            'category_id' => ['required'],
            'user_id' => ['required']
        ]);

        if ($request->file('image')) {
            // borrar la imagen antigua
            Storage::delete('public/'.$thread->image);
            // guardar archivo en disco y guardar registro en base de datos img
            // devuelve videos/ nombre.png
            $imagen = $request->image->store('images-threads');

            $thread->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagen,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
            ]);
        } else {
            $thread->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
            ]);
        }

        $user = Auth::user();

        return redirect()->route('threads.mythreads', $user)->with('info', 'Thread updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();
        return back()->with('info', 'Thread deleted');
    }

    // hilos de un usuario
    public function threadsUser(User $user)
    {
        $threads = Thread::where('user_id', $user->id)
        ->paginate(5);
    return view('home.threads-user', compact('user', 'threads'));
    }

    public function myThreads(User $user)
    {
        $threads = Thread::where('user_id', $user->id)
        ->paginate(5);
        return view('home.threads.my-threads.index', compact('user', 'threads'));
    }

    // hilos de una categoria
    public function threadsCategory(Category $category)
    {
        $threads = Thread::orderBy('id', 'desc');
        return view('home.threads-category', compact('category', 'threads'));
    }
}
