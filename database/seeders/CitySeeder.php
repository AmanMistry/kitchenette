<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            //ahmedabad
            [
                'name'=>'ahmedabad',
                'slug'=>'ahmedabad',
                'status'=>'active',
            ],
            //vadodara
            [
                'name'=>'vadodara',
                'slug'=>'vdodara',
                'status'=>'active',
            ],
        ]);
    }
}
