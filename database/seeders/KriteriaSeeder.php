<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriterias')->insert([
            [
                'nama_kriteria' => 'Vendor',
                'kode_kriteria' => 'K01',
                'bobot_kriteria' => 2,
                'tipe' => 'cost',

            ],
            [
                'nama_kriteria' => 'MuA',
                'kode_kriteria' => 'K02',
                'bobot_kriteria' => 3,
                'tipe' => 'benefit',
            ],
        ]);
    }
}
