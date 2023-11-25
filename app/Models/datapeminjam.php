<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapeminjam extends Model
{
    use HasFactory;
    protected $table = 'datapeminjam';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idats',
        'namaats',
        'jumlah',
        'namapeminjam',
        'tgl',
        'fotopeminjam',
    ];
    public $timestamps = true;
}
