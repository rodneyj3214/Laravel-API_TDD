<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /* Autenticar desde el controlador
    public function __construct(Type $var = null) {
        $this->var = $var;
    }
    */
    public function index(){
        $users = User::latest()->get();
        return view('users.index' ,['users' => $users]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> bcrypt($request->password),
        ]);
        return back();
    }
    public function destroy(User $user){
        $user->delete();
        return back();
    }
}
