<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Алексей',
            'surname' => 'Смирнов',
            'phone' => '+7(800)555-35-35',
            'id_role' => 1,
            'email' => 'alex@mail.ru',
            'password' => Hash::make('admin'),
        ]);
    }
}
