<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sekolah;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sekolah::create([
        	'npsn' => '12345678',
        	'nama' => 'SMKN 99 Padang',
        	'jenjang' => 'smk',
        	'alamat' => 'Jln. Soekarno Hatta No. 109',
        	'provinsi' => 'Sumatera Barat',
        	'kota' => 'Padang',
        	'kecamatan' => 'Padang Selatan',
        	'kelurahan' => 'Air Manis',
        	'telepon' => '021-29271234'
        ]);
    }
}
