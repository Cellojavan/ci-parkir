<?php 

class user_model extends CI_Model {


    public function getAllUser($awalData,$jumlahDataPerhalaman){

        $query = $this->db->query("SELECT * FROM user
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    }

    public function getUserKeywoard($keywoard,$awalData,$jumlahDataPerhalaman){
        $query = $this->db->query("SELECT * FROM user
        WHERE
        nama_user LIKE '$keywoard' OR
        username LIKE '$keywoard' OR
        email LIKE '%$keywoard%' OR
        no_wa LIKE '%$keywoard%' OR
        hak_akses LIKE '$keywoard'
        LIMIT $awalData, $jumlahDataPerhalaman ");
        return $query->result_array();
    }

    public function row_user(){
        return $query = $this->db->get('user')->num_rows();;

    }
    public function row_user_keywoard($keywoard){
        $query = $this->db->query("SELECT * FROM user
        WHERE
        nama_user LIKE '$keywoard' OR
        username LIKE '$keywoard' OR
        email LIKE '%$keywoard%' OR
        no_wa LIKE '%$keywoard%' OR
        hak_akses LIKE '$keywoard' ");
        return $query->num_rows();

    }

    public function tambahUser(){
        $password = $this->input->post("password");
        $password = md5($password);
        $data = [

            "nama_user" => $this->input->post("name"),
            "username" => $this->input->post("username"),
            "password" =>$password,
            "email" => $this->input->post("email"),
            "no_wa" => $this->input->post("nohp"),
            "hak_akses" => $this->input->post("hakakses"),
        ];
        $this->db->insert('user', $data);

    }

    public function cekUser(){

        $data = [

            "username" => $this->input->post("username"),
        ];

        $this->db->select("*");
        $this->db->from("user");
        $this->db->where($data);
        $this->db->limit("1");
        return $this->db->get();
    }
    public function cekUserr(){

        $data = [

            "username" => $this->input->post("username"),
        ];

        $this->db->select("*");
        $this->db->from("user");
        $this->db->where($data);
        $this->db->limit("1");
        return $this->db->get();
    }

    public function getById($id){

        return $this->db->get_where('user', ["id_user" => $id])->row_array();
    }
    public function getByIdk($idk){

        return $this->db->get_where('user', ["id_user" => $idk])->row_array();
    }

    public function ubahUser($idk,$user){
        $password = $this->input->post("password");
        $password = md5($password);
        $data = [

            "nama_user" => $this->input->post("name"),
            "username" => $user,
            "password" => $password,
            "email" => $this->input->post("email"),
            "no_wa" => $this->input->post("nohp"),
            "hak_akses" => $this->input->post("hakakses"),
        ];

        $this->db->where('id_user', $idk);
        $this->db->update('user', $data);

    }

    public function getByNama(){

        return $this->db->get_where('user', ["hak_akses" => $this->session->userdata["hak_akses"]])->row_array();
    }
}

?>