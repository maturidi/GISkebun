<?php

class Top extends CI_Controller {
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
			"title"=>'Login',
			"kd_admin"=>$kd_admin,
			"all"=>$this->db->where('kd_admin',$kd_admin)->get('tb_admin')->result(),
			"aktif"=>"head"
		);
		$this->load->view('admin/template',$data);

		// $data=array(
		// 	// "title"=>'Head',
		// 	// "menu"=>getmenu(),
		// 	// "aktif"=>"top",
		// 	// "content"=>"admin/head.php",
		// 	"all"=>$this->db->get('tb_admin')->result()
		// );
		// $this->breadcrumb->append_crumb('Top', site_url('top'));
		// $this->load->view('admin/template',$data);
	}
	

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('sukses', 'Terimakasih telah Login');
		redirect('login');
	}
	
	public function update()
	{
		
		$id=$_POST['id'];
		$username=$_POST['username'];
		$passlama=$_POST['passlama'];
		$passbaru=$_POST['passbaru'];
		$konpassbaru=$_POST['konpassbaru'];		

		$arr=$this->db->query("select * from tb_admin where kd_admin='$id'")->row_array();
		if(md5($passlama)!=$arr['password']){
			$this->session->set_flashdata('error', 'Maaf Password Lama Anda Salah');
			redirect('Welcome');
		}elseif($passbaru!=$konpassbaru){
			$this->session->set_flashdata('error', 'Maaf Konfirmasi Password Baru Tidak Sama');
			redirect('Welcome');
		} else {
			$data=array(
				"username"=>$username,
				"password"=>md5($passbaru),
			);
		}

		$this->db->where('kd_admin', $id);
		$this->db->update('tb_admin', $data);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
		redirect('Welcome');


	}

	public function data()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('telepon', 'telepon', 'required');

		if (!empty($_FILES['foto']['name'])) {
			$this->load->helper(array('form', 'url'));
			$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto'))
                {
                       
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('Welcome');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Welcome');
			}else{
				$data=array(
					"nama"=>$_POST['nama'],
					"email"=>$_POST['email'],
					"no_telp"=>$_POST['telepon']
						
				);
				$this->db->where('kd_admin', $_POST['id']);
				$this->db->update('tb_admin',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Welcome');
			}               
		}else{
			if($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('Welcome');
			}else{
				$data=array(
					"nama"=>$_POST['nama'],
					"email"=>$_POST['email'],
					"no_telp"=>$_POST['telepon']
				);
				$this->db->where('kd_admin', $_POST['id']);
				$this->db->update('tb_admin',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Welcome');
			}     
		}
	}

	public function foto()
	{
		$this->form_validation->set_rules('id', 'id', 'required');

		if (!empty($_FILES['foto']['name'])) {
			$this->load->helper(array('form', 'url'));
			$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto'))
                {
                       
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('Welcome');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Welcome');
			}else{
				$data=array(
					"foto"=>$this->upload->data('file_name')
				);
				$this->db->where('kd_admin', $_POST['id']);
				$this->db->update('tb_admin',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Welcome');
			}               
		}else{
			if($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('Welcome');
			}else{
				$data=array(
					
				);
				$this->db->where('kd_admin', $_POST['id']);
				$this->db->update('tb_admin',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Welcome');
			}     
		}
	}
	
}	