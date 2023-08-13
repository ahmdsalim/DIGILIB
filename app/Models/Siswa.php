<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Sekolah;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nisn','nama','jk','telepon','npsn'];

    public function user()
    {
    	return $this->morphOne(User::class, 'userable');
    }

    public function sekolah()
    {
    	return $this->belongsTo(Sekolah::class, 'npsn', 'npsn');
    }

}
