<?php 

class laporan_model extends CI_model{

    public function tampilLokasi(){
        return $this->db->get('lokasi')->result_array();
    }

    
    public function getTanggal($lokasi,$tanggalawal,$tanggalakhir){
         

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where('tgl_in BETWEEN "'. date('Y-m-d H:i:s', strtotime($tanggalawal.' 00:00:00')). '" and "'. date('Y-m-d H:i:s', strtotime($tanggalakhir.' 23:59:59')).'"');
        $this->db->like("id_lokasi",$lokasi);
        return $this->db->get()->result_array();
    }

    public function cekTanggal($cr){
        $keywoard = $this->input->get('lokasi');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where("id_lokasi",$keywoard);
        $this->db->like("tgl_in",$cr);
        return $this->db->get()->num_rows();
    }
    public function cekkendaraan($cr){
        $keywoard = $this->input->get('lokasi');
        $query = $this->db->query("SELECT DISTINCT jenis_kendaraan FROM pengelolaan_parkir
        JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id
        JOIN lokasi ON lokasi.id_lokasi = pengelolaan_parkir.lokasi_id  
        WHERE id_lokasi LIKE '$keywoard' AND
        tgl_in LIKE '$cr%' ");
        return $query->result_array();
    }
    public function cekRowskendaraan($cr,$done){
        $keywoard = $this->input->get('lokasi');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where("id_lokasi",$keywoard);
        $this->db->where("id_jenis_kendaraan",$done);
        $this->db->like("tgl_in",$cr);
        return $this->db->get()->num_rows();
    }
    public function cekTarif($kndr){

        return $this->db->get_where('jenis_kendaraan', ["jenis_kendaraan" => $kndr])->result_array();
        
    }
    public function cekIdTarif($tariff){

        return $this->db->get_where('jenis_kendaraan', ["tarif_parkir" => $tariff])->result_array();
        
    }
    public function cariLokasi(){
        $id = $this->input->get('lokasi');
        return $this->db->get_where('lokasi', ["id_lokasi" => $id])->result_array();
        
    }
    public function rowsQt(){
        $dari = $this->input->get('tanggalawal');
        $ke = $this->input->get('tanggalakhir');
        $keywoard = $this->input->get('lokasi');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where('tgl_in BETWEEN "'. date('Y-m-d H:i:s', strtotime($dari.' 00:00:00')). '" and "'. date('Y-m-d H:i:s', strtotime($ke.' 23:59:59')).'"');
        $this->db->like("id_lokasi",$keywoard);
        return $this->db->get()->num_rows();
    }
    public function rowsTotal(){
        $dari = $this->input->get('tanggalawal');
        $ke = $this->input->get('tanggalakhir');
        $keywoard = $this->input->get('lokasi');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where('tgl_in BETWEEN "'. date('Y-m-d H:i:s', strtotime($dari.' 00:00:00')). '" and "'. date('Y-m-d H:i:s', strtotime($ke.' 23:59:59')).'"');
        $this->db->like("id_lokasi",$keywoard);
        return $this->db->get()->result_array();
    }
    
}

?>