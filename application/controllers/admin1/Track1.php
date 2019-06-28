<?php

class Track1 extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->helper('url');
	}
	
	public function get_item(){
        $name = $this->input->post('name');
		$this->db->select('*');
	    $this->db->from('v_kebun');
	    $this->db->where('kd_kebun', $name);
	    $query = $this->db->get()->row();
        echo json_encode($query);
    }
	
}
