<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
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
            "u_id"=>1,
            "location"=>"Myanmar,Yangon",
            "payment_method"=>"COD",
            "status"=>"PENDING",
            "payment_contact"=>"09256809786",
            "paid"=>true
          ],
          [
            "u_id"=>2,
            "location"=>"Myanmar,Yangon",
            "payment_method"=>"COD",
            "status"=>"PENDING",
            "payment_contact"=>"09956039786",
            "paid"=>true
          ],
          [
            "u_id"=>2,
            "location"=>"Myanmar,Yangon",
            "payment_method"=>"WavePay",
            "status"=>"FINISHED",
            "payment_contact"=>"09956039786",
            "paid"=>true
          ],
          [
            "u_id"=>1,
            "location"=>"Myanmar,Yangon",
            "payment_method"=>"PENDING",
            "status"=>"PENDING",
            "payment_contact"=>"09256809786",
            "paid"=>true
          ],
          [
            "u_id"=>2,
            "location"=>"Myanmar,Yangon",
            "payment_method"=>'OK$',
            "status"=>"FINISHED",
            "payment_contact"=>"09956039786",
            "paid"=>true
          ],
          [
            "u_id"=>1,
            "location"=>"Myanmar,Yangon",
            "payment_method"=>"COD",
            "status"=>"PENDING",
            "payment_contact"=>"09256809786",
            "paid"=>true
          ],
          [
            "u_id"=>1,
            "location"=>"Myanmar,Yangon",
            "payment_method"=>"COD",
            "status"=>"PENDING",
            "payment_contact"=>"09256809786",
            "paid"=>true
          ],
          [
            "u_id"=>1,
            "location"=>"Myanmar,Yangon",
            "payment_method"=>"COD",
            "status"=>"PENDING",
            "payment_contact"=>"09256809786",
            "paid"=>true
          ],
          [
            "u_id"=>3,
            "location"=>"UIT",
            "payment_method"=>"COD",
            "status"=>"FINISHED",
            "payment_contact"=>"09236809797",
            "paid"=>false
          ],
          [
            "u_id"=>3,
            "location"=>"UIT",
            "payment_method"=>"COD",
            "status"=>"FINISHED",
            "payment_contact"=>"09236809797",
            "paid"=>false
          ],
          [
            "u_id"=>3,
            "location"=>"UIT",
            "payment_method"=>"COD",
            "status"=>"FINISHED",
            "payment_contact"=>"09236809797",
            "paid"=>false
          ],
          [
            "u_id"=>4,
            "location"=>"YUECO",
            "payment_method"=>"WavePay",
            "status"=>"FINISHED",
            "payment_contact"=>"09966809497",
            "paid"=>false
          ],
          [
            "u_id"=>4,
            "location"=>"EYU",
            "payment_method"=>"WavePay",
            "status"=>"FINISHED",
            "payment_contact"=>"09966809497",
            "paid"=>false
          ],
          [
            "u_id"=>5,
            "location"=>"YUECO",
            "payment_method"=>"Ok$",
            "status"=>"FINISHED",
            "payment_contact"=>"09766209495",
            "paid"=>false
          ],
          [
            "u_id"=>5,
            "location"=>"WYTU",
            "payment_method"=>"Ok$",
            "status"=>"FINISHED",
            "payment_contact"=>"09766209495",
            "paid"=>false
          ],
          [
            "u_id"=>6,
            "location"=>"Sedona Hotel",
            "payment_method"=>"Ok$",
            "status"=>"PENDING",
            "payment_contact"=>"09696409395",
            "paid"=>false
          ],
          [
            "u_id"=>6,
            "location"=>"The Central",
            "payment_method"=>"Ok$",
            "status"=>"PENDING",
            "payment_contact"=>"09696409395",
            "paid"=>false
          ],
          [
            "u_id"=>8,
            "location"=>"Near Junction City",
            "payment_method"=>"WavePay",
            "status"=>"PENDING",
            "payment_contact"=>"09895409499",
            "paid"=>false
          ],
          [
            "u_id"=>8,
            "location"=>"Near Junction City",
            "payment_method"=>"WavePay",
            "status"=>"PENDING",
            "payment_contact"=>"09895409499",
            "paid"=>false
          ],
        ];
        DB::table('orders')->insert($roles);
    }
}
