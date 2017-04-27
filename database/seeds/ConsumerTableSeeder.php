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
            'role' => 'ROLE_ADMIN',
            'is_active' => 1,
            'password' => bcrypt('111111'),
        ]);
    }
}
