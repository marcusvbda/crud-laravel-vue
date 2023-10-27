<?php

namespace Database\Seeders;

use App\Models\NewModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->truncate();
        NewModel::factory()->count(100)->create();
    }
}
