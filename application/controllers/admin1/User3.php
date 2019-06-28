<?php

class User3 extends CI_Controller {
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
			"title"=>'PLPG',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_plpg')->result(),
			"skw"=>$this->db->get('tb_skw')->result(),
			"v"=>$this->db->get('v_plpg')->result(),
			"aktif"=>"user3",
			"content"=>"admin1/user/index3.php",
		);
		$this->breadcrumb->append_crumb('<i class="icon-user"></i> Management User / <i class="glyphicon glyphicon-knight"></i> PLPG', site_url('user3'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('skw', 'skw', 'required');
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
					redirect('User3');
                }
               
		/*end upload foto*/


		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('User3');
		}else{
			$data=array(
				// "kd_plpg"=>$_POST['id'],
				"kd_skw"=>$_POST['skw'],
				"nama_plpg"=>$_POST['nama'],
				"user_plpg"=>$_POST['username'],
				"pass_plpg"=>$_POST['password'],
				"email_plpg"=>$_POST['email'],
				"telp_plpg"=>$_POST['telepon'],
				"foto_plpg"=>$this->upload->data('file_name')
			);
			$this->db->insert('tb_plpg',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('User3');
		}
	}
	public function delete($kd_plpg)
	{
		// $foto=getfotoplpg($kd_plpg);
		// $getrow=$this->db->query("select * from tb_plpg where kd_plpg='$kd_plpg'")->row_array();
		// $this->db->where('kd_plpg', $kd_plpg);
		// $this->db->delete('tb_plpg');
		// unlink("uploads/".$getrow['foto_plpg']);
		// $this->db->query("delete from tb_plpg where kd_plpg='$kd_plpg'");
		// $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// redirect('user3');

		$getrow=$this->db->query("select count(*) as 'c' from tb_kebun where kd_plpg='$kd_plpg'")->row();
		if ($getrow->c < 1) {
			$foto=getfotoplpg($kd_plpg);
			$getfoto=$this->db->query("select * from tb_plpg where kd_plpg='$kd_plpg'")->row_array();
			$this->db->where('kd_plpg', $kd_plpg);
			$this->db->delete('tb_plpg');
			unlink("uploads/".$getfoto['foto_plpg']);
			$this->db->query("delete from tb_plpg where kd_plpg='$kd_plpg'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('user3');
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('User3');
		}

		// $this->db->query("DELETE FROM profile where id='$id'");
		// $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		// redirect('User');
	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('skw', 'skw', 'required');
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
					redirect('User3');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('User3');
			}else{
				$data=array(
					"kd_skw"=>$_POST['skw'],
					"nama_plpg"=>$_POST['nama'],
					"user_plpg"=>$_POST['username'],
					"pass_plpg"=>$_POST['password'],
					"email_plpg"=>$_POST['email'],
					"telp_plpg"=>$_POST['telepon'],
					"foto_plpg"=>$this->upload->data('file_name')
				);
				$this->db->where('kd_plpg', $_POST['id']);
				$this->db->update('tb_plpg',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User3');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('User3');
			}else{
				$data=array(
					"kd_skw"=>$_POST['skw'],
					"nama_plpg"=>$_POST['nama'],
					"user_plpg"=>$_POST['username'],
					"pass_plpg"=>$_POST['password'],
					"email_plpg"=>$_POST['email'],
					"telp_plpg"=>$_POST['telepon']
				);
				$this->db->where('kd_plpg', $_POST['id']);
				$this->db->update('tb_plpg',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('User3');
			}     
		}


		
	}
}	