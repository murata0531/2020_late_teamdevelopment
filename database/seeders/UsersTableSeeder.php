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

        \DB::table('users')->insert([
            'name'              => 'arael',
            'email'             => 'user1@example.com',
            'company_id'        => 1,
            'password'          => Hash::make('12345678'),
        ]);
    }
}
