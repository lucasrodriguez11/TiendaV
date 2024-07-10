<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0; $i < 10; $i++){
        DB::table('products')->insert([
                'name' => 'Producto '.Str::random(2),
                'price' => rand(1,1000),
                'description' => 'Soy la descripcion'.$i ,
        ]);
    }
    }
}
