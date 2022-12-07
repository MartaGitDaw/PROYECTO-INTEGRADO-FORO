<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(){
        //$users = User::all();
        // obtener todos los usuarios menos el de administrador
        $users = User::whereNotIn('name', ['admin'])->get();
        $roles = Role::whereNotIn('name', ['admin'])->get();
        
        return view('admin.user.index', compact('users', 'roles'));
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
        return to_route('admin.user.index')->with('info', 'Rol assign.');
    }

    public function removeRole(User $user, Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
            return to_route('admin.user.index')->with('info', 'Rol removed.');
        }

        return back()->with('info', 'Rol not exists.');
    }

    public function threadsUser(User $user){
        $threads = Thread::all();
        return view('home.threads-user', compact('user', 'threads'));
    }

    public function viewUsers(){
        $users = User::whereNotIn('name', ['admin'])->get();
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('home.users', compact('users', 'roles'));
    }

}
