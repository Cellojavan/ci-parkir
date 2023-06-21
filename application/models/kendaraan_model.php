<?php 

class kendaraan_model extends CI_model{

    public function getKendaraan(){

        $this->db->select("*");
        $this->db->from("jenis_kendaraan");
        $this->db->join("lokasi", "lokasi.id_lokasi = jenis_kendaraan.lokasi_id", "left");
        return $this->db->get()->result_array();
    }

    public function row_kendaraan_keywoard($keywoard){

        $this->db->select("*");
        $this->db->from("jenis_kendaraan");
        $this->db->join("lokasi", "lokasi.id_lokasi = jenis_kendaraan.lokasi_id", "left");
        $this->db->like("nama_lokasi",$keywoard);
        $this->db->or_like("jenis_kendaraan",$keywoard);

        return $this->db->get()->num_rows();

    }

    public function getKendaraanKeywoard($keywoard,$awalData,$jumlahDataPerhalaman){

        $query = $this->db->query("SELECT * FROM jenis_kendaraan
        JOIN lokasi ON lokasi.id_lokasi = jenis_kendaraan.lokasi_id 
        WHERE
        nama_lokasi LIKE '$keywoard' OR
        jenis_kendaraan LIKE '$keywoard'
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
        

    }
    public function getAllKendaraan($awalData,$jumlahDataPerhalaman){

        $query = $this->db->query("SELECT * FROM jenis_kendaraan
        JOIN lokasi ON lokasi.id_lokasi = jenis_kendaraan.lokasi_id 
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    }
    public function row_kendaraan(){

        $this->db->select("*");
        $this->db->from("jenis_kendaraan");
        $this->db->join("lokasi", "lokasi.id_lokasi = jenis_kendaraan.lokasi_id", "left");
        return $this->db->get()->num_rows();
    }

    

    public function tambahKendaraan(){

        $data = [
            "lokasi_id" => $this->input->post("lokasiid"),
            "jenis_kendaraan" => $this->input->post("jeniskendaraan"),
            "tarif_parkir" => $this->input->post("tarif"),
        ];

        $this->db->insert("jenis_kendaraan", $data);
    }

    public function getById($id){

        return $this->db->get_where("jenis_kendaraan", ["id_jenis_kendaraan" => $id])->row_array();
    }

    public function editKendaraan(){

        $data = [
            "lokasi_id" => $this->input->post("lokasiid"),
            "jenis_kendaraan" => $this->input->post("jeniskendaraan"),
            "tarif_parkir" => $this->input->post("tarif"),
        ];

        $this->db->where("id_jenis_kendaraan", $this->input->post("id"));
        $this->db->update("jenis_kendaraan", $data);
    }

   
}

?>