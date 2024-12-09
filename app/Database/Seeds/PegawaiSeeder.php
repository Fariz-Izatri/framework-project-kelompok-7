<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nip' => '123456789',
                'nama' => 'John Doe',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Contoh No.1',
                'no_handphone' => '08123456789',
                'jabatan' => 'Manager',
                'lokasi_presensi' => 'Surabaya',
                'foto' => 'johndoe.jpg',
            ],
            [
                'nip' => '987654321',
                'nama' => 'Jane Doe',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Contoh No.2',
                'no_handphone' => '08234567890',
                'jabatan' => 'Staff',
                'lokasi_presensi' => 'Surabaya',
                'foto' => 'janedoe.jpg',
            ],
        ];

        // Menambahkan data ke tabel pegawai
        $this->db->table('pegawai')->insertBatch($data);
    }
}
