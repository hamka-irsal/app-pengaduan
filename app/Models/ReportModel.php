<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'tanggal_pelaporan', 'nama', 'nip', 'jabatan', 'jenis_kerusakan', 'gambar', 'status', 'darurat', 'mendesak', 'jangka_panjang'];

    public function getAllReports()
    {
        return $this->findAll();
    }

    public function getReportById($id)
    {
        return $this->find($id);
    }

    public function updateWeightsById($id, $weights)
    {
        $data = [
            'darurat' => $weights['darurat'],
            'mendesak' => $weights['mendesak'],
            'jangka_panjang' => $weights['jangka_panjang'],
        ];

        $this->set($data)
             ->where('id', $id)
             ->update();
    }
}


