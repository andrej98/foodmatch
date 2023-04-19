<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $this->faker->company,
        'address' => $this->faker->address,
        'description' => $this->faker->paragraph,
        'vegetarian' => $this->faker->boolean,
        'vegan' => $this->faker->boolean,
        'nut_allergy' => $this->faker->boolean,
        'lactose_intolerance' => $this->faker->boolean,
        'gluten_intolerance' => $this->faker->boolean,
        'bio_food' => $this->faker->boolean,
        'local_food' => $this->faker->boolean,
        'favorite_food' => $this->faker->word,
    ];
});
