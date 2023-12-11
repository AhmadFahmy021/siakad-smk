<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Strings;

class UserController extends Controller
{
    //
    public function index(){
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }
    public function role(Request $request) {
        $data = User::find($request->id);
        $data->update([
            'role' => $request->role,
        ]);
        return json_encode(User::all());
    }

    public function store(Request $request)  {
        $valid = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'role' => 'required',
        ]);
        $valid['password'] = Hash::make($valid['password']);
        User::create($valid);
        return redirect('admin/users');

    }
}
