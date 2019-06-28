<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		in_access();
		$this->load->model('M_login');
	}

	public function index()
	{
		$data=array(
			"title"=>'Login',
			"all"=>$this->db->get('tb_admin')->result(),
			"aktif"=>"login"
		);
		$this->load->view('login.php',$data);
	}
	public function signin(){
		$username=$this->security->sanitize_filename($_POST['username']);
		$password=$this->security->sanitize_filename($_POST['password']);
		$ceknum=$this->M_login->ceknum($username,md5($password))->num_rows();
		$rows=$this->M_login->ceknum($username,md5($password))->row_array();
		if($ceknum>0){
			$kd_admin=$this->db->query("select * from tb_admin")->row_array();
			$this->session->set_userdata('user',$username);
			$this->session->set_userdata('kd_admin',$rows['kd_admin']);
			$this->session->set_userdata('level',$rows['akses']);
			redirect('Welcome');
		}else{
			$this->session->set_flashdata('error','Maaf Anda Gagal Login');
			redirect('Login');
		}

	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */