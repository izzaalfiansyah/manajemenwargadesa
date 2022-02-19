<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    public $table = 'inventaris';

    public $fillable = [
        'nama',
        'spesifikasi',
        'jumlah',
    ];

    const rules = [
        'nama' => 'required',
        'spesifikasi' => 'required',
        'jumlah' => 'required|integer',
    ];
}
