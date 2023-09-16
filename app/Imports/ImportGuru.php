<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportGuru implements ToModel, SkipsOnFailure, WithHeadingRow, WithValidation
{
    use Importable,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'nip' => $row['nip'],
            'nama' => $row['nama'],
            'jk' => $row['jk'],
            'telepon' => $row['telepon'],
            'npsn' => $row['npsn'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nip' => 'required|unique:gurus',
            'nama' => 'required',
            'jk' => 'required',
            'telepon' => 'required',
            'npsn' => 'required'
        ];
    }

    public function headingRow(): int
    {
        return 4;
    }
}
