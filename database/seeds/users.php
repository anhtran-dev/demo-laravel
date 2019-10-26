<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username'=>'anhtran','email'=>'anhtran@gmail.com','password'=>bcrypt('admin'),'level'=>1],
            ['username'=>'admin','email'=>'admin@gmail.com','password'=>bcrypt('admin'),'level'=>1],
        ]);
    }
}
