<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('users');
        $this->load->model('invoices');
        $this->load->model('items');

        $this->load->library('form_validation');
        $this->load->helper('date');
    }

    public function index(){
        $data['user'] = $this->users->get_username($this->session->userdata('username'));
        $data['active'] = 'index';

        $this->load->view('template/header');
        $this->load->view('profile/index',$data);
        $this->load->view('template/footer');
        if ($this->session->userdata('role')==1) {
            $data['warung'] = $this->users->get_user_warung($this->session->userdata('username'));
            $this->load->view('profile/scriptMap',$data);            
        }
    }
    
    public function show($username){
        if($this->session->userdata('username')==$username){
            redirect('profile/');
        }
        
        $data['user'] = $this->users->get_username($username);
        $data['active'] = 'index';
        
        $this->load->view('template/header');
        $this->load->view('profile/index',$data);
        $this->load->view('template/footer');
        if ($data['user']['role']==1) {
            $data['warung'] = $this->users->get_user_warung($data['user']['username']);
            $this->load->view('profile/scriptMap',$data);            
        }
    }

    public function order(){
        $data['user'] = $this->users->get_username($this->session->userdata('username'));
        $data['invoices'] = $this->invoices->get_all_invoices($this->session->userdata('username'));
        $data['active'] = 'order';

        $this->load->view('template/header');
        $this->load->view('profile/order',$data);
        $this->load->view('template/footer');
        $this->load->view('profile/script',$data);
    }

    public function etalase($username){
        $data['items'] = $this->items->get_all_username($username);
        $data['user'] = $this->users->get_username($username);
        $data['active'] = 'etalase';

        $this->load->view('template/header');
        $this->load->view('profile/etalase',$data);
        $this->load->view('template/footer');
    }


    public function edit($username){
        $data['user'] = $this->users->get_username($username);

        $this->load->view('template/header');
        $this->load->view('profile/edit',$data);
        $this->load->view('template/footer');
    }

    public function change_password($username){
        $oldpassword = $this->users->get_password($username);
        echo $oldpassword['password'];

        if ($oldpassword['password'] == md5($this->input->post('oldpassword'))){
            if($this->input->post('verif-newpassword')!=$this->input->post('newpassword')){
                $this->session->set_flashdata('errors','Ganti password gagal!a');
                redirect('profile');
            }else{
                $data = array(
                    'password' => md5($this->input->post('newpassword'))
                );
                $this->db->where('username',$username);
                $this->db->update('users',$data);

                $this->session->set_flashdata('success','Ganti password berhasil!');
                redirect('profile');
            }
        }else{
            $this->session->set_flashdata('errors','Ganti password gagal!b');
            redirect('profile');
        }
    }

    public function update($username){
        if($this->input->post('username')!=$username){
            $this->form_validation->set_rules('username','Username', 'required|alpha_dash|is_unique[users.username]');

        }
        $this->form_validation->set_rules('name','Full Name', 'required');
		$this->form_validation->set_rules('phone','Phone', 'required|numeric');
        $this->form_validation->set_rules('email','E-mail', 'required|valid_email');
        
        if($this->form_validation->run() == false){
            $data['user'] = $this->users->get_username($username);
            $this->load->view('template/header');
            $this->load->view('profile/edit',$data);
            $this->load->view('template/footer');
        }else{
            $this->users->update($username);
            $this->session->set_flashdata('success','Akun berhasil diperbarui');
            redirect('profile/show/'.$this->input->post('username'));
        }
    }

    public function invoice_details($id){
        $data = $this->invoices->get_invoice_details($this->session->userdata('username'),$id);
        $jsondata = json_encode($data);

        echo $jsondata;
    }
}?>