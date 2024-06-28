<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\Auth;
use App\Models\user;
use Illuminate\Http\Request;

class RegisController extends Controller
{
    public function index()
    {
        return view ('register.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email'=> 'required|email:users',
            'password'=> 'required|min:5'
        ]);

        User::create($validatedData);

        return redirect('/login')->with('success', 'login berhasil!!');
    }
}
