<?php 

class Petugas extends CI_Controller{
    public function __construct(){

        parent::__construct();
    
        $this->load->model('petugas_model');
        $this->load->model('lokasi_model');
        $this->load->library('form_validation');

        if($this->session->userdata("hak_akses") == "admin"){
            
        }elseif($this->session->userdata("hak_akses") == "manager"){

        }else{
            $this->session->set_flashdata('flash', 'anda tidak memiliki akses');
            redirect(base_url('login'));
        }
    }



    public function index(){

        $data['judul'] = 'Data Petugas';
        $jumlahDataPerhalaman = 4;
        $jmlh = $this->petugas_model->row_petugas();
        $jumlahData = $jmlh;
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
        $halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
        $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
        $data['jumlahHalaman1'] = $jumlahHalaman;   
        $data['halamanAktif1'] = $halamanAktif;    
        $data['jumlahDataPerhalaman'] = $jumlahDataPerhalaman;    
        $data['petugas'] = $this->petugas_model->getAllPetugas($awalData,$jumlahDataPerhalaman);
        $keywoard = $this->input->post('keywoard');

        if($this->input->post('submit')){

            $this->session->set_userdata('keywoardpetugas',$keywoard);

            if($keywoard == null){
                $this->session->unset_userdata('keywoardpetugas');
                $this->session->unset_userdata('jumlahhalamanpetugas');
            }else{
                $jmlh1 = $this->petugas_model->row_petugas_keywoard($keywoard);
                $jumlahData1 = $jmlh1;
                $jumlahHalaman1 = ceil($jumlahData1 / $jumlahDataPerhalaman);
                $this->session->set_userdata('jumlahhalamanpetugas',$jumlahHalaman1);
                $jumlahHalaman11 = $this->session->userdata('jumlahhalamanpetugas');
                $data['jumlahHalaman1'] = $jumlahHalaman11;
                $data['petugas'] = $this->petugas_model->getPetugasKeywoard($keywoard,$awalData,$jumlahDataPerhalaman);
            }
            $this->load->view('templates/header',$data);
            $this->load->view('petugas/index',$data);
            $this->load->view('templates/footer');

        }else{

            if($this->session->userdata('keywoardpetugas') !== null){
                $keywoard = $this->session->userdata('keywoardpetugas');
                $data['petugas'] = $this->petugas_model->getPetugasKeywoard($keywoard,$awalData,$jumlahDataPerhalaman);
            }
            $this->load->view('templates/header',$data);
            $this->load->view('petugas/index',$data);
            $this->load->view('templates/footer');
        }

    }

    public function tambah(){

        $data['judul'] = "Tambah Data Petugas";
        $data['lokasi'] = $this->lokasi_model->getAllLokasi2();
        $data['petugas'] = $this->petugas_model->tampilPetugas();
        $this->form_validation->set_rules('namapetugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('lokasiid', 'Lokasi Id', 'required|numeric');
        if($this->form_validation->run() == FALSE){
            
            $this->load->view('templates/header2',$data);
            $this->load->view('petugas/tambah',$data);
            $this->load->view('templates/footer2');
        
        }else{

            $this->petugas_model->tambahPetugas();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('petugas'));

        }
    }

    public function edit($id){

        $data['judul'] = "Edit Petugas";
        $data['lokasi'] = ['1', '2'];
        $data['petugas'] = $this->petugas_model->getById($id);
        $data['lokasi'] = $this->lokasi_model->getAllLokasi();
        $data['hooh'] = $this->petugas_model->tampilPetugas();
        $lokasi = $this->input->post('lokasiid');
        $idk = $this->input->post('id');
        $nama = $this->input->post('namapetugas');
        $this->form_validation->set_rules('namapetugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('lokasiid', 'Lokasi Id', 'required|numeric');
        if($this->form_validation->run() == FALSE ){
            
            $this->load->view('templates/header2',$data);
            $this->load->view('petugas/edit',$data);
            $this->load->view('templates/footer2');
            

        }else{

            
            $query = $this->petugas_model->cekName($nama);
            if($query->num_rows() == 1 ){
                $cek = $this->petugas_model->getByIdk($idk);
                if($cek['nama_petugas'] == $nama){
                    if($cek['lokasi_id'] == $lokasi){
                        $this->petugas_model->editPetugas($lokasi,$idk,$nama);
                        $this->session->set_flashdata('flash', 'Diubah');
                        redirect(base_url('petugas'));
                    }else{
                        $this->session->set_flashdata('cek', 'Lokasi sudah ');
                        redirect(base_url('petugas/edit/'.$id));
                    }
                }else{
                    $this->session->set_flashdata('cek', 'Petugas sudah ');
                    redirect(base_url('petugas/edit/'.$id)); 
                }
                
            }else{

                $this->petugas_model->editPetugas($lokasi,$idk,$nama);
                $this->session->set_flashdata('flash', 'Diubah');
                redirect(base_url('petugas'));
            }
        }
    }

    public function delete($id){

        $this->db->where('id_petugas', $id);
        $this->db->delete("petugas");
        $error = $this->db->error();

        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak dapat dihapus (Sudah Berelasi)');
            redirect(base_url('petugas'));
        }else{
            
            $this->session->set_flashdata("flash", "Dihapus");
            redirect(base_url('petugas'));
        }
    }
}

?>