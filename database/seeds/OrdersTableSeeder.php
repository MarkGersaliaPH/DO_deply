<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 50 ; $i++) { 
        	# code...

          DB::table('orders')->insert([
            'item' => Str::random(10),
            'price' => mt_rand(100000, 999999), 
            'created_at'=> '2019-6-'.mt_rand(1,30),
            'status'=> 'cancelled'
        ]);
        }
    }
}
