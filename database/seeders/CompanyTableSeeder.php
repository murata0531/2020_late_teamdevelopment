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
        //
        \DB::table('companies')->insert([
            'company_name'              => 'arael',
            'email'             => 'user@example.com',
            'password'          => Hash::make('12345678'),
            'url'                       =>'arael',
        ]);
    }
}
