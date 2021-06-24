<?php

use Illuminate\Database\Seeder;

class OrderSpecificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Jan=date_create("2020-01-02")->format('Y-m-d H:i:s');
        $Feb=date_create("2020-02-03")->format('Y-m-d H:i:s');
        $Mar=date_create("2020-03-06")->format('Y-m-d H:i:s');
        $Mar2=date_create("2020-03-08")->format('Y-m-d H:i:s');
        $Mar3=date_create("2020-03-10")->format('Y-m-d H:i:s');
        $Mar4=date_create("2020-03-14")->format('Y-m-d H:i:s');
        $Mar5=date_create("2020-03-20")->format('Y-m-d H:i:s');
        
        $Apr=date_create("2020-04-08")->format('Y-m-d H:i:s');
        $May=date_create("2020-05-13")->format('Y-m-d H:i:s');
        $Jun=date_create("2020-06-17")->format('Y-m-d H:i:s');
        $Jul=date_create("2020-07-17")->format('Y-m-d H:i:s');
        $Aug=date_create("2020-08-20")->format('Y-m-d H:i:s');
        $Sep=date_create("2020-09-23")->format('Y-m-d H:i:s');
        $Oct=date_create("2020-10-05")->format('Y-m-d H:i:s');
        $Nov=date_create("2020-11-23")->format('Y-m-d H:i:s');
        $Dec=date_create("2020-12-23")->format('Y-m-d H:i:s');
        $roles=array(
          [
            "p_id"=>1,
            "s_id"=>1,
            "o_id"=>1,
            "qty"=>4,
            "amount"=>80000,
            "color"=>"white",
            "size"=>"XL",
            "created_at"=>$Jan
          ],
          [
            "p_id"=>2,
            "s_id"=>1,
            "o_id"=>2,
            "qty"=>1,
            "amount"=>20000,
            "color"=>"black",
            "size"=>"XL",
            "created_at"=>$Feb
          ],
          [
            "p_id"=>2,
            "s_id"=>1,
            "o_id"=>3,
            "qty"=>5,
            "amount"=>100000,
            "color"=>"blue",
            "size"=>"XL",
            "created_at"=>$Mar
          ],
          [
            "p_id"=>2,
            "s_id"=>2,
            "o_id"=>4,
            "qty"=>16,
            "amount"=>320000,
            "color"=>"black",
            "size"=>"XL",
            "created_at"=>$Apr
          ],
          [
            "p_id"=>2,
            "s_id"=>2,
            "o_id"=>5,
            "qty"=>2,
            "amount"=>40000,
            "color"=>"black",
            "size"=>"XL",
            "created_at"=>$May
          ],
          [
            "p_id"=>2,
            "s_id"=>1,
            "o_id"=>6,
            "qty"=>6,
            "amount"=>120000,
            "color"=>"black",
            "size"=>"XL",
            "created_at"=>$Jun
          ],
          [
            "p_id"=>2,
            "s_id"=>2,
            "o_id"=>7,
            "qty"=>2,
            "amount"=>40000,
            "color"=>"black",
            "size"=>"XL",
            "created_at"=>$Aug
          ],
          [
            "p_id"=>2,
            "s_id"=>1,
            "o_id"=>8,
            "qty"=>8,
            "amount"=>160000,
            "color"=>"black",
            "size"=>"XL",
            "created_at"=>$Sep
          ],
          [
            "p_id"=>3,
            "s_id"=>3,
            "o_id"=>9,
            "qty"=>2,
            "amount"=>20000,
            "color"=>"red",
            "size"=>"L",
            "created_at"=>$Jan
          ],
          [
            "p_id"=>3,
            "s_id"=>3,
            "o_id"=>10,
            "qty"=>5,
            "amount"=>50000,
            "color"=>"red",
            "size"=>"L",
            "created_at"=>$Feb
          ],
          [
            "p_id"=>4,
            "s_id"=>3,
            "o_id"=>11,
            "qty"=>7,
            "amount"=>98000,
            "color"=>"white",
            "size"=>"M",
            "created_at"=>$Mar
          ],
          [
            "p_id"=>3,
            "s_id"=>3,
            "o_id"=>12,
            "qty"=>1,
            "amount"=>10000,
            "color"=>"red",
            "size"=>"L",
            "created_at"=>$Apr
          ],
          [
            "p_id"=>4,
            "s_id"=>3,
            "o_id"=>13,
            "qty"=>4,
            "amount"=>56000,
            "color"=>"white",
            "size"=>"M",
            "created_at"=>$May
          ],
          [
            "p_id"=>4,
            "s_id"=>3,
            "o_id"=>14,
            "qty"=>10,
            "amount"=>140000,
            "color"=>"white",
            "size"=>"M",
            "created_at"=>$Jun
          ],
          [
            "p_id"=>3,
            "s_id"=>3,
            "o_id"=>15,
            "qty"=>6,
            "amount"=>60000,
            "color"=>"red",
            "size"=>"L",
            "created_at"=>$Jul
          ],
          [
            "p_id"=>3,
            "s_id"=>3,
            "o_id"=>16,
            "qty"=>10,
            "amount"=>100000,
            "color"=>"red",
            "size"=>"L",
            "created_at"=>$Mar5
          ],
          [
            "p_id"=>4,
            "s_id"=>3,
            "o_id"=>17,
            "qty"=>5,
            "amount"=>70000,
            "color"=>"white",
            "size"=>"M",
            "created_at"=>$Mar4
          ],
          [
            "p_id"=>3,
            "s_id"=>3,
            "o_id"=>18,
            "qty"=>5,
            "amount"=>50000,
            "color"=>"red",
            "size"=>"L",
            "created_at"=>$Mar3
          ],
          [
            "p_id"=>4,
            "s_id"=>3,
            "o_id"=>19,
            "qty"=>3,
            "amount"=>42000,
            "color"=>"white",
            "size"=>"M",
            "created_at"=>$Mar2
          ],
          
          
          
          
        );
        DB::table('order_specification')->insert($roles);
    }
}
