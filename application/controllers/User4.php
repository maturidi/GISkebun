<?php

class User4 extends CI_Controller {
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
			"title"=>'Mandor',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_mandor')->result(),
			"aktif"=>"user4",
			"content"=>"user/index4.php",
		);
		$this->breadcrumb->append_crumb('<i class="icon-user"></i> Management User / <i class="glyphicon glyphicon-bishop"></i> Mandor', site_url('user4'));
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
			redirect('User4');
		}else{
			$data=array(
				// "kd_mandor"=>$_POST['id'],
				"nama_mandor"=>$_POST['nama'],
				"user_mandor"=>$_POST['username'],
				"pass_mandor"=>$_POST['password'],
				"email_mandor"=>$_POST['email'],
				"telp_mandor"=>$_POST['telepon'],
				"foto_mandor"=>$this->upload->data('file_name')
			);
			$this->db->insert('tb_mandor',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('User4');
		}
	}
	public function delete($kd_mandor)
	{
		// $foto=getfotomandor($kd_mandor);
		// $getrow=$this->db->query("select * from tb_mandor where kd_mandor='$kd_mandor'")->row_array();
		// $this->db->where('kd_mandor', $kd_mandor);
		// $this->db->delete('tb_mandor');
		// unlink("uploads/".$getrow['foto_mandor']);
		// $this->db->query("delete from tb_mandor where kd_mandor='$kd_mandor'");
		// $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// redirect('user4');


		$getrow=$this->db->query("select count(*) as 'c' from tb_kebun where kd_mandor='$kd_mandor'")->row();
		if ($getrow->c < 1) {
			$foto=getfotomandor($kd_mandor);
			$getfoto=$this->db->query("select * from tb_mandor where kd_mandor='$kd_mandor'")->row_array();
			$this->db->where('kd_mandor', $kd_mandor);
			$this->db->delete('tb_mandor');
			unlink("uploads/".$getfoto['foto_mandor']);
			$this->db->query("delete from tb_mandor where kd_mandor='$kd_mandor'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('user4');
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('User4');
		}

		// $this->db->query("DELETE FROM profile where id='$id'");
		// $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		// redirect('User');
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
					redirect('User4');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('User4');
			}else{
				$data=array(
					"nama_mandor"=>$_POST['nama'],
					"user_mandor"=>$_POST['username'],
					"pass_mandor"=>$_POST['password'],
					"email_mandor"=>$_POST['email'],
					"telp_mandor"=>$_POST['telepon'],
					"foto_mandor"=>$this->upload->data('file_name')	
				);
				$this->db->where('kd_mandor', $_POST['id']);
				$this->db->update('tb_mandor',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User4');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('User4');
			}else{
				$data=array(
					"nama_mandor"=>$_POST['nama'],
					"user_mandor"=>$_POST['username'],
					"pass_mandor"=>$_POST['password'],
					"email_mandor"=>$_POST['email'],
					"telp_mandor"=>$_POST['telepon']
				);
				$this->db->where('kd_mandor', $_POST['id']);
				$this->db->update('tb_mandor',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User4');
			}     
		}


		
	}
}	