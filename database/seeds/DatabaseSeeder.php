<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(ProductSpecificationTableSeeder::class);
         $this->call(LikesTableSeeder::class);
         $this->call(ShopTableSeeder::class);
         $this->call(RatingSubscribeTableSeeder::class);
         $this->call(OrderTableSeeder::class);
         $this->call(OrderSpecificationTableSeeder::class);
         $this->call(ExchangeTableSeeder::class);
         $this->call(VisitorTableSeeder::class);
         $this->call(BrandTableSeeder::class);
    }
}
