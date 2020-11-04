<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN = 'ADMIN';
    const CLIENT = 'CLIENT';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'name', 'email', 'password', 'token', 'auth_token', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Handle the process of getting user resource
     *
     * @return
     */
    public function resource()
    {
        return [
            'id' => $this->id,
            'role' => $this->role,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }

    /**
     * Bcyrpt the password field before it is been saved
     *
     * @param
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = trim(bcrypt($password));
    }

    /**
     * Trim email of whitespace
     * 
     * @param 
     */
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = trim($email);
    }
}
