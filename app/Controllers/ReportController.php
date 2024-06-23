<?php

namespace App\Controllers;

use App\Models\ReportModel;

class ReportController extends BaseController
{
    public function index()
    {
        $model = new ReportModel();
        $data['reports'] = $model->findAll();
        return view('reports/index', $data);
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
            session()->setFlashdata('success', 'Laporan berhasil dikirim');
            return redirect()->to('/page/pengaduan');
        }

        return redirect()->back()->withInput()->with('error', 'There was a problem uploading the file.');
    }

    public function confirmReport($id)
    {
        $reportModel = new ReportModel();

        $reportModel->update($id, ['status' => 'confirmed']);

        return redirect()->to('/reports')->with('message', 'Laporan berhasil dikonfirmasi');
    }

    public function delete($id)
    {
        $model = new ReportModel();
        $model->delete($id);
        return redirect()->to('/reports');
    }
}
