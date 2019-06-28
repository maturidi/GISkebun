<?php

class User2 extends CI_Controller {
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
			"title"=>'SKW',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_skw')->result(),
			"skk"=>$this->db->get('tb_skk')->result(),
			"afd"=>$this->db->get('tb_afdeling')->result(),
			"v"=>$this->db->get('v_skw')->result(),
			"aktif"=>"user2",
			"content"=>"admin1/user/index2.php",
		);
		$this->breadcrumb->append_crumb('<i class="icon-user"></i> Management User / <i class="glyphicon glyphicon-tower"></i> SKW', site_url('user2'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('skk', 'skk', 'required');
		$this->form_validation->set_rules('afdeling', 'afdeling', 'required');
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
					redirect('User2');
                }
               
		/*end upload foto*/


		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('User2');
		}else{
			$data=array(
				// "kd_skw"=>$_POST['id'],
				"kd_skk"=>$_POST['skk'],
				"kd_afdeling"=>$_POST['afdeling'],
				"nama_skw"=>$_POST['nama'],
				"user_skw"=>$_POST['username'],
				"pass_skw"=>$_POST['password'],
				"email_skw"=>$_POST['email'],
				"telp_skw"=>$_POST['telepon'],
				"foto_skw"=>$this->upload->data('file_name')
			);
			$this->db->insert('tb_skw',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('User2');
		}
	}
	public function delete($kd_skw)
	{
		// $foto=getfotoskw($kd_skw);
		// $getrow=$this->db->query("select * from tb_skw where kd_skw='$kd_skw'")->row_array();
		// $this->db->where('kd_skw', $kd_skw);
		// $this->db->delete('tb_skw');
		// unlink("uploads/".$getrow['foto_skw']);
		// $this->db->query("delete from tb_skw where kd_skw='$kd_skw'");
		// $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// redirect('user2');

		$getrow=$this->db->query("select count(*) as 'c' from tb_plpg where kd_skw='$kd_skw'")->row();
		if ($getrow->c < 1) {
			$foto=getfotoskw($kd_skw);
			$getfoto=$this->db->query("select * from tb_skw where kd_skw='$kd_skw'")->row_array();
			$this->db->where('kd_skw', $kd_skw);
			$this->db->delete('tb_skw');
			unlink("uploads/".$getfoto['foto_skw']);
			$this->db->query("delete from tb_skw where kd_skw='$kd_skw'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('user2');
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('User2');
		}

		// $this->db->query("DELETE FROM profile where id='$id'");
		// $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		// redirect('User');
	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('skk', 'skk', 'required');
		$this->form_validation->set_rules('afdeling', 'afdeling', 'required');
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
					redirect('User2');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('User2');
			}else{
				$data=array(
					"kd_skk"=>$_POST['skk'],
					"kd_afdeling"=>$_POST['afdeling'],
					"nama_skw"=>$_POST['nama'],
					"user_skw"=>$_POST['username'],
					"pass_skw"=>$_POST['password'],
					"email_skw"=>$_POST['email'],
					"telp_skw"=>$_POST['telepon'],
					"foto_skw"=>$this->upload->data('file_name')
				);
				$this->db->where('kd_skw', $_POST['id']);
				$this->db->update('tb_skw',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User2');
			}               
		}else{
			if($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('User2');
			}else{
				$data=array(
					"kd_skk"=>$_POST['skk'],
					"kd_afdeling"=>$_POST['afdeling'],
					"nama_skw"=>$_POST['nama'],
					"user_skw"=>$_POST['username'],
					"pass_skw"=>$_POST['password'],
					"email_skw"=>$_POST['email'],
					"telp_skw"=>$_POST['telepon']
				);
				$this->db->where('kd_skw', $_POST['id']);
				$this->db->update('tb_skw',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User2');
			}     
		}
	}
}	