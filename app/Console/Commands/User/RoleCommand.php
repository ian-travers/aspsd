<?php

namespace App\Console\Commands\User;

use App\User;
use Illuminate\Console\Command;

class RoleCommand extends Command
{
    protected $signature = 'user:role {name} {role}';

    protected $description = 'Set role for user';

    public function handle()
    {
        $name = $this->argument('name');
        $role = $this->argument('role');

        /** @var \App\User $user */
        if (!$user = User::where('name', $name)->first()) {
            $this->error('Undefined user with name ' . $name);
            return false;
        }

        try {
            $user->changeRole($role);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return false;
        }

        $this->info('Role is successfully changed');
        return true;
    }
}
