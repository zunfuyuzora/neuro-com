<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'id' => "usr".date("mds").rand(000,999),
                'username' => "admin",
                'email' => "admin@neuro.com",
                'password' => Hash::make("admin"),
                'first_name' => "Admin",
                'last_name' => "Super",
                'full_name' => "Admin Super",
                'level'=>'admin',
                'bio' => "Hey, have a good day",
        ]);
        User::create([
                'id' => "usr".date("mds").rand(000,999),
                'username' => "akane123",
                'email' => "akane123@gmail.com",
                'password' => Hash::make("akane123"),
                'first_name' => "Akane",
                'last_name' => "Georgia",
                'full_name' => "Akane Georgia",
                'bio' => "Hey, have a good day",
        ]);
        User::create([
                'id' => "usr".date("mds").rand(000,999),
                'username' => "alexa123",
                'email' => "alexa@gmail.com",
                'password' => Hash::make("alexa123"),
                'first_name' => "Alexa",
                'last_name' => "Tamborine",
                'full_name' => "Alexa Tamborine",
                'bio' => "Hey, have a good day",
        ]);
    }
}
