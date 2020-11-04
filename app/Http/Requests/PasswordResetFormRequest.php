<?php

namespace App\Http\Requests;

use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class PasswordResetFormRequest extends FormRequest
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
        ];
    }

    /**
     * Handle the process of resetting password
     *
     * @return
     */
    public function handle()
    {
        $user = \App\User::where('email', $this->email)->firstOrFail();

        $user->update([
            'auth_token' => custom_unique_number(4)
        ]);

        Mail::to($user)->send(new PasswordReset($user));

        return $user;
    }
}
