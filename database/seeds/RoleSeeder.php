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
            'nick_name'=>'admin'
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản lí sản phẩm',
            'nick_name' => 'product'
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản trị thương hiệu',
            'nick_name' => 'brand'
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản lí vận chuyển',
            'nick_name' => 'transpost'
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản lí Sale',
            'nick_name' => 'sale'
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản trị Slide',
            'nick_name' => 'slide'
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Quản trị danh mục',
            'nick_name' => 'category'
        ]);
    }
}
