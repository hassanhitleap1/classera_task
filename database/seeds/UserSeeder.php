<?php

use App\Model\Users\Admin;
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
       
        Admin::create([
            'name'=>"admin",
            'email'=>"admin@mail.com",
            'type'=>User::ADMIN,
            'password'=>bcrypt(123456789)
        ]);
    }
}
