<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataats extends Model
{
    use HasFactory;
    protected $table = 'dataats';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idats',
        'namaats',
        'stokats',
    ];
    public $timestamps = true;
}
