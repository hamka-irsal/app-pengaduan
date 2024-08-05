<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Cadm_topsis extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('Madm_topsis');
		$this->load->helper('url','form');
	}

    public function index() {
        // Ambil data pengaduan
        $pengaduanData = $this->Madm_topsis->getPengaduanData();
        
        // Bobot kriteria
        $weights = [3, 2, 1]; // Biaya, SDM, Regulasi
        
        // Matriks keputusan
        $decisionMatrix = [];
        foreach ($pengaduanData as $row) {
            $decisionMatrix[] = [$row['biaya'], $row['sdm'], $row['regulasi']];
        }
        
        // Normalisasi matriks keputusan
        $normalizedMatrix = $this->normalizeDecisionMatrix($decisionMatrix);
        
        // Matriks keputusan berbobot
        $weightedNormalizedMatrix = $this->calculateWeightedMatrix($normalizedMatrix, $weights);
        
        // Solusi ideal positif dan negatif
        list($positiveIdealSolution, $negativeIdealSolution) = $this->calculateIdealSolutions($weightedNormalizedMatrix);
        
        // Hitung jarak ke solusi ideal
        $distances = $this->calculateDistances($weightedNormalizedMatrix, $positiveIdealSolution, $negativeIdealSolution);
        
        // Hitung skor preferensi
        $preferenceScores = $this->calculatePreferenceScores($distances);
        
        // Urutkan pengaduan berdasarkan skor preferensi
        array_multisort($preferenceScores, SORT_DESC, $pengaduanData);

        // Tampilkan hasil
        $data['pengaduanData'] = $pengaduanData;
        $data['preferenceScores'] = $preferenceScores;
        
        $this->load->view('adm_topsis', $data);
    }

    private function normalizeDecisionMatrix($matrix) {
        $normalizedMatrix = [];
        $colSums = [];
    
        // Hitung akar kuadrat dari jumlah kuadrat setiap kolom
        foreach ($matrix[0] as $colIndex => $value) {
            $colSums[$colIndex] = 0;
            foreach ($matrix as $row) {
                $colSums[$colIndex] += pow($row[$colIndex], 2);
            }
            $colSums[$colIndex] = sqrt($colSums[$colIndex]);
    
            // Jika colSums adalah nol, setel ke 1 untuk mencegah pembagian dengan nol
            if ($colSums[$colIndex] == 0) {
                $colSums[$colIndex] = 1;
            }
        }
    
        // Normalisasi setiap nilai
        foreach ($matrix as $row) {
            $normalizedRow = [];
            foreach ($row as $colIndex => $value) {
                $normalizedRow[] = $value / $colSums[$colIndex];
            }
            $normalizedMatrix[] = $normalizedRow;
        }
    
        return $normalizedMatrix;
    }

    private function calculateWeightedMatrix($normalizedMatrix, $weights) {
        $weightedMatrix = [];
        foreach ($normalizedMatrix as $row) {
            $weightedRow = [];
            foreach ($row as $index => $value) {
                $weightedRow[] = $value * $weights[$index];
            }
            $weightedMatrix[] = $weightedRow;
        }
        return $weightedMatrix;
    }

    private function calculateIdealSolutions($weightedMatrix) {
        $positiveIdealSolution = [];
        $negativeIdealSolution = [];
    
        foreach ($weightedMatrix[0] as $colIndex => $value) {
            $colValues = array_column($weightedMatrix, $colIndex);
            $positiveIdealSolution[] = max($colValues);
            $negativeIdealSolution[] = min($colValues);
        }
    
        return [$positiveIdealSolution, $negativeIdealSolution];
    }

    private function calculateDistances($weightedMatrix, $positiveIdealSolution, $negativeIdealSolution) {
        $distances = ['positive' => [], 'negative' => []];
    
        foreach ($weightedMatrix as $row) {
            $positiveDistance = 0;
            $negativeDistance = 0;
            foreach ($row as $index => $value) {
                $positiveDistance += pow($value - $positiveIdealSolution[$index], 2);
                $negativeDistance += pow($value - $negativeIdealSolution[$index], 2);
            }
            $distances['positive'][] = sqrt($positiveDistance);
            $distances['negative'][] = sqrt($negativeDistance);
        }
    
        return $distances;
    }

    private function calculatePreferenceScores($distances) {
        $preferenceScores = [];
    
        for ($i = 0; $i < count($distances['positive']); $i++) {
            $sumDistances = $distances['positive'][$i] + $distances['negative'][$i];
            
            // Pastikan sumDistances tidak nol
            if ($sumDistances == 0) {
                $sumDistances = 1; // Atau nilai lain yang sesuai
            }
    
            $preferenceScores[] = $distances['negative'][$i] / $sumDistances;
        }
    
        return $preferenceScores;
    }
}

?>