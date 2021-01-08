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
            'company_email'             => 'user@example.com',
            'company_password'          => Hash::make('12345678'),
            'url'                       =>'arael',
        ]);
    }
}
