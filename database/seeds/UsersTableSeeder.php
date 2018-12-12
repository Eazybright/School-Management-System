<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'role_id' => 1,
            'active' => 1,
            'name' => 'Ezekiel',
            'username' => 'Eazybright',
            'email' => 'doneazy911@gmail.com',
            'password' => bcrypt('eze.eazy'),
            'remember_token' => str_random(10),
        ]);
    }
    
}
