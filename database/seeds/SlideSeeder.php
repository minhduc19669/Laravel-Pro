<?php

use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('slide')->insert([
            'slide_image' => 'debih141.jpg',
            'slide_desc'  => 'asdsa',
            'slide_status' => '1'

        ]);
    }
}
