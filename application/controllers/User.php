<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('M_admin','M_admin');
        $this->load->model("Pelanggan_m");
         $this->load->model("User_m");
        $this->load->library('form_validation');
        
	}
	 
	public function index()
	{
        $this->load->model('M_admin');
        $data['Domisili'] = $this->M_admin->get_Kota();
        $data['Dom'] = $this->M_admin->get_Kec();
        $data['Domi'] = $this->M_admin->get_Des();
        $data['Domis'] = $this->M_admin->pos_get();
        $data['Pel'] = $this->Pelanggan_m->getAll();
        $data['Pekerjaan'] = $this->M_admin->get_Pekerjaan();
		$this->load->view('user/tes2', $data);

        if ($this->session->userdata('status')!='login') {
            redirect('Login_user');
        } 
		
	}

        public function add_new()
    {
        $this->load->model('M_admin');
        $data['Domisili'] = $this->M_admin->get_Kota();
        $data['Dom'] = $this->M_admin->get_Kec();
        $data['Domi'] = $this->M_admin->get_Des();
        $data['Domis'] = $this->M_admin->pos_get();
        $data['Pel'] = $this->Pelanggan_m->getAll();
        $data['Pekerjaan'] = $this->M_admin->get_Pekerjaan();
        $this->load->view('user/form_add', $data);

        if ($this->session->userdata('status')!='new') {
            redirect('Login_user');
        } 
        
    }

    public function berhasil()
    {
        $this->load->view('admin/success');
       
    }
     public function berhasil_add()
    {
        $this->load->view('admin/success_add');
       
    }

	function get_Kecamatan()
    {
        $kota_kabupaten_id = $this->input->post('id',TRUE);
        $data = $this->M_admin->get_Kecamatan($kota_kabupaten_id)->result();
        echo json_encode($data);
    
    }

    function get_Desa()
    {
        $kecamatan_id = $this->input->post('id',TRUE);
        $data = $this->M_admin->get_Desa($kecamatan_id)->result();
        echo json_encode($data);
    }

    function get_Pos()
    {
        $desa_kelurahan_id = $this->input->post('id',TRUE);
        $data = $this->M_admin->get_Pos($desa_kelurahan_id)->result();
        echo json_encode($data);
	}
	
	function save_pelanggan()
    {
        $this->Pelanggan_m->upload_file();
        $this->Pelanggan_m->save_pelanggan();
    }

    public function update_pelanggan(){
        $id = $this->input->post('id');
        $no_indihome = $this->input->post('no_indihome');
        $no_telepon = $this->input->post('no_telepon');
        $kota_kabupaten = $this->input->post('kota_kabupaten');
        $kecamatan = $this->input->post('kecamatan');
        $desa_kelurahan = $this->input->post('desa_kelurahan');
        $kodepos_id = $this->input->post('kodepos_id');
        $alamat = $this->input->post('alamat');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $no_handphone = $this->input->post('no_handphone');
        $email = $this->input->post('email');
        $pekerjaan = $this->input->post('pekerjaan');
        $ktp_id = $this->input->post('ktp_id');
        $no_ktp = $this->input->post('no_ktp');
        $old_image = $this->input->post('old_image');
        $status  = 1;
        $date  = date('Y-m-d');
        $time  = date('H:i:s');
        $path = './upload/';
        $where2 = array(
            'id'      => $ktp_id,
        );
        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'jpg|png|gif';
        $config['file_name'] = $this->input->post('no_ktp',TRUE);
        if (!empty($_FILES['foto_ktp']['name'])) {
            $this->load->library('upload',$config);
	        if ( !$this->upload->do_upload('foto_ktp') ) {
                die("gagal update");
            }else {
                $foto = $this->upload->data('file_name');
                $data2 = array(
                    'no_ktp'       => $no_ktp,
                    'image'   => $foto,
                );
              // hapus foto pada direktori
                @unlink($path.$this->input->post('old_image'));
                $this->User_m->update_ktp($where2,$data2,'kartu_tanda_penduduk');
	        }
	    }else {
            $data2 = array(
                'no_ktp'       => $no_ktp,
                'image' => $old_image,
            );
          // hapus foto pada direktori
            $this->User_m->update_ktp($where2,$data2,'kartu_tanda_penduduk');
	        // echo "tidak masuk";
        }
        // $data2 = array(
        //     'no_ktp'       => $no_ktp,
        //     'image'   => $foto,
        // );
        // $this->User_m->update_ktp($data2,$where2);
        // $this->User_m->update_ktp($where2,$data2,'kartu_tanda_penduduk');
        // var_dump($cek_update);
        // $data2 = array(
        //     'no_ktp'       => $no_telepon,
        //     'image'   => $foto_ktp,
        // );

        $data = array(
            'no_telepon'       => $no_telepon,
            'kota_kabupaten_id'   => $kota_kabupaten,
            'kecamatan_id'        => $kecamatan,
            'desa_kelurahan_id'   => $desa_kelurahan,
            'kodepos_id'       => $kodepos_id,
            'alamat'           => $alamat,
            'nama_lengkap'     => $nama_lengkap,
            'no_handphone'     => $no_handphone,
            'email'            => $email,
            'pekerjaan_id'        => $pekerjaan,
            'last_updated_at'	    => $date.' '.$time,
            'status'	            => $status
        );
        $where = array(
            'id'      => $id
        );
        $this->User_m->update_pelanggan($where,$data,'pelanggan');
        $this->session->sess_destroy();
        redirect('User/berhasil');
    }

    function save_pelanggan_frontend()
    {
        
        // $this->Pelanggan_m->save_pelanggan();
        $no_id = $this->input->post('id');
        $no_indihome   = $this->input->post('no_indihome',TRUE);
        $no_telepon    = $this->input->post('no_telepon',TRUE);
        $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
        $kota_kabupaten_id  = $this->input->post('kota_kabupaten',TRUE);
        $kecamatan_id  =  $this->input->post('kecamatan',TRUE);
        $desa_kelurahan_id  =  $this->input->post('desa_kelurahan',TRUE);
        $alamat  = $this->input->post('alamat',TRUE);
        $kodepos_id  = $this->input->post('kodepos_id',TRUE);
        $no_handphone  = $this->input->post('no_handphone',TRUE);
        $email  = $this->input->post('email',TRUE);
        $pekerjaan  = $this->input->post('pekerjaan',TRUE);
        $no_ktp = $this->input->post('no_ktp');
        $foto_ktp = $this->input->post('foto_ktp',TRUE);
        // $kartu_tanda_penduduk  = "dummy";
        $status  = 1;
        $date  = date('Y-m-d');
        $time  = date('H:i:s');

       // $foto = $_FILES['foto_ktp'];
        if ($foto=''){ 
        }else{
            $config['upload_path']      = './upload/';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['file_name'] = $this->input->post('no_ktp',TRUE);
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('foto_ktp')) {
            }else{
                $foto = $this->upload->data('file_name');
            }
        }


        $save_ktp = array(
            'no_ktp' => $no_ktp,
            'image' => $foto
        );

        // var_dump($save_ktp);

    $this->db->insert('kartu_tanda_penduduk',$save_ktp);
    $id_ktp = $this->db->insert_id();
        
        $save    = array(
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
            'ktp_id'	            => $id_ktp,
            'last_updated_at'	    => $date.' '.$time,
            'status'	            => $status
        );

        // $where_id = array(
        //     'id' => $no_id
        // );
    //Lanjutin

    $this->db->insert('pelanggan', $save);
    // $this->Pelanggan_m->update_pelanggan($where_id,$save, 'pelanggan');
    // $this->session->set_flashdata('msg','<div class="alert alert-success">Pelanggan Saved</div>');
        redirect('User/berhasil_add');
    }



    // public function update_ktp(){
    //   $id_ktp = $this->input->post("id_ktp");
    //   $no_ktp = $this->input->post("no_ktp");
    //   $old_image = $this->input->post("old_image");
    //   $foto = $_FILES['foto'];

    //       $config['upload_path']      = './upload/';
    //         $config['allowed_types']    = 'jpg|png|gif';
    //         unlink( FCPATH . "./upload/" . $old_image );

    //         $this->load->library('upload',$config);
    //         if (!$this->upload->do_upload('foto')) {
    //             echo "Gagal mengunggah foto!";
    //         }else{
    //             $foto=$this->upload->data('file_name');
    //         }
    //         $data = array(
    //         'no_ktp'=> $no_ktp,
    //         'image'=> $foto
    //          );
    //       $where = array(
    //         'id_ktp'      => $id_ktp
    //     );

    //          $this->User_m->update_ktp($where,$data,'kartu_tanda_penduduk');
    //         redirect(User/index);    
    // }
}


