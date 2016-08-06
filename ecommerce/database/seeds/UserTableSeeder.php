<?php

/**
 * Created by PhpStorm.
 * User: ahdail
 * Date: 03/08/16
 * Time: 18:44
 */

use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Ecommerce\User;



class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        factory('Ecommerce\User', 10)->create();

    }
}