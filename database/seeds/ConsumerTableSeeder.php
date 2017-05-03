<?php

use Illuminate\Database\Seeder;

/**
 * Class ConsumerTableSeeder
 */
class ConsumerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consumers')->insert([
            'first_name' => 'foo',
            'email' => 'foo@test.com',
            'is_active' => 1,
            'password' => bcrypt('111111'),
        ]);

        DB::table('consumers')->insert([
            'first_name' => 'bar',
            'email' => 'bar@test.com',
            'is_active' => 1,
            'password' => bcrypt('111111'),
        ]);
    }
}
