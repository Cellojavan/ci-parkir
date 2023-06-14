<?php

class login_model extends CI_model{


    public function cekSession($username,$password){

        $data = [

            "username" => $username,
            "password" => $password,
        ];

        $this->db->select("*");
        $this->db->from("user");
        $this->db->where($data);
        $this->db->limit("1");
        return $this->db->get();

    }

    public function validEmail($email){

        $query = $this->db->query("SELECT * FROM user WHERE email = '$email'");
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return false;
        }
    }

    public function updatePassword($email,$data){
        $this->db->where('email',$email);
        $this->db->update('user',$data);
    }

    public function getHashDetails($hash){
        $query = $this->db->query("SELECT * FROM user WHERE hash_key = '$hash'");
        if($query->num_rows() == 1){

            return $query->row();
        
        }else{

            return false;

        }
    }

    public function resetPassword($data,$hash){

        $this->db->where('hash_key',$hash);
        $this->db->update("user",$data);

    }

    public function cek($username){

        return $this->db->get_where('user', ["username" => $username])->row_array();

    }
}


?>