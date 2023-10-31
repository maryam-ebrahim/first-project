<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class indexController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      return view('welcome', ['name' => Auth::user()->name]);
    } else {
      return view('welcome');
    }
  }
}
