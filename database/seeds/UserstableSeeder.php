<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jane Doe',
            'email' => 'test@gmail.com',
            'password' => Hash::make('test'),
            'saved' => [1,2,3,4,5]
        ]);
    }
}
