<?php

class User extends CI_Controller {
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
			"title"=>'Manager',
			"menu"=>getmenu(),
			"all"=>$this->db->get('tb_manager')->result(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"aktif"=>"user",
			"content"=>"admin1/user/index.php",
		);
		$this->breadcrumb->append_crumb('<i class="icon-user"></i> Management User / <i class="glyphicon glyphicon-king"></i> Manager ', site_url('user'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('telepon', 'telepon', 'required');
		
		/* Upload FOto */
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
					redirect('User');
                }
               
		/*end upload foto*/


		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('User');
		}else{
			$data=array(
				// "kd_manager"=>$_POST['id'],
				"nama_manager"=>$_POST['nama'],
				"user_manager"=>$_POST['username'],
				"pass_manager"=>$_POST['password'],
				"email_manager"=>$_POST['email'],
				"telp_manager"=>$_POST['telepon'],
				"foto_manager"=>$this->upload->data('file_name')
			);
			$this->db->insert('tb_manager',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('User');
		}
	}
	public function delete($kd_manager)
	{
		// $foto=getfotom($kd_manager);
		// $getrow=$this->db->query("select * from tb_manager where kd_manager='$kd_manager'")->row_array();
		// $this->db->where('kd_manager', $kd_manager);
		// $this->db->delete('tb_manager');
		// unlink("uploads/".$getrow['foto_manager']);
		// $this->db->query("delete from tb_manager where kd_manager='$kd_manager'");
		// $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// redirect('user');

		$getrow=$this->db->query("select count(*) as 'c' from tb_kebun where kd_manager='$kd_manager'")->row();
		if ($getrow->c < 1) {
			$foto=getfotom($kd_manager);
			$getfoto=$this->db->query("select * from tb_manager where kd_manager='$kd_manager'")->row_array();
			$this->db->where('kd_manager', $kd_manager);
			$this->db->delete('tb_manager');
			unlink("uploads/".$getfoto['foto_manager']);
			$this->db->query("delete from tb_manager where kd_manager='$kd_manager'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('user');		
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('user');	
		}

	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
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
					redirect('User');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('User');
			}else{
				$data=array(
					"nama_manager"=>$_POST['nama'],
					"user_manager"=>$_POST['username'],
					"pass_manager"=>$_POST['password'],
					"email_manager"=>$_POST['email'],
					"telp_manager"=>$_POST['telepon'],
					"foto_manager"=>$this->upload->data('file_name')
				);
				$this->db->where('kd_manager', $_POST['id']);
				$this->db->update('tb_manager',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('User');
			}else{
				$data=array(
					"nama_manager"=>$_POST['nama'],
					"user_manager"=>$_POST['username'],
					"pass_manager"=>$_POST['password'],
					"email_manager"=>$_POST['email'],
					"telp_manager"=>$_POST['telepon']
				);
				$this->db->where('kd_manager', $_POST['id']);
				$this->db->update('tb_manager',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User');
			}     
		}


		
	}
}	