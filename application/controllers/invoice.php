<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoice extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('items');
        $this->load->model('carts');
        $this->load->model('warungs');
        $this->load->model('invoices');
    }

    public function create(){
        $data['carts'] = $this->carts->get_all($this->session->userdata('username'));
        $data['warungs'] = $this->warungs->get_users_warung($data['carts'][0]['username_warung']);
        // print_r($data['warungs']);

        $this->load->view('template/header');
        $this->load->view('invoice/create',$data);
        $this->load->view('template/footer');
        $this->load->view('invoice/script');
    }

    public function store(){
        $this->invoices->store();

        redirect('profile/order');
    }

    public function update_to_process($id){
        $data = array(
            'status' => 'Sedang dikirim'
        );

        $this->db->where('id',$id);
        $this->db->update('invoices',$data);
        
        redirect('profile/order');
    }

    public function cancel($id){
        $data = array(
            'status' => 'Dibatalkan'
        );

        $this->db->where('id',$id);
        $this->db->update('invoices',$data);
        
        redirect('profile/order');
    }

    public function tes(){

        $this->load->view('invoice/tes');
        $this->load->view('invoice/script');
    }
}?>