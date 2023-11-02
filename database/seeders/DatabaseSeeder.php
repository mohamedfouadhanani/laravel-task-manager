<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Mohamed Fouad HANANI',
                'email' => 'mohamedfouad.hanani@gmail.com',
                'password' => bcrypt('00000000'),
                'role' => UserRole::ADMINISTRATOR->value,
                'email_verified_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'name' => 'Mouad Nael HANANI',
                'email' => 'mouadnael.hanani@gmail.com',
                'password' => bcrypt('00000000'),
                'role' => UserRole::MODERATOR->value,
                'email_verified_at' => Carbon::now()->toDateTimeString()
            ],
        ]);
    }
}
