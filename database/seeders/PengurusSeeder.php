<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pengurus::create([
            'ketua_rw' => 'Dimas Maulana Iqbal',
            'ketua_rt' => 'Dicky Rahmat Firmansyah',
            'sekretaris' => 'Muhammad Izza Alfiansyah',
            'bendahara' => 'Sindi Permata Zahro',
            'seksi_seksi' => [
                [
                    'bagian' => 'Keagamaan',
                    'petugas' => 'Dianatul Fitriyah',
                ],
                [
                    'bagian' => 'Keamanan',
                    'petugas' => 'Condro Asep Saputra',
                ],
                [
                    'bagian' => 'Perlengkapan Inventaris',
                    'petugas' => 'Raga Mulya Pratama',
                ],
                [
                    'bagian' => 'Acara I',
                    'petugas' => 'Ivan Ahmad Zidane',
                ],
                [
                    'bagian' => 'Acara II',
                    'petugas' => 'Pinasih Pamuncak',
                ],
            ],
        ]);
    }
}
