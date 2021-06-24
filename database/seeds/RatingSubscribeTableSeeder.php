<?php

use Illuminate\Database\Seeder;

class RatingSubscribeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Jan=date_create("2020-01-23")->format('Y-m-d H:i:s');
        $Feb=date_create("2020-02-23")->format('Y-m-d H:i:s');
        $roles = array(
          ["s_id"=>1,
           "u_id"=>2,
           "rating"=>4,
           "subscribed"=>1,
           "created_at"=>$Jan
           ],
           ["s_id"=>2,
            "u_id"=>1,
            "rating"=>4,
            "subscribed"=>1,
            "created_at"=>$Feb
            ]
          );
        DB::table('rating_subscribe')->insert($roles);
    }
}
