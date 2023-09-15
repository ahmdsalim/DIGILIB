<?php

namespace App\Imports;

use App\Models\siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSiswa implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nisn' => $row['nisn'],
            'nama' => $row['nama'],
            'jk' => $row['jk'],
            'telepon' => $row['telepon'],
            'npsn' => $row['npsn']
        ]);
    }
}
