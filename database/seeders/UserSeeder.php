<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'David Christian Michael Alexander Manongko',
            'email' => 'davidalexander1712@gmail.com',
            'password' => '$2y$10$Gz9PeV/y92qWEpEhFNj.HeyeI5HwJPo5eLPVfL18/3bnI4q0RqBn2',
            'date_of_birth' => '2000-12-17',
            'gender' => 'Male'
        ]);
    }
}
