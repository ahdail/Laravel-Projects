<?php

/**
 * Created by PhpStorm.
 * User: ahdail
 * Date: 03/08/16
 * Time: 18:44
 */

use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Ecommerce\Category;
use Faker\Factory as Faker;


class CategoryTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();


        $faker = Faker::create();

        foreach (range (1,15) as $i) {

            DB::table('categories')->insert([ //,
                'name' => $faker->name,
                'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            ]);
        }


    }
}