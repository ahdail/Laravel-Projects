<?php

/**
 * Created by PhpStorm.
 * User: ahdail
 * Date: 03/08/16
 * Time: 18:44
 */

use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Ecommerce\Product;
use Faker\Factory as Faker;


class ProductTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker::create();

        foreach (range (1,40) as $i) {

            DB::table('products')->insert([ //,
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price' =>  $faker->randomNumber(2),
                'featured' => $faker->boolean(),
                'recommend' => $faker->boolean(),
                'category_id' =>  $faker->numberBetween(1, 15),
            ]);
        }


    }
}