<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HistorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\History');
        for($i = 1 ; $i <= 100 ; $i++) {
            DB::table('histories')->insert([
                'product_id' => $faker->numberBetween(1,10),
                'price' => $faker->randomDigitNotNull(),
                'quantity' => $faker->randomDigitNotNull(),
                'created_at' => \Carbon\Carbon::now()->subDays(rand(1, 90)),
                'Updated_at' => \Carbon\Carbon::now()]);
        }
    }
}
