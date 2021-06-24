<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles=[
            [
                "category"=>"Men's Fashion",
                "brand_name"=>"adidas"
            ],
            [
                "category"=>"Men's Fashion",
                "brand_name"=>"rolex"
            ],
            [
                "category"=>"Men's Fashion",
                "brand_name"=>"bossini"
            ],
            [
                "category"=>"Women's Fashion",
                "brand_name"=>"bossini"
            ]
        ];
        DB::table('brands')->insert($roles);
        
    }
}
