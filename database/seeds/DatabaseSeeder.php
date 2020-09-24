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
        // $this->call(UserSeeder::class);
=======
        $this->call([
            UserSeeder::class,
            RoleSeeder::class
        ]);
>>>>>>> 69558efc04f36b30aa6bbeed4512b91261b27542
    }
}
