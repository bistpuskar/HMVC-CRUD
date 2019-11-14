<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function get_table() {
    $table = 'user';
    return $table;
}

function get($order_by){
    $this->db->order_by($order_by);
    $query = $this->db->get('user');
    return $query;
}
function _insert($data){
    $table = $this->get_table();
    $this->db->insert($table, $data);
}
function get_where($id){
    $table = $this->get_table();
    $this->db->where('id', $id);
    $query=$this->db->get($table);
    return $query;
}

function _delete($id){
    $table = $this->get_table();
    $this->db->where('id', $id);
    $this->db->delete($table);
}

  }
