<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login_user extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('Cek_pelanggan');
	}
 
	public function index()
	{
        if($this->session->userdata('status') == 'login') {
            redirect('Login_user');
            }
		$this->load->view('user/auth_form');
	}
 

 
	public function cekPelanggan() {
        $no_indihome = $this->input->post('no_indihome');
        $no_ktp = $this->input->post('no_ktp');
        $data = array(
            'no_indihome' => $no_indihome
        
        );
     
        $where = array(
            'no_indihome' => $no_indihome
           
        );

        $data2 = array(
            'no_ktp' => $no_ktp
        );
        $where2 = array(
            'no_ktp' => $no_ktp
        );
        $tersedia_indihome= $this->Cek_pelanggan->ketersediaan('pelanggan', $where)->num_rows();
        $tersedia_ktp= $this->Cek_pelanggan->ketersediaan_ktp('kartu_tanda_penduduk', $where2)->num_rows();
    
        if ($tersedia_indihome>0 && $tersedia_ktp>0 ) {
            $sess = array(
				'no_indihome' => $no_indihome,
				'status' => 'login'
			);
			$this->session->set_userdata($sess);
             $this->session->set_flashdata('pesan', '<div class="text-light ml-10" style="  text-align: center; margin-bottom:5px;"><b>
                Login Success</b>
            </div>');  
             redirect('User'); 
        }else if($tersedia_indihome<1 && $tersedia_ktp<1 ){
            $this->session->set_flashdata('pesan', '<div class="text-light ml-10" style="  text-align: center; margin-bottom:5px;"><b>
            Mohom maaf nomor indihome dan nomor ktp tidak terdaftar</b>
        </div>');  
         redirect('Login_user'); 
        }        
        else if($tersedia_indihome<1){
            $this->session->set_flashdata('pesan', '<div class="text-light ml-10" style="  text-align: center; margin-bottom:5px;"><b>
            Mohon maaf nomor indihome anda tidak terdaftar</b>
        </div>');  
        redirect('Login_user'); 
        }
        else if($tersedia_indihome>0 && $tersedia_ktp<1){
             $sess = array(
                'no_indihome' => $no_indihome,
                'no_ktp' => $no_ktp,
                'status' => 'new'
            );
            $this->session->set_userdata($sess);
             $this->session->set_flashdata('pesan', '<div class=" ml-10" style="  text-align: center; margin-bottom:5px; color:black; background-color:#fff; margin-top:10px"><b>
                No Ktp Tidak Terdaftar, Anda Berada Pada Form add data baru, Silahkan isi data.</b>
            </div>');  
             redirect('User/add_new'); 
         
        }
        }
 
	
 
}