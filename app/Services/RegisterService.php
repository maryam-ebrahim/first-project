<?php

namespace App\Services;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

/**
 * Class RegisterService.
 */
class RegisterService
{
  public function registerationDetails(array $data)
  {
    $userData = [
      'name' => $data['name'],
      'email' => $data['email'],
      'password'=> Hash::make($data['password'])
    ];

    // creating new user
    $user = User::create($userData);

    return $user;
  }
}