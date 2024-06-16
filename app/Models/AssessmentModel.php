<?php

namespace App\Models;

use CodeIgniter\Model;

class AssessmentModel extends Model
{
    protected $table = 'assessments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'tanggal_penilaian', 'nama', 'nip', 'jabatan', 'isi_penilaian'];
}
