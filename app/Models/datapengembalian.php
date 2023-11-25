<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapengembalian extends Model
{
    use HasFactory;
    protected $table = 'datapengembalian';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idats',
        'namaats',
        'jumlah',
        'namapengembalian',
        'tgl',
        'fotopengembalian',
    ];
    public $timestamps = true;
}
