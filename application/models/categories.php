<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categories extends CI_Model {
    public function get_all(){
        return $this->db->get('categories')->result_array();
    }

    public function get_all_items(){
        $this->db->select('items.name, items.price, items.photo, items.id');
        $this->db->from('items');
        $this->db->join('categories', 'items.category = categories.id');
        return $this->db->get()->result_array();        
    }

    public function get_by_categories($id){
        $this->db->select('items.name, items.price, items.photo, items.id');
        $this->db->from('items');
        $this->db->join('categories', 'items.category = categories.id');
        $this->db->where('categories.id',$id);
        return $this->db->get()->result_array();
    }
}?>