<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class profileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('project.profile');
    }

    public function update()
    {

        $userId = auth()->id();
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required' , 'email'],
            'password' =>  ['confirmed'],
            'image'  => ['mimes:jpeg,jpg,png']
        ]);

        if(request()->has('password')){
            $data['password'] = Hash::make(request('password'));
        };

        if (request()->hasFile('image')) {
            $path = request('image')->store('users');
            $data['image'] = $path;
        };

        user::FindOrFail($userId)->update($data);

        return back();
    }
}
