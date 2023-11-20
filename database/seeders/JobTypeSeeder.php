<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('job_type')->insert([
            ['type' => 'Full Time'],
            ['type' => 'Part Time'],
            ['type' => 'Internship'],
            ['type' => 'Free Lancing'],
        ]);
    }
}
