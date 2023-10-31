<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
  public function rules(): array
  {
    return [
      'email' => ['required', 'email'],
      'password' => ['required'],
    ];
  }

  public function messages(): array
  {
    return [
      'email.required'=> 'E-mail is required',
      'email.exists' => 'The e-mail you entered does not exist',
      'password.reqired' => 'Password is required',
    ];
  }
}
