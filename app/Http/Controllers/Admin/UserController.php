<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        // obtener todos los usuarios menos el de administrador
        $users = User::whereNotIn('name', ['admin'])->get();
        return view('admin.user.index', compact('users'));
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('info', 'User deleted');
    }
}
