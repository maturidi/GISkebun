<?php

class Welcome extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Dashboard',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"aktif"=>"dashboard",
			"content"=>"dashboard/index.php",
		);
		$this->breadcrumb->append_crumb('<i class="icon-home4"></i> Beranda', site_url('welcome'));
		$this->load->view('admin/template',$data);
	}
	public function embed($file)
	{
		echo "<embed src='".base_url('uploads/'.$file)."' width='100%' height='100%'></embed>";
	}
	
}
