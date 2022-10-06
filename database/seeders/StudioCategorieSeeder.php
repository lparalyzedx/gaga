<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudioCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr= [
            ['name' => 'Ocak', 'slug' => 'ocak'],
            ['name' => 'Şubat', 'slug' => 'subat'],
            ['name' => 'Mart', 'slug' => 'mart'],
            ['name' => 'Nisan', 'slug' => 'nisan'],
            ['name' => 'Şubat', 'slug' => 'subat'],
            ['name' => 'Mayıs', 'slug' => 'mayis'],
            ['name' => 'Haziran', 'slug' => 'haziran'],
            ['name' => 'Temmuz', 'slug' => 'temmuz'],
            ['name' => 'Ağustos', 'slug' => 'agustos'],
            ['name' => 'Ekim', 'slug' => 'ekim'],
            ['name' => 'Eylül', 'slug' => 'eylul'],
            ['name' => 'Kasım', 'slug' => 'kasim'],
            ['name' => 'Aralık', 'slug' => 'aralik'],
        ];

        DB::table('studiocategories')->insert($arr);
    }
}
