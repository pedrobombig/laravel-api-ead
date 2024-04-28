<?php

namespace Database\Seeders;

use App\Models\ReplySupport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReplySupport::factory(300)->create();
    }
}
