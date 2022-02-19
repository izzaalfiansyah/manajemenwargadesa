<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    public $table = 'pengurus';

    public $fillable = [
        'ketua_rt',
        'ketua_rw',
        'sekretaris',
        'bendahara',
        'seksi_seksi',
    ];

    public $casts = [
        'seksi_seksi' => 'object',
    ];

    const rules = [
        'ketua_rt' => 'required',
        'ketua_rw' => 'required',
        'sekretaris' => 'required',
        'bendahara' => 'required',
        'seksi_seksi' => 'required',
        'seksi_seksi.*' => 'required',
    ];
}
