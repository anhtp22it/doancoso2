<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('experience')->insert([
            ['title' => 'Begginer'],
            ['title' => '01 Years'],
            ['title' => '02 Years'],
            ['title' => '03 Years'],
            ['title' => '04 Years'],
            ['title' => '05+ Years']
        ]);
    }
}
