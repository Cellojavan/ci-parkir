<?php 

class lokasi_model extends CI_model{


    public function getAllLokasi(){

       return $query = $this->db->get('lokasi')->result_array();
    }

    public function tambahLokasi(){

        $data = [
            "nama_lokasi" => $this->input->post("namelokasi"),
        ];
    
        $this->db->insert('lokasi', $data);
    
    }

    public function getById($id){

        return $this->db->get_where('lokasi', ["id_lokasi" => $id])->row_array();
    }
    public function getByIdk($idk){

        return $this->db->get_where('lokasi', ["id_lokasi" => $idk])->row_array();
    }

    
    public function cekLokasi(){

        $data = [

            "nama_lokasi" => $this->input->post("namelokasi"),
        ];

        $this->db->select("*");
        $this->db->from("lokasi");
        $this->db->where($data);
        $this->db->limit("1");
        return $this->db->get();
    }

    public function editLokasi($idk,$user){

        $data=[

            "nama_lokasi" => $user,
        ];

        $this->db->where("id_lokasi" , $idk);
        $this->db->update("lokasi", $data);
    }

}

?>