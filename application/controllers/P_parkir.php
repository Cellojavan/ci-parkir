<?php 

class P_parkir extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('P_parkir_model');
        $this->load->model('kendaraan_model');
        $this->load->model('lokasi_model');

        $this->load->library('form_validation');
        if($this->session->userdata("hak_akses") == "admin"){
            
        }elseif($this->session->userdata("hak_akses") == "manager"){
            
        }elseif($this->session->userdata("hak_akses") == "petugas"){

        }else{
            $this->session->set_flashdata('flash', 'anda tidak memiliki akses');
            redirect(base_url('login'));
        }
    }

    public function index(){

        $jmlh = $this->P_parkir_model->Total();
        if($this->session->userdata("hak_akses") == "petugas"){

            $cariname = $this->P_parkir_model->getByName();
            $hasil = $cariname['lokasi_id'];
            $jumlahDataPerhalaman = 4;
            $jmlh1 = $this->P_parkir_model->get_lokasi($hasil);
            $jumlahData = $jmlh1;
            $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
            $halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
            $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
            $data['jumlahHalaman1'] = $jumlahHalaman;    
            $data['halamanAktif1'] = $halamanAktif;    
            $data['parkir'] = $this->P_parkir_model->get_lokasi22($hasil,$awalData,$jumlahDataPerhalaman); 
            $data['judul'] = 'Pengelolaan Parkir';
            $dari = $this->input->post('dari');
            $keywoard = $this->input->post('keyword');
            $ke = $this->input->post('ke');
        
        
        if($this->input->post('submit')){      

            $this->session->unset_userdata('dari');
            $this->session->unset_userdata('ke');
            $this->session->set_userdata('keywoard',$keywoard);
            $cariname = $this->P_parkir_model->getByName();
            $hasil = $cariname['lokasi_id'];
            $jmlh2 = $this->P_parkir_model->TotalRowskeyword1($keywoard,$hasil);
            $jumlahDataPerhalaman = 4;
            $jumlahData = $jmlh2;
            $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

            $this->session->set_userdata('jumlahhalaman',$jumlahHalaman);
            $jumlahHalamanSession = $this->session->userdata('jumlahhalaman');
            
            $halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
            $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
            $data['jumlahHalaman1'] = $jumlahHalamanSession;    
            $data['halamanAktif1'] = $halamanAktif;
            $data['parkir'] = $this->P_parkir_model->get_keyword22($hasil,$keywoard,$awalData,$jumlahDataPerhalaman);
            $this->load->view('templates/header',$data);
            $this->load->view('P_parkir/index',$data);
            $this->load->view('templates/footer',$data);
            
        }else{
            
            if($this->input->post('cari')){
                $this->session->unset_userdata('keywoard');
                $this->session->set_userdata('dari',$dari);
                $this->session->set_userdata('ke',$ke);
                $cariname = $this->P_parkir_model->getByName();
                $hasil = $cariname['lokasi_id'];
                $jmlh3 = $this->P_parkir_model->TotalRows1($dari,$ke,$hasil);
                $jumlahDataPerhalaman = 4;
                $jumlahData = $jmlh3;
                $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

                $this->session->set_userdata('jumlahhalaman1',$jumlahHalaman);
                $jumlahHalamanSession = $this->session->userdata('jumlahhalaman1');
                
                $halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
                $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
                $data['jumlahHalaman1'] = $jumlahHalamanSession;    
                $data['halamanAktif1'] = $halamanAktif;
                $data['parkir'] = $this->P_parkir_model->get_key22($hasil,$dari,$ke,$awalData,$jumlahDataPerhalaman);
                $this->load->view('templates/header',$data);
                $this->load->view('P_parkir/index',$data);
                $this->load->view('templates/footer',$data);

            }else{
                if($this->session->userdata('keywoard') !== null){
                    $jumlahHalamanSession = $this->session->userdata('jumlahhalaman');
                    $keywoard = $this->session->userdata('keywoard');
                    $data['jumlahHalaman1'] = $jumlahHalamanSession;    
                    $data['parkir'] = $this->P_parkir_model->get_keyword22($hasil,$keywoard,$awalData, $jumlahDataPerhalaman);
                }
                if($this->session->userdata('dari') !== null){
                    $jumlahHalamanSession = $this->session->userdata('jumlahhalaman1');
                    $dari = $this->session->userdata('dari');
                    $ke = $this->session->userdata('ke');
                    $data['jumlahHalaman1'] = $jumlahHalamanSession;    
                    $data['parkir'] = $this->P_parkir_model->get_key22($hasil,$dari,$ke,$awalData,$jumlahDataPerhalaman);
                }
                    $this->load->view('templates/header',$data);
                    $this->load->view('P_parkir/index',$data);
                    $this->load->view('templates/footer',$data);
            }
            

        }
        }else{


            $jumlahDataPerhalaman = 4;
            $jumlahData = $jmlh;
            $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
            $halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
            $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
            $data['jumlahHalaman'] = $jumlahHalaman;    
            $data['halamanAktif'] = $halamanAktif;    
            $data['parkir'] = $this->P_parkir_model->perPage($awalData,$jumlahDataPerhalaman); 
            $data['judul'] = 'Pengelolaan Parkir';
            $dari = $this->input->post('dari');
            $keywoard = $this->input->post('keyword');
            $ke = $this->input->post('ke');
        
        
        if($this->input->post('submit')){

            $this->session->unset_userdata('dari');
            $this->session->unset_userdata('ke');
            $this->session->set_userdata('keywoard',$keywoard);
            $jmlh = $this->P_parkir_model->TotalRowskeyword($keywoard);
            $jumlahDataPerhalaman = 4;
            $jumlahData = $jmlh;
            $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

            $this->session->set_userdata('jumlahhalaman',$jumlahHalaman);
            $jumlahHalamanSession = $this->session->userdata('jumlahhalaman');
            
            $halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
            $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
            $data['jumlahHalaman'] = $jumlahHalamanSession;    
            $data['halamanAktif'] = $halamanAktif;
            $data['parkir'] = $this->P_parkir_model->get_keyword1($keywoard,$awalData, $jumlahDataPerhalaman);
            $this->load->view('templates/header',$data);
            $this->load->view('P_parkir/index',$data);
            $this->load->view('templates/footer',$data);
           
            
        }else{
            
            if($this->input->post('cari')){
                $this->session->unset_userdata('keywoard');
                $this->session->set_userdata('dari',$dari);
                $this->session->set_userdata('ke',$ke);
                $jmlh = $this->P_parkir_model->TotalRows($dari,$ke);
                $jumlahDataPerhalaman = 4;
                $jumlahData = $jmlh;
                $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

                $this->session->set_userdata('jumlahhalaman1',$jumlahHalaman);
                $jumlahHalamanSession = $this->session->userdata('jumlahhalaman1');
                
                $halamanAktif = ( isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
                $awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
                $data['jumlahHalaman'] = $jumlahHalamanSession;    
                $data['halamanAktif'] = $halamanAktif;
                $data['parkir'] = $this->P_parkir_model->get_key1($dari,$ke,$awalData, $jumlahDataPerhalaman);
                $this->load->view('templates/header',$data);
                $this->load->view('P_parkir/index',$data);
                $this->load->view('templates/footer',$data);
                

            }else{

                    if($this->session->userdata('keywoard') !== null){
                        $jumlahHalamanSession = $this->session->userdata('jumlahhalaman');
                        $keywoard = $this->session->userdata('keywoard');
                        $data['jumlahHalaman'] = $jumlahHalamanSession;    
                        $data['parkir'] = $this->P_parkir_model->get_keyword1($keywoard,$awalData, $jumlahDataPerhalaman);
                    }
                    if($this->session->userdata('dari') !== null){
                        $jumlahHalamanSession = $this->session->userdata('jumlahhalaman1');
                        $dari = $this->session->userdata('dari');
                        $ke = $this->session->userdata('ke');
                        $data['jumlahHalaman'] = $jumlahHalamanSession;    
                        $data['parkir'] = $this->P_parkir_model->get_key1($dari,$ke,$awalData, $jumlahDataPerhalaman);
                    }
                    $this->load->view('templates/header',$data);
                    $this->load->view('P_parkir/index',$data);
                    $this->load->view('templates/footer',$data);

                    
                
                
               

            }
                
                
                

        }

        }
        

    }


    public function tambah(){

        $data['kendaraan'] = $this->kendaraan_model->getKendaraan();
        $idlokasi = $this->P_parkir_model->getByName();
        $carilokasi = $idlokasi['lokasi_id'];
        $data['lokasi'] = $this->P_parkir_model->getLokasi($carilokasi);
        $data['judul'] = 'Foto Masuk';
        $this->form_validation->set_rules('tglin', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('nopol',  'Nopol', 'required'); 
        if($this->form_validation->run() == FALSE){

            $this->load->view('P_parkir/tambah',$data);

        }else{

            $tglin = $this->input->post('tglin');
            $petugasin = $this->input->post('petugasin');
            $fotoin = $_POST['xnama_file_foto'];
            $nopol = $this->input->post('nopol');
            $tarifparkir = $this->input->post('tarif');
            $jeniskendaraan = $this->input->post('nim');
            $lokasi = $this->input->post('lokasiid');
            $kembalikan_id = $this->P_parkir_model->getByIdLokasi($lokasi);
            $lokasinew = $kembalikan_id['id_lokasi'];
            $status = 'In side';
            $foto = 'foto_'.$nopol.'_'.$tglin .'.jpeg';
            
            $this->db->where("tarif_parkir",$tarifparkir);
            $parkir = $this->db->get('jenis_kendaraan')->row_array();
            $tarifnew = $parkir['id_jenis_kendaraan'];
            $this->P_parkir_model->tambahPengelolaan($tglin,$status,$foto,$nopol,$tarifnew,$jeniskendaraan,$lokasinew,$petugasin);
           
            if(!empty($fotoin)){
				if($foto !=="") {
					if(file_exists('./dist/img/fotomasuk/'.$foto)){
						unlink('./dist/img/fotomasuk/'.$foto);
					}
					$data = $fotoin;
					list($type, $data) = explode(';', $data);
					list(, $data)      = explode(',', $data);
					$data = base64_decode($data);
					file_put_contents('./dist/img/fotomasuk/'.$foto, $data);
                    $this->session->set_flashdata('flashh','Masuk');
                    redirect(base_url('P_parkir'));
				}
				else{
					$data = $fotoin;
					list($type, $data) = explode(';', $data);
					list(, $data)      = explode(',', $data);
					$data = base64_decode($data);
					file_put_contents('./dist/img/fotomasuk/'.$foto, $data);
				}

			}

        }
    }

    public function keluar($id){

        $data['judul'] = 'Foto Keluar';
        $data['parkir'] = $this->P_parkir_model->getById($id);
        $parkir = $this->P_parkir_model->getById($id);
        $this->form_validation->set_rules('tglout', 'Tanggal Out', 'required');
        if($this->form_validation->run() == FALSE){

            $this->load->view('P_parkir/keluar',$data);
        
        }else{

            $tglout = $this->input->post('tglout');
            $petugasout = $this->input->post('petugasout');
            $fotoout = $_POST['xxnama_file_foto'];
            $nopol = $parkir['nopol'];
            $status = 'Done';
            $foto = 'foto_'.$nopol.'_'.$tglout .'.jpeg';
            $this->P_parkir_model->UpdateOut($tglout,$status,$foto,$petugasout);
           
            if(!empty($fotoout)){
				if($foto !=="") {
					if(file_exists('./dist/img/fotoout/'.$foto)){
						unlink('./dist/img/fotoout/'.$foto);
					}
					$data = $fotoout;
					list($type, $data) = explode(';', $data);
					list(, $data)      = explode(',', $data);
					$data = base64_decode($data);
					file_put_contents('./dist/img/fotoout/'.$foto, $data);
                    $this->session->set_flashdata('flashh','Masuk');
                    redirect(base_url('P_parkir'));
				}
				else{
					$data = $fotoout;
					list($type, $data) = explode(';', $data);
					list(, $data)      = explode(',', $data);
					$data = base64_decode($data);
					file_put_contents('./dist/img/fotoout/'.$foto, $data);
				}

			}
        }

    }
    public function hapus($id){

        $this->db->where('id_pengelolaan_parkir', $id);
        $this->db->delete('pengelolaan_parkir');
        $error = $this->db->error();

        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak dapat dihapus (Sudah Berelasi)');
            redirect(base_url('parkir'));
        }else{
            
            $this->session->set_flashdata("flash", "Dihapus");
            redirect(base_url('P_Parkir'));
        }
    }

    public function autofill(){

        $id	= $this->input->get('nim');
        $this->db->where("id_jenis_kendaraan",$id);
        $parkir = $this->db->get('jenis_kendaraan')->row_array();
        $data = array(
            'tarif' => $parkir['tarif_parkir'],
        );
        echo json_encode($data);
        

	}
    public function coba(){
        $this->load->view('P_parkir/coba');
    }
    

    

}
?>