<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('category')->insert([
            [
                'name' => 'Software Company',
                'icon' => '<i class="fas fa-laptop-code"></i>'
            ],
            [
                'name' => 'Cloud Computing',
                'icon' => '<i class="lni lni-cloud"></i>'
            ],
            [
                'name' => 'Logistics/Shipping',
                'icon' => '<i class="lni lni-shopify"></i>'
            ],
            [
                'name' => 'Engineering',
                'icon' => '<i class="lni lni-construction"></i>'
            ],
            [
                'name' => 'Telecom/ Internet',
                'icon' => '<i class="lni lni-phone-set"></i>'
            ],
            [
                'name' => 'Healthcare/Pharma',
                'icon' => '<i class="lni lni-sthethoscope"></i>'
            ],
            [
                'name' => 'Finance/Insurance',
                'icon' => '<i class="lni lni-money-protection"></i>'
            ],
            [
                'name' => 'Product Software',
                'icon' => '<i class="lni lni-diamond-shape"></i>'
            ],
            [
                'name' => 'Diversified/Retail',
                'icon' => '<i class="lni lni-briefcase"></i>'
            ],
            [
                'name' => 'Education',
                'icon' => '<i class="lni lni-graduation"></i>'
            ],
            [
                'name' => 'Banking/BPO',
                'icon' => '<i class="lni lni-mastercard"></i>'
            ],
            [
                'name' => 'Printing',
                'icon' => '<i class="lni lni-gallery"></i>'
            ],
            [
                'name' => 'Others',
                'icon' => '<i class="lni lni-emoji-smile"></i>'
            ]
        ]);
    }
}
