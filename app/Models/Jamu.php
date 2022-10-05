<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamu extends Model
{
    use HasFactory;
    protected $fillable = ['detail_id','persediaan','kemasan','produsen_id'];
    public function detailjamu()
    {
        return $this->belongsTo(\App\Models\Detailjamu::class, 'detail_id');
    }
    public function produsen()
    {
        return $this->belongsTo(\App\Models\Produsen::class, 'produsen_id');
    }
}
