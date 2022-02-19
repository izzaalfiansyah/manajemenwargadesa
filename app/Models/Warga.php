<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    public $table = 'warga';

    public $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pekerjaan',
        'telepon',
        'mutasi_id',
        'status_keluarga',
        'file_ktp',
    ];

    public $appends = [
        'file_ktp_url',
        'tanggal_lahir_local',
    ];

    public $with = [
        'mutasi'
    ];

    public function getTanggalLahirLocalAttribute()
    {
        return date('d M Y', strtotime($this->tanggal_lahir));
    }

    public function getFileKtpUrlAttribute()
    {
        return asset($this::fileKtpPath . $this->file_ktp);
    }

    public function mutasi()
    {
        return $this->belongsTo(Mutasi::class, 'mutasi_id');
    }

    const rules = [
        'nik' => 'required',
        'nama' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'agama' => 'required',
        'pekerjaan' => 'nullable',
        'telepon' => 'required',
        'mutasi_id' => 'required|integer',
        'status_keluarga' => 'required',
    ];

    const fileKtpPath = 'warga_ktp/';
}
