<?php 

class Lokasi extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('lokasi_model');

        if($this->session->userdata("hak_akses") == "admin"){

        }else{
            $this->session->set_flashdata('flash', 'anda tidak memiliki akses');
            redirect(base_url('login'));
        }
    }

    public function index(){

        $data['judul'] = "Halaman Lokasi";
        $data['lokasi'] = $this->lokasi_model->getAllLokasi();
        $this->load->view('templates/header',$data);
        $this->load->view('lokasi/index',$data);
        $this->load->view('templates/footer');

    }

    public function tambah(){

        $data['judul'] = "Halaman tambah";
        $this->form_validation->set_rules('namelokasi', 'Nama Lokasi', 'required');
        if($this->form_validation->run() == FALSE ){

            $this->load->view('templates/header2',$data);
            $this->load->view('lokasi/tambah');
            $this->load->view('templates/footer2');
        }else{
            $query = $this->lokasi_model->cekLokasi();
            if($query->num_rows() == 1 ){

                $this->session->set_flashdata('cek', 'Digunakan');
                redirect(base_url('lokasi/tambah'));

            }else{
                
                $this->lokasi_model->tambahLokasi();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect(base_url('lokasi'));
           
            }

        }
    }

    public function edit($id){

        $data['judul'] = "Halaman Edit";
        $data['lokasi'] = $this->lokasi_model->getById($id);
        $idk = $this->input->post('id');
        $user = $this->input->post('namelokasi');
        $this->form_validation->set_rules('namelokasi', 'Nama Lokasi', 'required');
        if ($this->form_validation->run()== FALSE){

            $this->load->view('templates/header2',$data);
            $this->load->view('lokasi/edit',$data);
            $this->load->view('templates/footer2');
        }else{

            $query = $this->lokasi_model->cekLokasi();
            if($query->num_rows() == 1 ){
                $cek = $this->lokasi_model->getByIdk($idk);
                if($cek['nama_lokasi'] == $user){

                    $this->lokasi_model->editLokasi($idk,$user);
                    $this->session->set_flashdata('flash', 'Diubah');
                    redirect(base_url('lokasi'));
             
                    
                }else{
              
                    $this->session->set_flashdata('cek', 'Digunakan');
                    redirect(base_url('lokasi/edit/'.$id));
              
                }

            }else{

                $this->lokasi_model->editLokasi($idk,$user);
                $this->session->set_flashdata('flash', 'Diubah');
                redirect(base_url('lokasi'));

            }

           
        }
    }

    public function hapus($id){

        $this->db->where("id_lokasi", $id);
        $this->db->delete('lokasi');
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak dapat dihapus (Sudah Berelasi)');
            redirect(base_url('lokasi'));
        }else{
            
            $this->session->set_flashdata("flash", "Dihapus");
            redirect(base_url('lokasi'));
        }
    }

}

?>