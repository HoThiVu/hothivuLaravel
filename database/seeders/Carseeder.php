<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
// use App\Models\CarManufacture;
 

class Carseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Car::factory() -> count(10)-> create();
        // CarManufacture::factory() -> count(10)-> create();
        // DB::table('cars')->insert([
        //     'id' => Str::random(10),

        //     'make' => Str::random(10),
        //     'image' => Str::random(10),
        //     'Discription' => Str::random(10),
        //     'model' => Str::random(10),
        //     'produced_on' => Carbon::parse(8/9/2022),
        // ]);
       
    }
}
