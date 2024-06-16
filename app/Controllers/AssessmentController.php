<?php

namespace App\Controllers;

use App\Models\AssessmentModel;

class AssessmentController extends BaseController
{
    public function index()
    {
        $model = new AssessmentModel();
        $data['assessments'] = $model->findAll();
        return view('assessments/index', $data);
    }

    public function create()
    {
        return view('assessments/create');
    }

    public function store()
    {
        $model = new AssessmentModel();
        $data = [
            'email' => $this->request->getPost('email'),
            'tanggal_penilaian' => $this->request->getPost('tanggal_penilaian'),
            'nama' => $this->request->getPost('nama'),
            'nip' => $this->request->getPost('nip'),
            'jabatan' => $this->request->getPost('jabatan'),
            'isi_penilaian' => $this->request->getPost('isi_penilaian')
        ];
        $model->insert($data);
        return redirect()->to('/assessments');
    }
}
