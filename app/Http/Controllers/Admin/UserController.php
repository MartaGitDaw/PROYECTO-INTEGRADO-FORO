<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(Request $request){
        // obtener todos los usuarios menos el de administrador
        $users = User::whereNotIn('name', ['admin'])
        ->name($request->name)
        ->paginate(6);
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.user.index', compact('users', 'roles'));
    }

    public function show(User $user){
        $threads = Thread::all();
        return view('home.users.show', compact('user', 'threads'));
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('info', 'User deleted');
    }

    public function assignRole(User $user){
        if($user->hasRole('moderator')){
            // El rol ya existe
            return back()->with('info', 'Rol alredy exists.');
            // return back();
        }
        $user->assignRole('moderator');
        return back()->with('info', 'Rol assign.');
    }

    public function removeRole(User $user, Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('info', 'Rol removed.');
        }

        return back()->with('info', 'Rol not exists.');
    }

    // igual que index pero devuelve otra vista que
    // ver todos los usuarios menos el administrador
    public function viewUsers(Request $request){
        $users = User::orderBy('id')
            ->name($request->name)
            ->paginate(6);
        $roles = Role::whereNotIn('name', ['admin'])->get();
        $threads = Thread::all();
        $likes = Like::all();
        return view('home.users', compact('users', 'roles', 'threads', 'likes'));
    }

}
