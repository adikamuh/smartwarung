<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('users');
        $this->load->model('invoices');
        $this->load->model('items');
    }

    public function index(){
        $data['user'] = $this->users->get_username($this->session->userdata('username'));

        $this->load->view('template/header');
        $this->load->view('profile/index',$data);
        $this->load->view('template/footer');
    }

    public function order(){
        $data['user'] = $this->users->get_username($this->session->userdata('username'));
        $data['invoices'] = $this->invoices->get_all_invoices($this->session->userdata('username'));

        $this->load->view('template/header');
        $this->load->view('profile/order',$data);
        $this->load->view('template/footer');
        $this->load->view('profile/script');
    }

    public function etalase(){
        $data['items'] = $this->items->get_all_username($this->session->userdata('username'));
        $data['user'] = $this->users->get_username($this->session->userdata('username'));

        $this->load->view('template/header');
        $this->load->view('profile/etalase',$data);
        $this->load->view('template/footer');
    }

    public function invoice_details($id){
        $data = $this->invoices->get_invoice_details($this->session->userdata('username'),$id);
        $jsondata = json_encode($data);

        echo $jsondata;
    }
}?>