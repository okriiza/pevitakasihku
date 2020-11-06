<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{
  function get_Kota()
    {
        $this->db->order_by("nama_kota_kabupaten", "ASC");
        $query = $this->db->get('kota_kabupaten');
        return $query->result();  
    }

    function get_Kec()
    {
        
        $this->db->order_by("nama_kecamatan", "ASC");
        $query = $this->db->get('kecamatan');
        return $query->result();  
    }

    function get_Des()
    {
        $this->db->order_by("nama_desa_kelurahan", "ASC");
        $query = $this->db->get('desa_kelurahan');
        return $query->result();  
    }
    function pos_get(){
        $this->db->order_by("kodepos", "ASC");
        $query = $this->db->get('kodepos');
        return $query->result();
    }
    // function get_Ktp(){
    //     $this->db->order_by("no_ktp", "ASC");
    //     $query = $this->db->get('kartu_tanda_penduduk');
    //     return $query->result();
    // }

    function get_Kecamatan($kota_kabupaten_id)
    {
        $query = $this->db->get_where('kecamatan', array('kota_kabupaten_id' => $kota_kabupaten_id));
        return $query;
        
    }

    function get_Desa($kecamatan_id)
    {
        $query = $this->db->get_where('desa_kelurahan', array('kecamatan_id' => $kecamatan_id));
        return $query;
        
    }

    function get_Pos($desa_kelurahan_id)
    {
        $query = $this->db->get_where('kodepos', array('desa_kelurahan_id' => $desa_kelurahan_id));
        return $query;
        
    }

    function get_Pekerjaan(){
        $this->db->order_by("nama_pekerjaan", "ASC");
        $query = $this->db->get('pekerjaan');
        return $query->result();
    }

    


    function save_product(){
        $no_indihome   = $this->input->post('no_indihome',TRUE);
        $no_telepon    = $this->input->post('no_telepon',TRUE);
        $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
        $kota_kabupaten_id  = $this->input->post('kota_kabupaten_id',TRUE);
        $kecamatan_id  = $this->input->post('kecamatan_id',TRUE);
        $desa_kelurahan_id  = $this->input->post('desa_kelurahan',TRUE);
        $alamat  = $this->input->post('alamat',TRUE);
        $kodepos_id  = $this->input->post('kodepos_id',TRUE);
        $no_handphone  = $this->input->post('no_handphone',TRUE);
        $email  = $this->input->post('email',TRUE);
        $pekerjaan_id  = $this->input->post('pekerjaan',TRUE);
        $kartu_tanda_penduduk  = $this->input->post('kartu_tanda_penduduk',TRUE);
        $status  = $this->input->post('status',TRUE);
        $last_updated_at = date('m/d/Y h:i:s a', time());

        $this->Pelanggan_m->save_product($no_indihome, $no_telepon, $nama_lengkap, $kota_kabupaten_id, $kecamatan_id, $desa_kelurahan_id, $alamat, $kodepos_id, $no_handphone, $email, $pekerjaan_id, $kartu_tanda_penduduk, $status);
        $this->session->set_flashdata('msg','<div class="alert alert-success">Product Saved</div>');
        redirect('product/add_new');
    }
        

     function get_ktp(){
       $this->db->select('*');
       $this->db->from('kartu_tanda_penduduk');
      $query = $this->db->get();
      return $query->result();
   } 
  
}
