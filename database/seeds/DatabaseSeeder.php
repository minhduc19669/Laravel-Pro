<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        // $this->call(UserSeeder::class);
=======
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
        $this->call([
            UserSeeder::class,
            RoleSeeder::class
        ]);
<<<<<<< HEAD
=======
>>>>>>> 69558efc04f36b30aa6bbeed4512b91261b27542
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
    }
}
