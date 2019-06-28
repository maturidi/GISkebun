<?php

class User1 extends CI_Controller {
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
			"title"=>'SKK',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_skk')->result(),
			"ryn"=>$this->db->get('tb_rayon')->result(),
			"v"=>$this->db->get('v_skk')->result(),
			"aktif"=>"user1",
			"content"=>"user/index1.php",
		);
		$this->breadcrumb->append_crumb('<i class="icon-user"></i> Management User / <i class="glyphicon glyphicon-queen"></i> SKK', site_url('user1'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('rayon', 'rayon', 'required');
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
					redirect('User1');
                }
               
		/*end upload foto*/


		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('User1');
		}else{
			$data=array(
				// "kd_skk"=>$_POST['id'],
				"kd_rayon"=>$_POST['rayon'],
				"nama_skk"=>$_POST['nama'],
				"user_skk"=>$_POST['username'],
				"pass_skk"=>$_POST['password'],
				"email_skk"=>$_POST['email'],
				"telp_skk"=>$_POST['telepon'],
				"foto_skk"=>$this->upload->data('file_name')
			);
			$this->db->insert('tb_skk',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('User1');
		}
	}
	public function delete($kd_skk)
	{
		// $foto=getfotom($kd_manager);
		// $getrow=$this->db->query("select * from tb_skk where kd_skk='$kd_skk'")->row_array();
		// $this->db->where('kd_skk', $kd_skk);
		// $this->db->delete('tb_skk');
		// unlink("uploads/".$getrow['foto_skk']);
		// $this->db->query("delete from tb_skk where kd_skk='$kd_skk'");
		// $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// redirect('user1');


		$getrow=$this->db->query("select count(*) as 'c' from tb_skw where kd_skk='$kd_skk'")->row();
		if ($getrow->c < 1) {
			$foto=getfotoskk($kd_skk);
			$getfoto=$this->db->query("select * from tb_skk where kd_skk='$kd_skk'")->row_array();
			$this->db->where('kd_skk', $kd_skk);
			$this->db->delete('tb_skk');
			unlink("uploads/".$getfoto['foto_skk']);
			$this->db->query("delete from tb_skk where kd_skk='$kd_skk'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('user1');		
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('User1');	
		}

		// $this->db->query("DELETE FROM profile where id='$id'");
		// $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		// redirect('User');
	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('rayon', 'rayon', 'required');
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
					redirect('User1');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('User1');
			}else{
				$data=array(
					"kd_rayon"=>$_POST['rayon'],
					"nama_skk"=>$_POST['nama'],
					"user_skk"=>$_POST['username'],
					"pass_skk"=>$_POST['password'],
					"email_skk"=>$_POST['email'],
					"telp_skk"=>$_POST['telepon'],
					"foto_skk"=>$this->upload->data('file_name')
				);
				$this->db->where('kd_skk', $_POST['id']);
				$this->db->update('tb_skk',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User1');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('User1');
			}else{
				$data=array(
					"kd_rayon"=>$_POST['rayon'],
					"nama_skk"=>$_POST['nama'],
					"user_skk"=>$_POST['username'],
					"pass_skk"=>$_POST['password'],
					"email_skk"=>$_POST['email'],
					"telp_skk"=>$_POST['telepon']
				);
				$this->db->where('kd_skk', $_POST['id']);
				$this->db->update('tb_skk',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User1');
			}     
		}


		
	}
}	