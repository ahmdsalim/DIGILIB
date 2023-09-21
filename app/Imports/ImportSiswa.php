<?php

namespace App\Imports;

use App\Models\siswa;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportSiswa implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $npsn;

    public function __construct(String $npsn) 
    {
        $this->npsn = $npsn;
    }

    public function model(array $row)
    {

        return new Siswa([
            'nisn' => $row['nisn'],
            'nama' => $row['nama'],
            'jk' => $row['jk'],
            'telepon' => $row['telepon'],
            'npsn' => $this->npsn
        ]);
    }

    public function rules(): array
    {
        return [
            'nisn' => 'required|unique:siswas',
            'nama' => 'required',
            'jk' => 'required',
            'telepon' => 'required'
        ];
    }

    public function headingRow(): int
    {
        return 4;
    }
}
