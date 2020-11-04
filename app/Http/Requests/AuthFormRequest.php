<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthFormRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    /**
     * Handle the authencating new user
     * @return
     */
    public function handle()
    {
        $user = \App\User::where('email', trim($this->email))->firstOrFail();

        //compare password
        if (! Hash::check(trim($this->password), $user->password) ) {
            throw new \Exception('Sorry, your email and/or password is incorrect.');
        }

        if (empty($user->email_verified_at)) {
            throw new \Exception('Email not yet verified.');
        }

        $user->update([
            'auth_token' => custom_unique('AUTH_TOKEN'),
        ]);

        Auth::login($user, true);

        //tell  admin, limit reached and we cannot read user data
        return $user;
    }
}
