<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->truncate();

        if (env('APP_ENV') == 'local') {
            $projects = [];
            $date = Carbon::now()->modify('-3 month');
            $faker = Faker\Factory::create('ru_RU');

            for ($i = 1; $i <= 24; $i++) {
                // Prepare all dates
                $date->addDay(5);
                $initDeadlineDate = clone($date);
                $issueDeadlineDate = clone($date);

                $name = $faker->sentence(rand(4, 8));
                $clientId = rand(1, 6);
                $description = $faker->realText(rand(200, 400));
                $authorSupervisorName = $faker->name();
                $expertiseDeadlineDate = clone($date);
                $initDeadlineDate->addDay(10);
                $issueDeadlineDate->addDay(20);
                $expertiseDeadlineDate->addDay(25);

                $projects[] = [
                    'name' => $name,
                    'client_id' => $clientId,
                    'description' => $description,
                    'author_supervisor_name' => $authorSupervisorName,
                    'init_info_deadline_at' => $initDeadlineDate,
                    'issue_deadline_at' => $issueDeadlineDate,
                    'expertise_deadline_at' => $expertiseDeadlineDate,
                ];
            }

            DB::table('projects')->insert($projects);
        }
    }
}
