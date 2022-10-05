<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produsen extends Model
{
    use HasFactory;
    protected $fillable = ['nama','alamat','ket_bahan','kec_id','lokasi_pemasaran'];
    public function kecamatan()
    {
        return $this->belongsTo(\App\Models\Kecamatan::class, 'kec_id');
    }
    public function kota()
    {
        return $this->belongsTo(\App\Models\Kota::class, 'kota_id');
    }
}
