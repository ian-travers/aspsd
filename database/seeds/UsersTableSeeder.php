<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        if (env('APP_ENV') == 'local') {
            DB::table('users')->insert([
                [
                    'name' => 'sa',
                    'email' => 'sa@test.lan',
                    'password' =>bcrypt('111111'),
                ],
                [
                    'name' => 'nodg',
                    'email' => 'nodg@test.lan',
                    'password' =>bcrypt('111111'),],
                [
                    'name' => 'psg',
                    'email' => 'psg@test.lan',
                    'password' =>bcrypt('111111'),
                ],
            ]);
        } else {
            DB::table('users')->insert([
                'name' => 'sa',
                'email' => 'sa@test.lan',
                'password' =>bcrypt('111111'),
            ]);
        }
    }
}
