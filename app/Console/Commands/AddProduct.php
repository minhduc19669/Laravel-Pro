<?php

namespace App\Console\Commands;

use App\Brand;
use App\Product;
use Illuminate\Console\Command;

class AddProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add ok!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Brand::create([
            'brand_name'=>'big cityboy',
            'brand_desc'=>'duong anh',
            'brand_image'=>'bigcityboy.png',
            'brand_status'=>1
        ]);
    }
}
