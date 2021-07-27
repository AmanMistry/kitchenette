<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            //admin
            [
                'full_name'=>'Harsh admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('aaa'),
                'city_id'=>'1',
                'role'=>'admin',
                'status'=>'active',
            ],

            //vendor
            [
                'full_name'=>'seller boi',
                'email'=>'seller@gmail.com',
                'password'=>Hash::make('vvv'),
                'city_id'=>'1',
                'role'=>'seller',
                'status'=>'active',
            ],

            //User
            [
                'full_name'=>'user boi',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('uuu'),
                'city_id'=>'1',
                'role'=>'customer',
                'status'=>'active',
            ],

        ]);
    }
}
