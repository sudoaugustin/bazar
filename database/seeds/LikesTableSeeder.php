<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = array(
          ['p_id'=>1,"u_id"=>1],
          ['p_id'=>2,"u_id"=>1]
        );
      DB::table('likes')->insert($roles);
    }
}
