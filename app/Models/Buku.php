<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\Koleksi;
use App\Models\Rating;
use App\Models\Baca;
use App\Models\Kategori;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function koleksi()
    {
    	return $this->belongsTo(Koleksi::class);
    }

    public function rating()
    {
    	return $this->belongsTo(Rating::class);
    }

    public function baca()
    {
    	return $this->belongsTo(Baca::class);
    }

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
    	return $this->hasOne(User::class,'email','email');
    }

}
