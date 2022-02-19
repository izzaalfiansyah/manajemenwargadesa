<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    public $table = 'keluarga';

    public $fillable = [
        'nomor_kk',
        'alamat_domisili',
        'status_rumah',
        'kepala_keluarga_id',
        'anggota_id',
        'file_kk',
    ];

    public $casts = [
        'anggota_id' => 'object',
    ];

    public $appends = [
        'status_rumah_detail',
        'file_kk_url',
        'anggota',
    ];

    public $with = [
        'kepala_keluarga',
    ];

    public function getStatusRumahDetailAttribute()
    {
        return $this->status_rumah == '1' ? 'Milik Sendiri' : 'Kontrak';
    }

    public function getFileKkUrlAttribute()
    {
        return asset($this::fileKkPath . $this->file_kk);
    }

    public function getAnggotaAttribute()
    {
        $data = [];
        
        foreach ($this->anggota_id as $item) {
            $data[] = Warga::find($item);
        }

        return $data;
    }

    public function kepala_keluarga()
    {
        return $this->belongsTo(Warga::class, 'kepala_keluarga_id');
    }

    const rules = [
        'nomor_kk' => 'required|numeric',
        'alamat_domisili' => 'required',
        'status_rumah' => 'required|in:1,2',
        'kepala_keluarga_id' => 'required|integer',
        'anggota_id' => 'required',
        'anggota_id.*' => 'required',
    ];

    const fileKkPath = 'keluarga_kk/';
}
