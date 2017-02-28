<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'employee_id' => '2014111401',
            'last_name' => 'DOLO',
            'first_name' => 'HECTOR',
            'username' => 'hectordolo',
            'email' => 'hectordolo@gmail.com',
            'password' => 'hectordolo',
            'sex' => 'M'
        ]);
    }
}
