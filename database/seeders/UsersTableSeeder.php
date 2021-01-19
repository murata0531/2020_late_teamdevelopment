<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for($i = 1;$i <= 10;$i++){

            \DB::table('users')->insert([
                'name'              => 'user' . $i,
                'email'             => 'user' . $i . '@example.com',
                'company_id'        => 1,
                'password'          => Hash::make('12345678'),
            ]);

        }
        
    }
}
