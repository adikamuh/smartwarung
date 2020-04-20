<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Model {
    public function store($username){
        if($this->get_username($username) == null){
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'role' => 0
            );
    
            return $this->db->insert('users', $data);
        }else{
            return ;
        }

    }

    public function store_warung($username,$photo){

        if($this->get_username($username) == null){
            

            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'role' => 1,
                'photo' => $photo

            );

            $data_warung = array(
                'address' => $this->input->post('address'),
                'place_id' => $this->input->post('place_id'),
                'username' => $this->input->post('username'),
                'status' => 'Belum diverifikasi'
            );

            $this->db->insert('users',$data);
            $this->db->insert('warungs',$data_warung);
            return;
        }
    }
    
    public function get_username($username){
        $this->db->where('username', $username);
        return $this->db->get('users')->row_array();
    }

    public function get_users(){
        $this->db->from('users');
        $this->db->where('role',0);
        return $this->db->get()->result_array();
    }

    public function get_warungs(){
        $this->db->from('users');
        $this->db->join('warungs','users.username = warungs.username');
        return $this->db->get()->result_array();
    }

    public function update($username){
        $data = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email')
        );

        $this->db->where('username',$username);
        return $this->db->update('users',$data);
    }

    public function get_password($username){
        $this->db->select('password');
        $this->db->where('username',$username);
        return $this->db->get('users')->row_array();
    }

}
?>