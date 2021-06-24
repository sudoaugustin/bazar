<?php

use Illuminate\Database\Seeder;

class ProductSpecificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            [
            'p_id'=>1,
            'color'=>'white',
            'img'=>'1_white,1_white-1,1_white-2,1_white-3,1_white-4,1_white-5',
            'qty'=>15,
            'price' => 20000,
            'size'=>'XL'
            ],
            ['p_id'=>1,'color'=>'red','img'=>'1_red,1_red-1,1_red-2,1_red-3,1_red-4', 'qty'=>15,'price' => 20000,'size'=>'XXL'],
            ['p_id'=>2,'color'=>'black','img'=>'2_black,2_black-1,2_black-2,2_black-3,2_black-4', 'qty'=>1,'price' => 20000,'size'=>'XL'],
            ['p_id'=>2,'color'=>'blue','img'=>'2_blue,2_blue-1,2_blue-2,2_blue-3,2_blue-4', 'qty'=>4,'price' => 20000,'size'=>'XL'],
            ['p_id'=>2,'color'=>'grey','img'=>'2_grey,2_grey-1,2_grey-2,2_grey-3,2_grey-4', 'qty'=>7,'price' => 20000,'size'=>'XXL'],
            ['p_id'=>2,'color'=>'milky','img'=>'2_milky,2_milky-1,2_milky-2,2_milky-3,2_milky-4', 'qty'=>8,'price' => 20000,'size'=>'XLX'],
            [
                'p_id'=>3,
                'color'=>'red',
                'img'=>'3_1,3_2,3_3,3_4,3_5',
                'qty'=>15,
                'price' => 10000,
                'size'=>'L'
                ],
                [
                    'p_id'=>4,
                    'color'=>'white',
                    'img'=>'4_1,4_2,4_3,4_4',
                    'qty'=>14,
                    'price' => 14000,
                    'size'=>'M'
                    ],
                [
                    'p_id'=>5,
                    'color'=>'silver',
                    'img'=>'5_2,5_3,5_4,5_5',
                    'qty'=>7,
                    'price' => 240000,
                    'size'=>'L'
                        ],
                [
                            'p_id'=>6,
                            'color'=>'silver',
                            'img'=>'6_1,6_2,6_3,6_4,6_5',
                            'qty'=>7,
                            'price' => 350000,
                            'size'=>'L'
                                ]
            );
        DB::table('product_specification')->insert($roles);
    }
}
