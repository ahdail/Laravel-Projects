<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Adail Viana',
            'email' => 'ahdail@gmail.com',
            'password' => bcrypt(123456),
        ]);

        $this->call(PostsTableSeeder::class);
        $this->call(TagTableSeeder::class);
    }
}
