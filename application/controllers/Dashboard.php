<?php 

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("dash_model");
        $this->load->model('P_parkir_model');
        $this->load->library('form_validation');
        if($this->session->userdata("hak_akses") == "admin"){

        }elseif($this->session->userdata("hak_akses") == "petugas"){    
            
        }else{
            $this->session->set_flashdata('flash', 'anda tidak memiliki akses');
            redirect(base_url('login'));
        }
    }

    public function index(){
        if($this->session->userdata('hak_akses') == "admin"){
            $data['judul'] = "Dashboard Admin";
            $data['waktu'] = $this->dash_model->waktu();
            $data['side'] = $this->dash_model->inside(); 
            $data['bulanan'] = $this->dash_model->bulanan(); 
            $data['duit'] = $this->dash_model->bulanann(); 
            $data['tday'] = $this->dash_model->Tday(); 
            $data['lokasi'] = $this->dash_model->cekLokasi(); 
            $this->load->view('templates/header',$data);
            $this->load->view('dashboard/index',$data);
            $this->load->view('templates/footer');
        }
        if($this->session->userdata('hak_akses') == "petugas"){
            $data['judul'] = "Dashboard Admin";
            $cariname = $this->P_parkir_model->getByName();
            $hasil = $cariname['lokasi_id'];
            $data['waktu'] = $this->dash_model->waktu1($hasil);
            $data['side'] = $this->dash_model->inside1($hasil); 
            $data['duit'] = $this->dash_model->bulanann1($hasil); 
            $data['tday'] = $this->dash_model->Tday1($hasil); 
            $this->load->view('templates/header',$data);
            $this->load->view('dashboard/index',$data);
            $this->load->view('templates/footer');
        }

        
    }

}

?>