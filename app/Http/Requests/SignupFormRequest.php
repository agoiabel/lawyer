<?php

namespace App\Http\Requests;

use App\Mail\Welcome;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class SignupFormRequest extends FormRequest
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
            'name' => 'required|string|max:30',
            'password' => 'required|string|max:20',
        ];
    }

    /**
     * Handle the process of storing signup
     *
     * @return
     */
    public function handle()
    {
        return $this->createNewUser();
    }

    /**
     * Handle the process of creating new user
     *
     * @return
     */
    protected function createNewUser()
    {
        $user = $this->createUser();

        Mail::to($user)->send(new Welcome($user));

        $this->createProfileFor($user);

        return $user;
    }

    /**
     * Create User
     * 
     * @return 
     */
    public function createUser()
    {
        try {
            \App\User::where('email', $this->email)->firstOrFail();
            throw new \Exception("Sorry, an account already exists with that email.");
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return \App\User::create([
                'name' => $this->name,
                'email' => $this->email,
                'role' => \App\User::CLIENT,
                'password' => $this->password,
                'token' => custom_unique_number(4),
                'auth_token' => custom_unique('AUTH_TOKEN'),
            ]);
        }
    }

    /**
     * Create user profile
     * 
     * @param $user 
     * @return        
     */
    public function createProfileFor($user)
    {
        return \App\Profile::create([
            'user_id' => $user->id,
        ]);
    }
}