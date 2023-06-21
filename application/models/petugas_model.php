<?php 

class petugas_model extends CI_model{


    public function getAllPetugas($awalData,$jumlahDataPerhalaman){

        $query = $this->db->query("SELECT * FROM petugas
        JOIN lokasi ON lokasi.id_lokasi = petugas.lokasi_id 
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    }
    public function row_petugas(){
        return $query = $this->db->get('petugas')->num_rows();;

    }
    public function row_petugas_keywoard($keywoard){
        $query = $this->db->query("SELECT * FROM petugas
        JOIN lokasi ON lokasi.id_lokasi = petugas.lokasi_id 
        WHERE
        nama_lokasi LIKE '$keywoard' OR
        nama_petugas LIKE '$keywoard'
        ");
        return $query->num_rows();

    }
    public function getPetugasKeywoard($keywoard,$awalData,$jumlahDataPerhalaman){
        $query = $this->db->query("SELECT * FROM petugas
        JOIN lokasi ON lokasi.id_lokasi = petugas.lokasi_id 
        WHERE
        nama_lokasi LIKE '$keywoard' OR
        nama_petugas LIKE '$keywoard'
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    }
    public function tampilPetugas(){
        $keywoard = 'petugas';
        $this->db->select("*");
        $this->db->from("user");
        $this->db->like("hak_akses",$keywoard);
        return $this->db->get()->result_array();
    }

    public function tambahPetugas(){

        $data = [

            "lokasi_id" => $this->input->post("lokasiid"),
            "nama_petugas" => $this->input->post("namapetugas"),

        ];

        $this->db->insert('petugas', $data);
    }
    public function getByIdk($idk){

        return $this->db->get_where('petugas', ["id_petugas" => $idk])->row_array();
    }
    public function getByIdk2($idk){

        return $this->db->get_where('petugas', ["id_petugas" => $idk])->row_array();
    }
  

    public function getById($id){

        return $this->db->get_where('petugas', ['id_petugas' => $id])->row_array();

    }

    public function editPetugas($lokasi,$idk,$nama){

        $data = [

            "lokasi_id" =>$lokasi,
            "nama_petugas" => $nama,
        ];

        $this->db->where('id_petugas', $idk);
        $this->db->update('petugas', $data);

    }
    
    public function cekName($nama){

        $data = [

            "nama_petugas" => $nama,
        ];

        $this->db->select("*");
        $this->db->from("petugas");
        $this->db->where($data);
        $this->db->limit("1");
        return $this->db->get();
    }
    


}

?>