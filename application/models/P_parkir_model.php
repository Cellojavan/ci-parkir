<?php 

class P_parkir_model extends CI_model{

    public function getAllParkir(){
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");

        return $this->db->get()->result_array();
    }
    public function perPage($awalData,$jumlahDataPerhalaman){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('m');
        $query = $this->db->query("SELECT * FROM pengelolaan_parkir
        JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id 
        JOIN lokasi ON lokasi.id_lokasi = pengelolaan_parkir.lokasi_id 
        ORDER BY tgl_in DESC
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    }

    public function tambahPengelolaan($tglin,$status,$foto,$nopol,$tarifnew,$jeniskendaraan,$lokasinew,$petugasin){

        $data = [

            "nopol" => $nopol,
            "status" => $status,
            "petugas_in" => $petugasin,
            "foto_in" => $foto,
            "tgl_in" => $tglin,
            "tgl_out" => '',
            "foto_out" => '',
            "lokasi_id" => $lokasinew,
            "jenis_kendaraan_id" => $jeniskendaraan,
            "tarif_parkir_id" => $tarifnew

        ];


        $this->db->insert('pengelolaan_parkir', $data);
    }

  

    public function getById($id){

        $this->db->where("id_pengelolaan_parkir", $id);
        return $this->db->get('pengelolaan_parkir')->row_array();
    }
    public function getByName(){
        $id = $this->session->userdata("nama_user");
        $this->db->where("nama_petugas", $id);
        return $this->db->get('petugas')->row_array();
    }
    public function getLokasi($carilokasi){
        $this->db->where("id_lokasi", $carilokasi);
        return $this->db->get('lokasi')->row_array();
    }
    public function getByIdLokasi($lokasi){
        $this->db->where("nama_lokasi", $lokasi);
        return $this->db->get('lokasi')->row_array();
    }
    public function Total(){
        return $this->db->get('pengelolaan_parkir')->num_rows();
    }
    

    public function UpdateOut($tglout,$status,$foto,$petugasout){

        $data = [

            "tgl_out" => $tglout,
            "status" => $status,
            "foto_out" => $foto,
            "petugas_out" => $petugasout

        ];

        $this->db->where("id_pengelolaan_parkir", $this->input->post("id"));
        $this->db->update("pengelolaan_parkir", $data);
    }

    public function get_keywoard($dari,$ke,$hasil){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where("id_lokasi",$hasil);
        $this->db->like("tgl_in",$dari);
        $this->db->or_like("tgl_in",$ke);
        return $this->db->get()->result_array();
    
    }
    public function get_keywoard1($dari,$ke){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->like("tgl_in",$dari);
        $this->db->or_like("tgl_in",$ke);
        return $this->db->get()->result_array();
    
    }
    public function TotalRows($dari,$ke){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where('tgl_in BETWEEN "'. date('Y-m-d H:i:s', strtotime($dari.' 00:00:00')). '" and "'. date('Y-m-d H:i:s', strtotime($ke.' 23:59:59')).'"');
        return $this->db->get()->num_rows();
    
    }
   
    public function TotalRowskeyword($keywoard){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->like("nopol",$keywoard);
        return $this->db->get()->num_rows();
    
    }
    public function TotalRowskeyword1($keywoard,$hasil){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where("id_lokasi",$hasil);
        $this->db->like("nopol",$keywoard);
        return $this->db->get()->num_rows();
    
    }
    public function get_key1($dari,$ke,$awalData, $jumlahDataPerhalaman){
        
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where('tgl_in BETWEEN "'. date('Y-m-d H:i:s', strtotime($dari.' 00:00:00')). '" and "'. date('Y-m-d H:i:s', strtotime($ke.' 23:59:59')).'"');
        $this->db->order_by("tgl_in", "DESC");
        $this->db->limit($jumlahDataPerhalaman,$awalData);
        return $this->db->get()->result_array();
    }

  

    public function get_ketik($keywoard,$hasil){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where("id_lokasi",$hasil);
        $this->db->like("nopol",$keywoard);
        return $this->db->get()->result_array();
    
    }
    public function get_ketik1($keywoard){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->like("nopol",$keywoard);
        return $this->db->get()->result_array();
    
    }
    public function get_keyword1($keywoard,$awalData, $jumlahDataPerhalaman){
        
        $query = $this->db->query("SELECT * FROM pengelolaan_parkir
        JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id
        JOIN lokasi ON lokasi.id_lokasi = pengelolaan_parkir.lokasi_id 
        WHERE 
        nopol LIKE '%$keywoard%'
        ORDER BY tgl_in DESC
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    }
    public function get_lokasi($hasil){
        $query = $this->db->query("SELECT * FROM pengelolaan_parkir
        JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id
        JOIN lokasi ON lokasi.id_lokasi = pengelolaan_parkir.lokasi_id 
        WHERE 
        id_lokasi LIKE '$hasil' ");
        return $query->num_rows();
    
    }
    public function get_lokasi22($hasil,$awalData,$jumlahDataPerhalaman){
        $query = $this->db->query("SELECT * FROM pengelolaan_parkir
        JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id
        JOIN lokasi ON lokasi.id_lokasi = pengelolaan_parkir.lokasi_id 
        WHERE 
        id_lokasi LIKE '$hasil'
        ORDER BY tgl_in DESC
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    
    }

    public function TotalRows1($dari,$ke,$hasil){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where('tgl_in BETWEEN "'. date('Y-m-d H:i:s', strtotime($dari.' 00:00:00')). '" and "'. date('Y-m-d H:i:s', strtotime($ke.' 23:59:59')).'"');
        $this->db->like("id_lokasi",$hasil);
        return $this->db->get()->num_rows();
    }
    public function get_keyword22($hasil,$keywoard,$awalData,$jumlahDataPerhalaman){
        
        $query = $this->db->query("SELECT * FROM pengelolaan_parkir
        JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id
        JOIN lokasi ON lokasi.id_lokasi = pengelolaan_parkir.lokasi_id 
        WHERE 
        id_lokasi LIKE '$hasil' AND
        nopol LIKE '%$keywoard%'
        ORDER BY tgl_in DESC
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    }
    public function get_key22($hasil,$dari,$ke,$awalData,$jumlahDataPerhalaman){
       
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->where('tgl_in BETWEEN "'. date('Y-m-d H:i:s', strtotime($dari.' 00:00:00')). '" and "'. date('Y-m-d H:i:s', strtotime($ke.' 23:59:59')).'"');
        $this->db->like("id_lokasi",$hasil);
        $this->db->order_by("tgl_in", "DESC");
        $this->db->limit($jumlahDataPerhalaman,$awalData);
        return $this->db->get()->result_array();
    }
    public function get_lokasi11($hasil,$awalData,$jumlahDataPerhalaman){
        
        $query = $this->db->query("SELECT * FROM pengelolaan_parkir
        JOIN jenis_kendaraan ON jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id
        JOIN lokasi ON lokasi.id_lokasi = pengelolaan_parkir.lokasi_id 
        WHERE 
        id_lokasi LIKE '$hasil'
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    }
    
    
 




        

    
    
}
?>