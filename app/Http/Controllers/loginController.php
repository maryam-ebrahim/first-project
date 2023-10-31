<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class loginController extends Controller
{
  // function to view the login page
  public function create()
  {
    return view('/login');
  }

  public function authenticate(LoginRequest $request): RedirectResponse
  {
    // checks if entered request data is correct and if user is authenticated . value true | false
    $check = Auth::attempt([
      'email' => $request->email,
      'password' => $request->password
    ]);


    if ($check) {

      // generates new session when logging in
      $request->session()->regenerate();

      return redirect('/');
    } else {
      dd('failed');
    }
  }

  // logs out and destroys the session
  public function destroy()
  {
    auth()->logout();

    return redirect('/login_form');
  }
}
