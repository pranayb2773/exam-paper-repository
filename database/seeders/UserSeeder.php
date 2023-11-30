<?php

namespace Database\Seeders;

use App\Enums\User\Status;
use App\Enums\User\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->admin();
        $this->students();
    }

    private function admin(): void
    {
        User::create([
            'name' => 'Pranay Baddam',
            'email' => 'pranay.baddam@gmail.com',
            'password' => 'Baddam@#6',
            'type' => Type::ADMIN->value,
            'status' => Status::ACTIVE->value,
        ]);
    }

    private function students(): void
    {
        User::factory(200)->student()->active()->create();

        User::factory(50)->student()->inactive()->create();
    }
}
