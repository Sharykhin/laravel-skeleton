<?php

use Illuminate\Database\Seeder;

/**
 * Class ProviderTableSeeder
 */
class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            'shop_name' => 'bar',
            'location1' => 'Bar street 14',
            'email' => 'bar@test.com',
            'password' => bcrypt('111111')
        ]);

        DB::table('providers')->insert([
            'shop_name' => 'foo',
            'location1' => 'Foo street 14',
            'email' => 'foo@test.com',
            'password' => bcrypt('111111'),
        ]);
    }
}
