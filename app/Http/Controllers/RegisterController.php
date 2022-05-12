<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'register',
            'active' => 'register'
        ]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name'      => 'required|max:255',
                'username'  => ['required', 'min:3', 'max:255', 'unique:users'], //contoh bisa pakai syntax array
                'email'     => 'required|unique:users|email:dns|max:255',
                'password'  => 'required|min:5|max:255',
            ]);

        //enkripsi dengan bcrypt
        // $validatedData['password'] = bcrypt($validatedData['password']);

        //enkripsi dengan bcrypt hash note:butuh facade
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        
        // $request->session()->flash('success', 'Registration successful!'); pesan register sukses tanpa 'with'
        
        return redirect('/login')->with('success', 'Registration successful! Please Login');
  
    }
}
