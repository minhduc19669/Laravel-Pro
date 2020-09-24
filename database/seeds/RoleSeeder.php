<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'SupperAdmin',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản lí sản phẩm',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản trị thương hiệu',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản lí vận chuyển',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản lí Sale',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản trị Slide',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản trị danh mục',
        ]);
    }
}
