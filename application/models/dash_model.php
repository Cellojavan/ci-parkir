<?php

class dash_model extends CI_model{
    //kendaraan hari ini
    public function waktu(){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('Y-m-d');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->like("tgl_in",$month);
        return $this->db->get()->num_rows();
    }
    public function waktu1($hasil){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('Y-m-d');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where("id_lokasi",$hasil);
        $this->db->like("tgl_in",$month);
        return $this->db->get()->num_rows();
    }
    // yang masih dilokasi
    public function inside(){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('Y-m-d');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->like("status","In side");
        return $this->db->get()->num_rows();
    }
    public function inside1($hasil){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('Y-m-d');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where("id_lokasi",$hasil);
        $this->db->like("status","In side");
        return $this->db->get()->num_rows();
    }
    //menampilkan jumlah hari
    public function Tday1($hasil){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('Y-m-d');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where("id_lokasi",$hasil);
        $this->db->like("tgl_in",$month);
        return $this->db->get()->result_array();
    }
    public function Tday(){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('Y-m-d');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->like("tgl_in",$month);
        return $this->db->get()->result_array();
    }
    
     //menampilkan berdasarkan lokasi
    public function bulanan(){
        date_default_timezone_set("Asia/Jakarta"); 
        $query = $this->db->query("SELECT * FROM pengelolaan_parkir WHERE lokasi_id = 2 AND DATE_FORMAT(tgl_in, '%Y-%m') = DATE_FORMAT(CURRENT_DATE(), '%Y-%m');");
        return $query->num_rows();
    }
    //menampilkan jumlah bulan
    public function bulanann(){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('m');
        $query = $this->db->query("SELECT * FROM pengelolaan_parkir
        JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id WHERE month(tgl_in)='$month'");
        return $query->result_array();
    }
    public function bulanann1($hasil){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('m');
        $query = $this->db->query("SELECT * FROM pengelolaan_parkir
        JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id
        JOIN lokasi ON lokasi.id_lokasi = pengelolaan_parkir.lokasi_id 
        WHERE 
        id_lokasi LIKE '$hasil' AND
        month(tgl_in)='$month'");
        return $query->result_array();
    }

    public function cekLokasi(){

        return $this->db->get('lokasi')->result_array();
    }

   
    
    
}

?>