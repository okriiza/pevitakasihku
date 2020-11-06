<?php
class Cek_pelanggan extends CI_Model
{
   public function tambah_data($table, $data)
   {
      $this->db->insert($table, $data);
   }



   public function ketersediaan($table, $where)
   {
      return $this->db->get_where($table, $where);
   }

   public function ketersediaan_ktp($table, $where2)
   {
      return $this->db->get_where($table, $where2);
   }





   public function cek_akun($table, $where2)
   {
      return $this->db->get_where($table, $where2);
   }
   public function ambil_id_private($id_private){
      $this->db->select('*');
      $this->db->from('tb_private');
      return $this->db->get();
    }

   function daftar_data($data,$table)
   {
      $this->db->insert($table,$data);
   }


}