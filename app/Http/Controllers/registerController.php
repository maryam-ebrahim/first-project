<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class registerController extends Controller
{
  public function create()
  {
    return view('/register');
  }

  public function store(RegisterRequest $request): RedirectResponse
  {
    /// hashing the password before saving it to the database
    $hashedPassword = Hash::make($request->password);

    // creating new user
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $hashedPassword
    ]);

    auth()->login($user);

    return redirect('/login_form');

  }
}



// public function store(Request $request): RedirectResponse
// {
//   $name = $request->input('name');
//   $email = $request->input('email');
//   $password = $request->input('password');
//   $confirmPassword = $request->input('confirmPassword');;

//   if ($confirmPassword != $password) {
//     return back()->withErrors('message', 'passwords does not match');
//   };

//   $hashedPassword = Hash::make($password);

//   $user = User::create([$name, $email, $hashedPassword]);

//   auth()->login($user);

//   return redirect('/');
// }