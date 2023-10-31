<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class RegisterRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules()
  {
    return [
      'name' => ['bail', 'required', 'string'],
      'email' => ['bail', 'required', 'email', 'unique:users'],
      'password' => ['bail', 'required', 'string', 'confirmed']
    ];
  }

  public function messages()
  {
    return [
      'name.required'=> 'Name is required',
      'email.exists'=> 'E-mail already exists',
      'email.required'=>'E-mail is required',
      'email.valid'=> 'The email you enterd is not valid',
      'password.required'=> 'Password is required'
    ];
  }
}
