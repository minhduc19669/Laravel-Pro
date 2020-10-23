<?php

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
        //
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'ADMIN@gmail.com',
            'phone'=>"0982047922",
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'phone' => "0971801262",
            'password' => Hash::make('123456'),
        ]);
    }
}
