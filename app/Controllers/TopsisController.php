<?php

namespace App\Controllers;

use App\Models\ReportModel;

class TopsisController extends BaseController
{
    public function index()
    {
        $reportModel = new ReportModel();
        $reports = $reportModel->getAllReports();
        
        list($topsisResults, $weights) = $this->topsis($reports);
        
        $data = [
            'reports' => $topsisResults,
            'weights' => $weights,
            'total_score' => array_sum(array_column($topsisResults, 'score'))
        ];
        
        return view('topsis/index', $data);
    }

    public function editWeight($id)
    {
        $reportModel = new ReportModel();
        $report = $reportModel->getReportById($id);

        // Jika laporan tidak ditemukan
        if (!$report) {
            return redirect()->to('/topsis')->with('error', 'Laporan tidak ditemukan.');
        }

        // Proses simpan perubahan bobot
        if ($this->request->getMethod() === 'post') {
            $weights = [
                'darurat' => $this->request->getPost('darurat'),
                'mendesak' => $this->request->getPost('mendesak'),
                'jangka_panjang' => $this->request->getPost('jangka_panjang'),
            ];

            // Validasi bobot di sini jika diperlukan

            $reportModel->updateWeightsById($id, $weights);

            return redirect()->to('/topsis')->with('success', 'Bobot kriteria berhasil diubah.');
        }

        $data = [
            'report' => $report,
        ];

        return view('topsis/edit', $data);
    }

    public function updateWeight()
    {
        $reportId = $this->request->getPost('report_id');
        $darurat = $this->request->getPost('darurat');
        $mendesak = $this->request->getPost('mendesak');
        $jangkaPanjang = $this->request->getPost('jangka_panjang');
        
        $reportModel = new ReportModel();
        $reportModel->update($reportId, [
            'darurat' => $darurat,
            'mendesak' => $mendesak,
            'jangka_panjang' => $jangkaPanjang
        ]);
        
        return redirect()->to('/topsis')->with('success', 'Bobot berhasil diperbarui.');
    }

    private function topsis($reports)
    {
        // Tahap 1: Membuat matrix keputusan berdasarkan kriteria
        $criteria = ['darurat', 'mendesak', 'jangka_panjang'];
        $matrix = [];
        
        foreach ($reports as $report) {
            $row = [];
            foreach ($criteria as $criterion) {
                $row[] = (float)$report[$criterion];
            }
            $matrix[] = $row;
        }
        
        // Tahap 2: Normalisasi matrix
        $normalizedMatrix = [];
        foreach ($matrix as $row) {
            $normalizedRow = [];
            foreach ($criteria as $index => $criterion) {
                $denominator = sqrt(array_sum(array_map(function($item) use ($index) {
                    return (float)$item[$index] ** 2;
                }, $matrix)));
                
                // Pengecekan untuk menghindari pembagian dengan nol
                if ($denominator == 0) {
                    $normalizedRow[] = 0;
                } else {
                    $normalizedRow[] = $row[$index] / $denominator;
                }
            }
            $normalizedMatrix[] = $normalizedRow;
        }
        
        // Tahap 3: Menentukan bobot kriteria
        $weights = [0.5, 0.3, 0.2]; // Contoh bobot kriteria
        
        // Tahap 4: Menghitung matrix terbobot
        $weightedMatrix = [];
        foreach ($normalizedMatrix as $row) {
            $weightedRow = [];
            foreach ($criteria as $index => $criterion) {
                $weightedRow[] = $row[$index] * $weights[$index];
            }
            $weightedMatrix[] = $weightedRow;
        }
        
        // Tahap 5: Menentukan solusi ideal positif dan negatif
        $idealPositive = array_map('max', array_transpose($weightedMatrix));
        $idealNegative = array_map('min', array_transpose($weightedMatrix));
        
        // Tahap 6: Menghitung jarak ke solusi ideal positif dan negatif
        $distancesPositive = [];
        $distancesNegative = [];
        
        foreach ($weightedMatrix as $row) {
            $distPositive = 0;
            $distNegative = 0;
            foreach ($criteria as $index => $criterion) {
                $distPositive += ($row[$index] - $idealPositive[$index]) ** 2;
                $distNegative += ($row[$index] - $idealNegative[$index]) ** 2;
            }
            $distancesPositive[] = sqrt($distPositive);
            $distancesNegative[] = sqrt($distNegative);
        }
        
        // Tahap 7: Menghitung skor preferensi untuk setiap alternatif
        $scores = [];
        foreach ($distancesPositive as $index => $distancePositive) {
            // Pengecekan untuk menghindari pembagian dengan nol
            $denominator = $distancesPositive[$index] + $distancesNegative[$index];
            if ($denominator == 0) {
                $scores[$index] = 0;
            } else {
                $scores[$index] = $distancesNegative[$index] / $denominator;
            }
        }
        
        // Menggabungkan skor ke laporan
        foreach ($reports as $index => &$report) {
            $report['score'] = $scores[$index];
        }
        
        // Mengurutkan laporan berdasarkan skor preferensi
        usort($reports, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });
        
        return [$reports, $weights];
    }
}

// Helper function to transpose a 2D array
function array_transpose($array)
{
    array_unshift($array, null);
    return call_user_func_array('array_map', $array);
}
