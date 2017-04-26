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
            'password' => bcrypt('111111'),
        ]);
    }
}
