<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_admin','M_admin');
        $this->load->model("Pelanggan_m");
        $this->load->library('form_validation');
        $this->load->model("User_m");
        $this->load->helper('url');

    }

    function index(){
        $data['ktp'] = $this->M_admin->get_ktp();
        $data["Pelanggan"] = $this->Pelanggan_m->getAll();
        $data["Pe"] = $this->Pelanggan_m->JoinTB();
        $data["ViewP"] = $this->Pelanggan_m->view_modal();
        $this->load->view('admin/view_admin', $data);
        $this->load->view('admin/modal_ktp');
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
        
        $this->Pelanggan_m->save_pelanggan();
        redirect('Admin');
    }

    function add_pelanggan(){
        $pelanggan = $this->Pelanggan_m;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());
        $data['Domisili'] = $this->M_admin->get_Kota();
        $data['Dom'] = $this->M_admin->get_Kec();
        $data['Domi'] = $this->M_admin->get_Des();
        $data['Pekerjaan'] = $this->M_admin->get_Pekerjaan();
        $this->load->view('admin/add_form', $data);
    }
//MENAMPILKAN FORM EDIT
    function edit($id=null){
        $where = array('id' => $id);
        $data['pelanggan'] = $this->Pelanggan_m->edit_data($where,'pelanggan')->result();
        // $data['pelanggan'] = $this->Pelanggan_m->data_edit();
        $this->load->model('M_admin');
        $this->load->model('M_admin');
        $this->load->model('M_admin');
        $data['Domisili'] = $this->M_admin->get_Kota();
        $data['Dom'] = $this->M_admin->get_Kec();
        $data['Domi'] = $this->M_admin->get_Des();
        $data['Domis'] = $this->M_admin->pos_get();
        $data['Pel'] = $this->Pelanggan_m->getAll();
        $data['Pekerjaan'] = $this->M_admin->get_Pekerjaan();
        $data['get_ktp'] = $this->M_admin->get_ktp();
        // $data['pelanggan'] = $this->Pelanggan_m->getAll($id);
        $this->load->view('admin/edit_form',$data);
        
    }

    //AKSI UNTUK UPDATE DATA
        function update(){
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
            // redirect('User/berhasil');

            redirect('Admin');
            
            }

    
    //AKSI UNTUK MENGHAPUS DATA
     public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Pelanggan_m->delete($id)) {
            redirect(site_url('Admin'));
        }
    }

        function view($id=null){

        $where = array('id' => $id);
        
        $data['pelanggan'] = $this->Pelanggan_m->view_data($where,'pelanggan')->result();
        
        $this->load->view('Pelanggan',$data);
        
    }

 }
