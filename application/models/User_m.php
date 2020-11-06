<?php
class User_m extends CI_Model{
     

    
 
        public function __construct()
        {
            parent::__construct();
        }
     
        // function register($username,$password,$nama)
        // {
        //     $data_user = array(
        //         'username'=>$username,
        //         'password'=>password_hash($password,PASSWORD_DEFAULT),
        //         'nama'=>$nama
        //     );
        //     $this->db->insert('tb_user',$data_user);
        // }
     
        function login_user($username,$password)
        {
            $query = $this->db->get_where('users',array('username'=>$username));
            if($query->num_rows() > 0)
            {
                $data_user = $query->row();
                if (password_verify($password, $data_user->password)) {
                    $this->session->set_userdata('username',$username);
                    // $this->session->set_userdata('nama',$data_user->nama);
                    $this->session->set_userdata('is_login',TRUE);
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
            }
        }
        
        function cek_login()
        {
            if(empty($this->session->userdata('is_login')))
            {
                redirect('login');
            }
        }

    public function update_pelanggan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function update_ktp($where2,$data2,$table2){
        $this->db->where($where2);
        $this->db->update($table2,$data2);
    }
}