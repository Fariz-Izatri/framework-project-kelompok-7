<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Controller;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        $data['pegawai'] = $pegawaiModel->findAll();
        return view('pegawai/index', $data);
    }

    public function create()
    {
        return view('pegawai/create');
    }

    public function store()
    {
        $pegawaiModel = new PegawaiModel();

        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_handphone' => $this->request->getPost('no_handphone'),
            'jabatan' => $this->request->getPost('jabatan'),
            'lokasi_presensi' => $this->request->getPost('lokasi_presensi'),
            'foto' => $this->request->getPost('foto'),
        ];

        // Menyimpan data
        if ($pegawaiModel->save($data)) {
            return redirect()->to('/pegawai')->with('message', 'Data Pegawai berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $pegawaiModel = new PegawaiModel();
        $data['pegawai'] = $pegawaiModel->find($id);
        return view('pegawai/edit', $data);
    }

    public function update($id)
    {
        $pegawaiModel = new PegawaiModel();

        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_handphone' => $this->request->getPost('no_handphone'),
            'jabatan' => $this->request->getPost('jabatan'),
            'lokasi_presensi' => $this->request->getPost('lokasi_presensi'),
            'foto' => $this->request->getPost('foto'),
        ];

        // Mengupdate data
        if ($pegawaiModel->update($id, $data)) {
            return redirect()->to('/pegawai')->with('message', 'Data Pegawai berhasil diperbarui');
        }
    }

    public function delete($id)
    {
        $pegawaiModel = new PegawaiModel();
        $pegawaiModel->delete($id);
        return redirect()->to('/pegawai')->with('message', 'Data Pegawai berhasil dihapus');
    }
}
