<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        $faker = Faker\Factory::create('ru_RU');

        if (env('APP_ENV') == 'local') {
            DB::table('users')->insert([
                [
                    'name' => 'sa',
                    'email' => 'sa@test.lan',
                    'password' => bcrypt('111111'),
                    'surname' => $faker->lastName,
                    'first_name' => $faker->firstNameMale,
                    'patronymic_name' => $faker->middleNameMale,
                    'role' => 'sa',
                ],
                [
                    'name' => 'nodg',
                    'email' => 'nodg@test.lan',
                    'password' =>bcrypt('111111'),
                    'surname' => $faker->lastName,
                    'first_name' => $faker->firstNameMale,
                    'patronymic_name' => $faker->middleNameMale,
                    'role' => 'verifier',
                ],
                [
                    'name' => 'psg',
                    'email' => 'psg@test.lan',
                    'password' =>bcrypt('111111'),
                    'surname' => $faker->lastName,
                    'first_name' => $faker->firstNameMale,
                    'patronymic_name' => $faker->middleNameMale,
                    'role' => 'projector',
                ],
            ]);
        } else {
            DB::table('users')->insert([
                'name' => 'sa',
                'email' => 'sa@test.lan',
                'password' => bcrypt('111111'),
                'role' => 'sa',
            ]);
        }
    }
}
