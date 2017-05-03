<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'admin',
            'first_name' => 'John',
            'password' => bcrypt('111111'),
            'role' => 'ROLE_ADMIN',
            'is_active' => 1
        ]);

        DB::table('admins')->insert([
            'username' => 'super',
            'first_name' => 'John',
            'password' => bcrypt('111111'),
            'role' => 'ROLE_SUPER_ADMIN',
            'is_active' => 1
        ]);
    }
}
