<?php

use Illuminate\Database\Seeder;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = array(
        ["u_id"=>1,
         "name"=>"Adidas",
         "description"=>"It is the largest sportswear manufacturer in Europe, and the second largest in the world, after Nike.",
         "img"=>"adidas",
         "offical"=>1,
         "balance"=>10000000,
         "address"=>"54,4th street,SweTharGyi"
         ],
         ["u_id"=>2,
          "name"=>"Puma",
          "description"=>"The third largest sportswear manufacturer in the world.",
          "img"=>"puma",
          "offical"=>1,
          "balance"=>56000000,
          "address"=>"89,8th street,KanThaYa"
        ],
        ["u_id"=>2,
        "name"=>"Bossini",
        "description"=>"Bossini International Holdings Limited and its subsidiaries is an apparel brand owner, retailer and franchiser, headquartered in Hong Kong",
        "img"=>"bossini",
        "offical"=>1,
        "balance"=>50000000,
        "address"=>"31,Zayardipa street,Dagon(North)"
      ],
      ["u_id"=>1,
      "name"=>"Rolex",
      "description"=>"Explore the Rolex collection of prestigious, high-precision timepieces.",
      "img"=>"rolex",
      "offical"=>0,
      "balance"=>60000000,
      "address"=>"33,Mg tha baw street,Dagon"
      ]
        );
      DB::table('shop')->insert($roles);
    }
}
