<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required',
            'password' => 'required|confirmed',
        ];
    }

    /**
     * Handle the process of updating passsword
     *
     * @return
     */
    public function handle()
    {
        $user = \App\User::where('auth_token', $this->code)->firstOrFail();

        return $user->update([
            'auth_token' => null,
            'password' => $this->password
        ]);
    }
}
