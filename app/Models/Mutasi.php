<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    public $table = 'mutasi';

    public $fillable = [
        'nama',
        'deskripsi',
    ];

    const rules = [
        'nama' => 'required',
        'deskripsi' => 'nullable',
    ];
}
