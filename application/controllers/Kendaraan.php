<?php 

class Kendaraan extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $this->load->model("kendaraan_model");
        $this->load->model("lokasi_model");
        $this->load->library("form_validation");

        if($this->session->userdata("hak_akses") == "admin"){
            
        }elseif($this->session->userdata("hak_akses") == "manager"){

        }else{
            $this->session->set_flashdata('flash', 'anda tidak memiliki akses');
            redirect(base_url('login'));
        }
    }

    public function index(){


        $data['judul'] = "Halaman Kendaraan";
        $jumlahDataPerhalaman = 4;
        $jmlh = $this->kendaraan_model->row_kendaraan();
        $jumlahData = $jmlh;
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
        $halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
        $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
        $data['jumlahHalaman1'] = $jumlahHalaman;    
        $data['halamanAktif1'] = $halamanAktif;    
        $data['jumlahDataPerhalaman'] = $jumlahDataPerhalaman; 
        $data['kendaraan'] = $this->kendaraan_model->getAllKendaraan($awalData,$jumlahDataPerhalaman);
        $keywoard = $this->input->post('keywoardd');

        if($this->input->post('submitt')){
          
            $this->session->set_userdata('keywoardkendaraan',$keywoard);
               
            if($keywoard == null){
                $this->session->unset_userdata('keywoardkendaraan');
                $this->session->unset_userdata('jumlahhalamankendaraan');
                $data['kendaraan'] = $this->kendaraan_model->getAllKendaraan($awalData,$jumlahDataPerhalaman);
            }else{
                $jmlh1 = $this->kendaraan_model->row_kendaraan_keywoard($keywoard);
                $jumlahData1 = $jmlh1;
                $jumlahHalaman1 = ceil($jumlahData1 / $jumlahDataPerhalaman);
                $this->session->set_userdata('jumlahhalamankendaraan',$jumlahHalaman1);
                $jumlahHalaman11 = $this->session->userdata('jumlahhalamankendaraan');
                $data['jumlahHalaman1'] = $jumlahHalaman11;
                $data['kendaraan'] = $this->kendaraan_model->getKendaraanKeywoard($keywoard,$awalData,$jumlahDataPerhalaman);

            }
            
            $this->load->view("templates/header",$data);
            $this->load->view("kendaraan/index",$data);
            $this->load->view("templates/footer");

        }else{
           
            if($this->session->userdata('keywoardkendaraan') !== null){
                $keywoard = $this->session->userdata('keywoardkendaraan');
                $data['kendaraan'] = $this->kendaraan_model->getKendaraanKeywoard($keywoard,$awalData,$jumlahDataPerhalaman);

            }
            
            $this->load->view("templates/header",$data);
            $this->load->view("kendaraan/index",$data);
            $this->load->view("templates/footer");

        }

    }

    

    public function tambah(){

        $data['judul'] = "Halaman Tambah Kendaraan";
        $data['lokasi'] = $this->lokasi_model->getAllLokasi2();
        $this->form_validation->set_rules('lokasiid','Lokasi ID', 'required|numeric');
        $this->form_validation->set_rules('jeniskendaraan',' Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('tarif',' Tarif Parkir', 'required|numeric');
        if($this->form_validation->run() == FALSE){

            $this->load->view("templates/header2",$data);
            $this->load->view("kendaraan/tambah",$data);
            $this->load->view("templates/footer2");
        
        }else{

            $this->kendaraan_model->tambahKendaraan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('kendaraan'));
        }
    }

    public function edit($id){

        $data['judul'] = "Halaman Ubah";
        $data['kendaraan'] = $this->kendaraan_model->GetById($id);
        $data['lokasi'] = $this->lokasi_model->getAllLokasi();
        $this->form_validation->set_rules('lokasiid','Lokasi ID', 'required|numeric');
        $this->form_validation->set_rules('jeniskendaraan',' Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('tarif',' Tarif Parkir', 'required|numeric');
        if($this->form_validation->run() == FALSE){

            $this->load->view("templates/header2",$data);
            $this->load->view("kendaraan/edit",$data);
            $this->load->view("templates/footer2");
        
        }else{

            $this->kendaraan_model->editKendaraan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect(base_url('kendaraan'));
        }
    }

    public function delete($id){

        $this->db->where('id_jenis_kendaraan', $id);
        $this->db->delete("jenis_kendaraan");
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak dapat dihapus (Sudah Berelasi)');
            redirect(base_url('kendaraan'));
        }else{
            
            $this->session->set_flashdata('flash', "Didelete");
            redirect(base_url('kendaraan'));
        }
    }
}

?>