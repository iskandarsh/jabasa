<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kecamatan','kota_id'];
    public function kota()
    {
        return $this->belongsTo(\App\Models\Kota::class, 'kota_id');
    }
}
