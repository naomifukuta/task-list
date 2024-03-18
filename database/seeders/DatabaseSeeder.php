<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


//seeder is the actual place where you would load something into the database. 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //create dummy 10 users
        User::factory(10)->create();
        //produce different cases.not verified email
        \App\Models\User::factory(2)->unverified()->create();
        //create 20 dummy task
        \App\Models\Task::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
