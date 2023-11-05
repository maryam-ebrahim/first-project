<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use App\Helpers\HttpStatusCodes;
use App\Models\User;

class registerController extends Controller
{
  public function create()
  {
    return view('/register');
  }

  public function store(RegisterRequest $request, RegisterService $registerService): JsonResponse
  {
    try {
      $user = $registerService->registerationDetails($request->validated());
    } catch (\Exception $exception) {
      return $this->response->error('', $exception->getMessage(), HttpStatusCodes::HTTP_BAD_REQUEST);
    }
    
    return $this->response->success('', $user);
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