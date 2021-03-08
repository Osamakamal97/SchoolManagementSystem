<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Osama', 
            'last_name' => 'Kamal', 
            'email' => 'osama@example.com', 
            'mobile_number' => '0597728982', 
            'birth_date' => '25/12/1997', 
            'password' => 'password', 
        ]);
    }
}
