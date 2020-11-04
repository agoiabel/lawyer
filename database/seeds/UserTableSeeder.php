<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

    	$admin = $this->createUserType(\App\User::ADMIN, 'admin@lawyer.com', $faker->firstNameMale);
    	$client = $this->createUserType(\App\User::CLIENT, 'client@lawyer.com', $faker->firstNameMale);
    }

    /**
     * Handle the process of creating new user
     * 
     * @param $role 
     * @return 
     */
    protected function createUserType($role, $email, $name, $password = 'abc')
    {
        $user = \App\User::create([
            'role' => $role,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'auth_token' => custom_unique('AUTH_TOKEN'),
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);

		$profile = \App\Profile::create([
		    'user_id' => $user->id,
		]);

        return $user;
    }
}
