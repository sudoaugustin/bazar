<?php

use Illuminate\Database\Seeder;

class ExchangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = array(
          ['s_id'=>1,"amount"=>80000,"method"=>"Coinbase","address"=>"aung@gmai.com"],
          ['s_id'=>2,"amount"=>50000,"method"=>"WavePay","address"=>"09448957137"]
        );
      DB::table('exchanges')->insert($roles);
    }
}
