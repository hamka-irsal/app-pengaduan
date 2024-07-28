<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magt_Penilaian extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_penilaian() {
        $query = $this->db->get('penilaian');
        return $query->result();
    }

    public function insert_penilaian($data) {
        return $this->db->insert('penilaian', $data);
    }

    public function get_penilaian_by_id($id) {
        $query = $this->db->get_where('penilaian', array('id' => $id));
        return $query->row();
    }

    public function update_penilaian($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('penilaian', $data);
    }

    public function delete_penilaian($id) {
        $this->db->where('id', $id);
        return $this->db->delete('penilaian');
    }

    public function count_pendapat($field, $value) {
        $this->db->where($field, $value);
        $this->db->from('penilaian');
        return $this->db->count_all_results();
    }

    public function get_penilaian_count()
    {
        $this->db->select('
            SUM(pendapat1 = "Sangat Memuaskan") as pendapat1_sangat_memuaskan,
            SUM(pendapat1 = "Memuaskan") as pendapat1_memuaskan,
            SUM(pendapat1 = "Kurang Memuaskan") as pendapat1_kurang_memuaskan,
            SUM(pendapat1 = "Tidak Memuaskan") as pendapat1_tidak_memuaskan,
            SUM(pendapat2 = "Sangat Memuaskan") as pendapat2_sangat_memuaskan,
            SUM(pendapat2 = "Memuaskan") as pendapat2_memuaskan,
            SUM(pendapat2 = "Kurang Memuaskan") as pendapat2_kurang_memuaskan,
            SUM(pendapat2 = "Tidak Memuaskan") as pendapat2_tidak_memuaskan,
            SUM(pendapat3 = "Sangat Memuaskan") as pendapat3_sangat_memuaskan,
            SUM(pendapat3 = "Memuaskan") as pendapat3_memuaskan,
            SUM(pendapat3 = "Kurang Memuaskan") as pendapat3_kurang_memuaskan,
            SUM(pendapat3 = "Tidak Memuaskan") as pendapat3_tidak_memuaskan,
            SUM(pendapat4 = "Sangat Memuaskan") as pendapat4_sangat_memuaskan,
            SUM(pendapat4 = "Memuaskan") as pendapat4_memuaskan,
            SUM(pendapat4 = "Kurang Memuaskan") as pendapat4_kurang_memuaskan,
            SUM(pendapat4 = "Tidak Memuaskan") as pendapat4_tidak_memuaskan,
            SUM(pendapat5 = "Sangat Memuaskan") as pendapat5_sangat_memuaskan,
            SUM(pendapat5 = "Memuaskan") as pendapat5_memuaskan,
            SUM(pendapat5 = "Kurang Memuaskan") as pendapat5_kurang_memuaskan,
            SUM(pendapat5 = "Tidak Memuaskan") as pendapat5_tidak_memuaskan
        ');
        $query = $this->db->get('penilaian');
        return $query->row_array();
    }
    
}
?>