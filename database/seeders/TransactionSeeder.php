<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i<5; $i++){
            DB::table('transactions')->insert([
                'user_id' => '1',
                'book_id' => $i+1,
                'quantity' => 2
            ]);
        }
    }
}
