<?php

namespace App\Http\Requests;

use \App\User;
use Illuminate\Foundation\Http\FormRequest;

class EmailConfirmUpdateFormRequest extends FormRequest
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
        return [];
    }

    /**
     * Handle the process of confirming email address
     * 
     * @return 
     */
    public function handle()
    {
        $user = \App\User::where('token', $this->token)->firstOrFail();

        return $user->update([
            'token' => '',
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
