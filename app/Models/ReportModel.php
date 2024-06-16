<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'tanggal_pelaporan', 'nama', 'nip', 'jabatan', 'jenis_kerusakan', 'gambar'];
}
