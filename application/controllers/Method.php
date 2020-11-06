<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Method extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->model("User_m");
        $this->load->model("Pelanggan_m");
        $this->User_m->cek_login();
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

	public function index()
	{
        $data["Pelanggan"] = $this->Pelanggan_m->getAll();
        $data["Pe"] = $this->Pelanggan_m->JoinTB();
        $data["ViewP"] = $this->Pelanggan_m->view_modal();
		$this->load->view('admin/view_admin', $data);
	}

    function save_pelanggan()
    {
        $this->Pelanggan_m->save_pelanggan();
    }
    
    function edit($id=null){

        $where = array('id' => $id);
        
        $data['pelanggan'] = $this->Pelanggan_m->edit_data($where,'pelanggan')->result();
        
        $this->load->view('admin/edit_form',$data);
        
    }

    function view($id=null){

        $where = array('id' => $id);
        
        $data['pelanggan'] = $this->Pelanggan_m->view_data($where,'pelanggan')->result();
        
        $this->load->view('Pelanggan',$data);
        
    }

        function update(){
            $id = $this->input->post('id');
            $no_indihome   = $this->input->post('no_indihome');
            $no_telepon    = $this->input->post('no_telepon');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $kota_kabupaten_id  = $this->input->post('kota_kabupaten');
            $kecamatan_id  =  $this->input->post('kecamatan');
            $desa_kelurahan_id  =  $this->input->post('desa_kelurahan');
            $alamat  = $this->input->post('alamat');
            $kodepos_id  = $this->input->post('kodepos_id');
            $no_handphone  = $this->input->post('no_handphone');
            $email  = $this->input->post('email');
            $pekerjaan  = $this->input->post('pekerjaan');
            $kartu_tanda_penduduk  = $this->input->post('kartu_tanda_penduduk');
            $date  = date('Y-m-d H:i:s');
        
            $data = array(
                'no_indihome'		    => $no_indihome,
                'no_telepon'		    => $no_telepon,
                'nama_lengkap'		    => $nama_lengkap,
                'kota_kabupaten_id' 	=> $kota_kabupaten_id,
                'kecamatan_id'		    => $kecamatan_id,
                'desa_kelurahan_id' 	=> $desa_kelurahan_id,
                'alamat'		        => $alamat,
                'kodepos_id'	        => $kodepos_id,
                'no_handphone'	        => $no_handphone,
                'email'	                => $email,
                'pekerjaan_id'	        => $pekerjaan,
                'kartu_tanda_penduduk'	=> $kartu_tanda_penduduk,
                'last_updated_at'	    => $date
                
        );
            
            $where = array(
            
            'id' => $id
            
            );
            
            
            $this->Pelanggan_m->update_data($where,$data,'pelanggan');
            
            redirect('Pelanggan');
            
            }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Pelanggan_m->delete($id)) {
            redirect(site_url('Pelanggan'));
        }
    }


}
