<?php

namespace App\Controllers;

use App\Models\ReportModel;

class PengaduanController extends BaseController
{
    public function index()
    {
        $model = new ReportModel();
        $data['pengaduan'] = $model->findAll();
        return view('page/pengaduan', $data);
    }

    public function create()
    {
        return view('reports/create');
    }

    public function store()
    {
        $model = new ReportModel();
        $file = $this->request->getFile('gambar');

        // Move file to the uploads folder
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move('uploads');
            $fileName = $file->getName();

            $data = [
                'email' => $this->request->getPost('email'),
                'tanggal_pelaporan' => $this->request->getPost('tanggal_pelaporan'),
                'nama' => $this->request->getPost('nama'),
                'nip' => $this->request->getPost('nip'),
                'jabatan' => $this->request->getPost('jabatan'),
                'jenis_kerusakan' => $this->request->getPost('jenis_kerusakan'),
                'gambar' => $fileName
            ];
            $model->insert($data);
            return redirect()->to('/page/pengaduan/success');
        }

        return redirect()->back()->withInput()->with('error', 'There was a problem uploading the file.');
    }
    public function success()
    {
        return "Pengaduan berhasil dikirim.";
    }
}
