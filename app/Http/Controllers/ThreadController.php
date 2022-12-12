<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function create(User $user)
    {
        $categories = Category::all();
        return view('home.threads.my-threads.create', compact('categories', 'user'));
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
            'title'=>['required', 'string', 'min:3', 'unique:threads,title'],
            'description'=>['required', 'string', 'min:10'],
            'image'=>['image', 'max:1048'],
            'category_id'=>['required'],
            'user_id'=>['required']
        ]);
         // guardar archivo en disco y guardar registro en base de datos img
        // devuelve images-threads/ nombre.png
        $imagen = $request->image->store('images-threads');
        Thread::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imagen,
            'category_id'=>$request->category_id,
            'user_id'=>$request->user_id,
        ]);
        return redirect()->route('threads.index')->with('info', 'Thread created.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }

    // hilos de un usuario
    public function threadsUser(User $user){
        $threads = Thread::all();
        return view('home.threads-user', compact('user', 'threads'));
    }

    public function myThreads(User $user){
        $threads = Thread::all();
        return view('home.threads.my-threads.index', compact('user', 'threads'));
    }

    // hilos de una categoria
    public function threadsCategory(Category $category){
        $threads = Thread::all();
        return view('home.threads-category', compact('category', 'threads'));
    }
}
