<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            CourseTableSeeder::class,
            ModuleTableSeeder::class,
            LessonTableSeeder::class,
            SupportTableSeeder::class,
            ReplyTableSeeder::class
        ]);
    }
}
