<?php 

class Forgot extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model("login_model");
        $this->load->library('form_validation');

    }

    public function password(){

        if($this->input->get("hash")){

            $hash = $this->input->get("hash");
            $data["hash"] = $hash;
            $data['judul'] = "Reset Password";
            $getHashDetails = $this->login_model->getHashDetails($hash);
            if($getHashDetails != false){

                $hash_expry = $getHashDetails->hash_expry;
                $currentDate = date('Y-m-d H:i');
                if($currentDate < $hash_expry){

                    $this->form_validation->set_rules('password', 'Password', 'required');
                    $this->form_validation->set_rules('cpassword', 'Confrim Password', 'required|matches[password]');
                    if($this->form_validation->run() == FALSE){
                        
                        $this->load->view('templates/hlogin',$data);
                        $this->load->view('login/reset',$data);
                        $this->load->view('templates/flogin');

                    }else{

                        $data = [
                            'password' => $this->input->post('cpassword'),
                            'hash_key' => null,
                            'hash_expry' => null
                        ];
                        $this->login_model->resetPassword($data,$hash);
                        $this->session->set_flashdata('success', 'Password Success Changed');
                        redirect(base_url("login"));
                    }

                }else{

                    $this->session->set_flashdata('error', 'Link is Expired');
                    redirect(base_url("login/forgot"));

                }


            }else{

                echo"Invalid Hash";exit;
            }

        }else{

            redirect(base_url("login/forgot"));
        }
    }
}

?>