<?php 

class Laporan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('laporan_model');
        if($this->session->userdata("hak_akses")){
            
        }else{
            $this->session->set_flashdata('flash', 'anda tidak memiliki akses');
            redirect(base_url('login'));
        }
    }


    public function index(){
        $data['lokasi'] = $this->laporan_model->tampilLokasi();
        $data['judul'] = 'Laporan Parkir';
        $this->load->view('templates/header',$data);
        $this->load->view('laporan/index',$data);
        $this->load->view('templates/footer');
        
    }

    public function report(){
        $this->load->view('laporan/report');
    }
}


?>