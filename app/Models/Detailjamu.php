<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailjamu extends Model
{
    use HasFactory;
    protected $fillable = ['nama_jamu','manfaat','formula','efeksamping','jenis'];
}
