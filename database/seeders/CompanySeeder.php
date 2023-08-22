<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            'name' => Random::generate(6,'a-z'),
            'created_by' => 1,
            'modified_by' => 1,
            'slug' => Random::generate(6,'a-z'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
