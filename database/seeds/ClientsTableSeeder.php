<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
   public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('clients')->truncate();

        if (env('APP_ENV') == 'local') {
            $date = Carbon::now();
            DB::table('clients')->insert([
                [
                    'name' => 'ИВЦ',
                    'slug' => str_slug('ИВЦ'),
                    'created_at' => $date,
                ],
                [
                    'name' => 'ШЧ-15',
                    'slug' => str_slug('ШЧ-15'),
                    'created_at' => $date,
                ],
                [
                    'name' => 'ДС Полоцк',
                    'slug' => str_slug('ДС Полоцк'),
                    'created_at' => $date,
                ],
                [
                    'name' => 'ВЧД-12',
                    'slug' => str_slug('ВЧД-12'),
                    'created_at' => $date,
                ],
                [
                    'name' => 'ТЧ-17',
                    'slug' => str_slug('ТЧ-17'),
                    'created_at' => $date,
                ],
                [
                    'name' => 'ПЧ-11',
                    'slug' => str_slug('ПЧ-11'),
                    'created_at' => $date,
                ],
            ]);
        }
    }
}
