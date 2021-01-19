<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i = 1;$i <= 10;$i++){

            \DB::table('companies')->insert([
                'name'              => 'arael' . $i,
                'email'             => 'arael' . $i . '@example.com',
                'password'          => Hash::make('12345678'),
                'url'               =>'arael' . $i,
            ]);
        }
        
    }
}
