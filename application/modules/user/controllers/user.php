<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class User extends MX_Controller {
  function __construct() {
        parent::__construct();
$this->load->model('user_model');
    }
   function index(){
 
   	$data['query'] = $this->user_model->get('name');
   	 // $this->load->view('display',$data);
   	$data['module'] = "user";
   	$data['view_file'] = "display";
    // $this->load->module('template/admin',$data);
   	echo Modules::run('template/admin', $data);
   }

   function create(){
   	$update_id = $this->uri->segment(3);
   	if(isset($update_id)){
   		$update_id = $this->input->post('update_id',$update_id);
   	}
   	if(is_numeric($update_id)){
$data = $this->get_data_from_db($update_id);
$data['update_id'] = $update_id;
   	}else{
$data = $this->get_data_from_post();
   	}

   	$data['module'] = "user";
   	$data['view_file'] = "form";
   	echo Modules::run('template/admin', $data);
   }

   function get_data_from_post(){
   	$data['name'] = $this->input->post('name',TRUE);
   	$data['address'] = $this->input->post('address',TRUE);
   	$data['email'] = $this->input->post('email',TRUE);
   	$data['phone'] = $this->input->post('phone',TRUE);
   		return $data;
   }
function get_data_from_db($update_id){
	$query = $this->user_model->get_where($update_id);
	foreach ($query->result() as $key => $row) {
		$data['name'] = $row->name;
		$data['address'] = $row->address;
		$data['email'] = $row->email;
		$data['phone'] = $row->phone;
	}
	return $data;
}
   function submit(){
   	 $this->load->library('form_validation');
  
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|max_length[10]');
$update_id = $this->input->post('update_id',TRUE);
    if ($this->form_validation->run() === FALSE)
    {
    	// echo "string"; die();
        $this->create();

    }
    else
    {
        	$data = $this->get_data_from_post();
        	if(is_numeric($update_id)){
        	$this->user_model->_update($data);
        	}else{
        	$this->user_model->_insert($data);	
        	}
        	$this->user_model->_insert($data);
        	redirect('user');
    }
   }

   function get_with_limit($limit, $offset, $order_by) {
    $query = $this->user_model->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function _delete($id){
    $this->user_model->_delete($id);
}

}