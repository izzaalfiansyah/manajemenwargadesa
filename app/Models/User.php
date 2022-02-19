<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $table = 'user';

    public $fillable = [
        'username',
        'password',
        'nama',
        'alamat',
        'telepon',
        'role',
    ];

    public $appends = [
        'role_detail',
    ];

    public function getRoleDetailAttribute()
    {
        return $this->role == '1' ? 'Admin' : 'Umum';
    }
}
