<?php 

class Login extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model("login_model");
        $this->load->library('form_validation');
    }

    public function index(){

        $data['judul'] = "Halaman Login";
        $this->load->view("templates/hlogin",$data);
        $this->load->view("login/index");
        $this->load->view("templates/flogin");
    }

    public function login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $cek = $this->login_model->cek($username);

        $login = $this->login_model->cekSession($username,$password);
        
        if($login->num_rows() == 1){
            foreach($login->result_array() as $row){
                $data =[
                    "hak_akses" => $row["hak_akses"],
                    "nama_user" => $row["nama_user"]
                ];
                $this->session->set_userdata($data);
                if($this->session->userdata("hak_akses") == "admin"){
                    $this->session->set_flashdata('login', 'login sebagai');
                    redirect(base_url('dashboard'));
                }
                elseif($this->session->userdata("hak_akses") == "manager"){
                    $this->session->set_flashdata('login', 'login sebagai');
                    redirect(base_url('kendaraan'));
                }
                elseif($this->session->userdata("hak_akses") == "petugas"){
                    $this->session->set_flashdata('login', 'login sebagai');
                    redirect(base_url('dashboard'));
                }

            }
        }elseif($username == '' && $password == ''){
            $this->session->set_flashdata('flash', 'Data tidak boleh kosong');
            redirect(base_url('login'));

        }else{

            $this->session->set_flashdata('flash','User tidak ditemukan');
            redirect(base_url('login'));
        }
    }

    public function logout(){

        $this->session->unset_userdata("hak_akses");
        $this->session->unset_userdata("dari");
        $this->session->unset_userdata("ke");
        $this->session->unset_userdata("jumlahhalaman1");
        $this->session->unset_userdata("keywoard");
        $this->session->unset_userdata("jumlahhalaman");
        redirect(base_url('login'));
    }

    public function forgot(){

        $data['judul'] = "Forgot Password";
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if($this->form_validation->run() == FALSE){

                $this->load->view("templates/hlogin",$data);
                $this->load->view("login/forgot");
                $this->load->view("templates/flogin");
        }else{

            $email = $this->input->post("email");
            $validEmail = $this->login_model->validEmail($email);
            if($validEmail != false){

                $row = $validEmail;
                $user_id = $row->id_user;

                $string = time().$user_id.$email;
                $hash_string = hash('sha256', $string);
                $currentDate = date('Y-m-d H:i');
                $hash_expry = date('Y-m-d H:i',strtotime($currentDate. '1 days'));
                $data = [
                    "hash_key" => $hash_string,
                    "hash_expry" => $hash_expry,
                ];
                
                 
                $resetLink = base_url().'forgot/password?hash='.$hash_string;
                $message = "<p> Your reset password Link is here:</p>".$resetLink;
                $subject = "Password Reset Link";
                $sentStatus = $this->sendEmail($email,$subject,$message);
                if($sentStatus == TRUE){
                    $this->login_model->updatePassword($email,$data);
                    $this->session->set_flashdata("success", "Email Sending Success");
                    redirect(base_url("login"));
                }else{
                    $this->session->set_flashdata("success", "Email Sending Error");
                    redirect(base_url("login/forgot"));
                }


            }else{
                
                $this->session->set_flashdata("error", "Email Tidak ditemukan");
                redirect(base_url("login/forgot"));

            }



        }

    }

    public function sendEmail($email,$subject,$message){

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',

            'smtp_port' => 465,
            'smtp_user' => 'webparking101@gmail.com',
            'smtp_pass' => 'gixeirzipqsnecmy',

            'mailtype' => 'html',
            'charset' => 'UTF-8',
            'newline' => "\r\n",
            'wordwrap' => TRUE
        ];

        $this->load->library('email', $config);
        $this->email->from('noreply');
        $this->email->to($email);
        $this->email->subject($subject);
        
        $this->email->message($message);
        if($this->email->send()){

            return true;
        
        }else{
        
            return false;
        
        }
    }
}




?>