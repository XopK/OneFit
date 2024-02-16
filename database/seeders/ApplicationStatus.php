<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['title_status' => 'Ожидание'],
            ['title_status' => 'Принято'],
            ['title_status' => 'Отклонено'],
            ['title_status' => 'Архив'],
        ]);
    }
}
