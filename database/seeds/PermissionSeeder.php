<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('permissions')->insert([
            'per_name' => 'Danh sách users',
        ]);
        DB::table('permissions')->insert([
            'per_name' => 'Thêm User',
        ]);
        DB::table('permissions')->insert([
            'per_name' => 'Sửa User',
        ]);
        DB::table('permissions')->insert([
            'per_name' => 'Xóa User',
        ]);
        DB::table('permissions')->insert([
            'per_name' => 'Danh sách roles',
        ]);
        DB::table('permissions')->insert([
            'per_name' => 'Thêm roles',
        ]);
        DB::table('permissions')->insert([
            'per_name' => 'Sửa roles',
        ]);
        DB::table('permissions')->insert([
            'per_name' => 'Xóa roles',
        ]);
    }
}
