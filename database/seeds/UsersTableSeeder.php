<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {

    $today = date('Y-m-d H:i:s');

    $roles = array(
        [
          'phone'=>'09420088636',
          'name'=>'User1',
          'password' =>'$2y$10$CuawKRnJrX2cUBOsRojsMOFYt0ggf4GESV/nSfhamytikUXc73Yo6',
          'email' =>'user1@gmail.com',
          'created_at'=>$today,
          "img"=>"user1.jpg",
          "role_id"=> 2,
          "address"=>"391,7th street,North Okkalapa"
        ],
        [
          'phone'=>'09123123123',
          'name'=>'User2',
          'password' =>'$2y$10$CuawKRnJrX2cUBOsRojsMOFYt0ggf4GESV/nSfhamytikUXc73Yo6',
          'email' =>'user2@gmail.com',
          'created_at'=>$today,
          "img"=>null,
          "role_id"=> 2,
          "address"=>"56,75th street,Mingalar Taungnyutn"
        ],
        [
          'phone'=>'09321321321',
          'name'=>'User3',
          'password' =>'$2y$10$CuawKRnJrX2cUBOsRojsMOFYt0ggf4GESV/nSfhamytikUXc73Yo6',
          'email' =>'user3@gmail.com',
          'created_at'=>$today,
          "img"=>"user3.jpeg",
          "role_id"=> 2,
          "address"=>"6,5th street,Dagon"
        ],
        [

          'phone'=>'09123123123',
          'name'=>'User4',
          'password' =>'$2y$10$CuawKRnJrX2cUBOsRojsMOFYt0ggf4GESV/nSfhamytikUXc73Yo6',
          'email' =>'user4@gmail.com',
          'created_at'=>$today,
          "img"=>null,
          "role_id"=> 2,
          "address"=>"5,5th street,Kyauk Ta Dar"
        ],
        [
          'phone'=>'09123123123',
          'name'=>'User5',
          'password' =>'$2y$10$CuawKRnJrX2cUBOsRojsMOFYt0ggf4GESV/nSfhamytikUXc73Yo6',
          'email' =>'user5@gmail.com',
          'created_at'=>$today,
          "img"=>null,
          "role_id"=> 2,
          "address"=>"56,75th street,Mingalar Taungnyutn"
        ],
        [
          'phone'=>'09123123123',
          'name'=>'User6',
          'password' =>'$2y$10$CuawKRnJrX2cUBOsRojsMOFYt0ggf4GESV/nSfhamytikUXc73Yo6',
          'email' =>'user6@gmail.com',
          'created_at'=>$today,
          "img"=>null,
          "role_id"=> 2,
          "address"=>"52,7th street,Mingalar Taungnyutn"
        ],
        [
          'phone'=>'09123123124',
          'name'=>'admin',
          'password' =>'$2y$10$CuawKRnJrX2cUBOsRojsMOFYt0ggf4GESV/nSfhamytikUXc73Yo6',
          'email' =>'admin@gmail.com',
          'created_at'=>$today,
          "img"=>null,
          "role_id"=> 1,
          "address"=>"52,7th street,Mingalar Taungnyutn"
        ],
        [
          'phone'=>'09123123124',
          'name'=>'User7',
          'password' =>'$2y$10$CuawKRnJrX2cUBOsRojsMOFYt0ggf4GESV/nSfhamytikUXc73Yo6',
          'email' =>'user7@gmail.com',
          'created_at'=>$today,
          "img"=>null,
          "role_id"=> 2,
          "address"=>"52,7th street,Mingalar Taungnyutn"
        ],



    );
    DB::table('users')->insert($roles);
    }
}
