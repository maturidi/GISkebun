<?php

class Kategori extends CI_Controller {
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
			"title"=>'Kategori',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_kategori')->result(),
			"aktif"=>"kategori",
			"content"=>"admin1/kota/kategori.php",
		);
		$this->breadcrumb->append_crumb('<i class="glyphicon glyphicon-book"></i> Data Master / <i class="glyphicon glyphicon-list"></i> Kategori', site_url('kategori'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('Kategori');
		}else{
			$data=array(
				// "kd_kategori"=>$_POST['id'],
				"kategori"=>$_POST['nama']
			);
			$this->db->insert('tb_kategori',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Kategori');
		}
	}
	public function delete($kd_kategori)
	{
		// $getrow=$this->db->query("select * from tb_kategori where kd_kategori='$kd_kategori'")->row_array();
		// $this->db->where('kd_kategori', $kd_kategori);
		// $this->db->delete('tb_kategori');
		// $this->db->query("delete from tb_kategori where kd_kategori='$kd_kategori'");
		// $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// redirect('Kategori');

		$getrow=$this->db->query("select count(*) as 'c' from tb_kebun where kd_kategori='$kd_kategori'")->row();
		if ($getrow->c < 1) {
			$this->db->where('kd_kategori', $kd_kategori);
			$this->db->delete('tb_kategori');
			$this->db->query("delete from tb_kategori where kd_kategori='$kd_kategori'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('Kategori');
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('Kategori');
		}

	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');

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
					redirect('Kategori');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Kategori');
			}else{
				$data=array(
					// "kd_kategori"=>$_POST['id'],
					"kategori"=>$_POST['nama']	
				);
				$this->db->where('kd_kategori', $_POST['id']);
				$this->db->update('tb_kategori',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Kategori');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('Kategori');
			}else{
				$data=array(
					// "kd_kategori"=>$_POST['id'],
					"kategori"=>$_POST['nama']
				);
				$this->db->where('kd_kategori', $_POST['id']);
				$this->db->update('tb_kategori',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Kategori');
			}     
		}


		
	}

}	