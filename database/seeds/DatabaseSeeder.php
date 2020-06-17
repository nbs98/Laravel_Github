<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'=>'admin',
            'password'=>bcrypt('admin'),
            'level'=>'1',
            'name'=>'NBS',
            'email'=>'admin@gmail.com',
            'avatar'=>'chuaco'
        ]);
    }
}
