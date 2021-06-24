<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = array(
            ['id'=>1,
            's_id'=>1,
            'brand_name'=>"adidas",
            'name'=>"Adidas Shoe",
            "desc"=>"A product description is the marketing copy that explains what a product is and why it's worth purchasing. The purpose of a product description is to supply customers with important information about the features and benefits of the product so they're compelled to buy.",
            "category"=>"Men's Fashion",
            "spec"=>"spec1,spec2,spec3,spec4"
            ],
            ['id'=>2,
            's_id'=>1,
            'brand_name'=>'adidas',
            'name'=>"Adidas Shoe",
            "desc"=>"A product description is the marketing copy that explains what a product is and why it's worth purchasing. The purpose of a product description is to supply customers with important information about the features and benefits of the product so they're compelled to buy.",
            "category"=>"Men's Fashion",
            "spec"=>"spec1,spec2,spec3,spec4"
            ],
            ['id'=>3,
            's_id'=>3,
            'brand_name'=>'Bossini',
            'name'=>"Check Flannel Shirt Jacket",
            "desc"=>" A flannel shirt jacket with check pattern.
            - Uses thick flannel fabric which retains warmth well
            - Wash and Care: Please follow the washing instructions on the product tags and labels. ",
            "category"=>"Men's Fashion",
            "spec"=>"spec1,spec2,spec3,spec4"
            ],
            ['id'=>4,
            's_id'=>3,
            'brand_name'=>'Bossini',
            'name'=>"Sequined Star Jacquard Sweater",
            "desc"=>" A jacquard sweater with a star print made of sequins.
            - Wash and care: Machine washable. Turn the product inside out before washing. Wash at 30℃ and do not machine dry. Please read the laundry tag for details before washing. ",
            "category"=>"Women's Fashion",
            "spec"=>"spec1,spec2,spec3,spec4"
            ],
            ['id'=>5,
            's_id'=>4,
            'brand_name'=>'Rolex',
            'name'=>"DAY-DATE",
            "desc"=>"The Ultimate Watch of Prestige ",
            "category"=>"Men's Fashion",
            "spec"=>"spec1,spec2,spec3,spec4"
            ],
            ['id'=>6,
            's_id'=>4,
            'brand_name'=>'Rolex',
            'name'=>"SKK-DWELLER",
            "desc"=>"The Watch for the World Travellers ",
            "category"=>"Men's Fashion",
            "spec"=>"spec1,spec2,spec3,spec4"
            ],
        );
        DB::table('product')->insert($roles);
        }
    }
