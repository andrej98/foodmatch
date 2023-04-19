<?php

use Illuminate\Database\Seeder;

use App\Model\Restaurant;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        // Create 50 sample restaurants
        factory(Restaurant::class, 50)->create();
    }
}
