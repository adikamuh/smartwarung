<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('users');
    }

    public function index(){
        $data['warungs'] = $this->users->get_warungs();
        $data['users'] = $this->users->get_users();
        $data['active'] = 'index';

        $this->load->view('template/header');
        $this->load->view('admin/index',$data);
        $this->load->view('template/footer');
    }

    public function warung(){
        $data['warungs'] = $this->users->get_warungs();
        $data['active'] = 'warung';

        $this->load->view('template/header');
        $this->load->view('admin/warung',$data);
        $this->load->view('template/footer');
    }

    public function user(){
        $data['users'] = $this->users->get_users();
        $data['active'] = 'user';

        $this->load->view('template/header');
        $this->load->view('admin/user',$data);
        $this->load->view('template/footer');
    }

    public function approve($username){
        $data = array(
            'status' => 'Sudah diverifikasi'
        );

        $this->db->where('username',$username);
        if($this->db->update('warungs',$data)){
            $this->session->set_flashdata('success','Warung berhasil diverifikasi!');
            redirect('admin');
        }else {
            $this->session->set_flashdata('errors','Warung gagal diverifikasi');
            redirect('admin');
        }
    }

    public function delete($username){
        $this->db->where('username',$username);

        if($this->db->delete('users')){
            $this->session->set_flashdata('success','Warung berhasil dihapus!');
            redirect('admin');
        }else {
            $this->session->set_flashdata('errors','Warung gagal dihapus!');
            redirect('admin');
        }
    }

}
?>