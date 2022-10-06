<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campus')->insert([
            'title' => 'Profesyonel Aşçılık Eğitimi',
            'description' => 'lorem ipsum dolor sit amet'
        ]);
    }
}
