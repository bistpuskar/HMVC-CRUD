<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller 
{

    function admin($data)
    {
            $this->load->view('admin', $data);
    }
     
    
}
