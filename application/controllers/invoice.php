<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoice extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('items');
        $this->load->model('carts');
        $this->load->model('warungs');
    }

    public function create(){
        $data['carts'] = $this->carts->get_all($this->session->userdata('username'));
        $data['warungs'] = $this->warungs->get_users_warung($data['carts'][0]['username_warung']);
        print_r($data['warungs']);

        $this->load->view('template/header');
        $this->load->view('invoice/create',$data);
        $this->load->view('template/footer');
        $this->load->view('invoice/script');
    }

    public function store(){

        
    }

    public function tes(){

        $this->load->view('invoice/tes');
        $this->load->view('invoice/script');
    }
}?>