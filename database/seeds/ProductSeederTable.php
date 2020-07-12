<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Product');
        for($i = 1 ; $i <= 10 ; $i++) {
            DB::table('products')->insert([
                'name' => $faker->country(),
                'EAN' => $faker->buildingNumber(),
                'type' => $faker->sentence(),
                'weight' => $faker->randomDigitNotNull(),
                'color' => $faker->colorName(),
                'active' => $faker->boolean(),
                'price' => $faker->randomDigitNotNull(),
                'quantity' => $faker->randomDigitNotNull(),
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now()]);
        }
    }
}
