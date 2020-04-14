<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Model {
    public function store(){
        $data = array(
            'id'        = uniqid('invoice'),
            'user'      = $this->session->userdata('username'),
            'warung'    = $this->input->post('warung'),
            'origin'    = $this->input->post('origin'),
            'origin_id' = $this->input->post('origin-place_id'),
            'destination'= $this->input->post('destination'),
            'destination_id'= $this->input->post('destination-place_id'),
            'distance'  = $this->input->post('distance'),
            'delivery_fee' = $this->input->post('delivery_fee'),
            'billing'   = $this->input->post('billing'),
            'total'     = $this->input->post('total')
        );

        $this->db->insert('invoices',$data);
    }

    public function store_details($id){
        $data = array(
            'id' => $id,
            'item' => $this->input->post('item'),
            'price' => $this->input->post('price'),
            'quantity' => $this->input->post('quantity')
        );

        $this->db->insert('invoice_details',$data);
    }
}?>