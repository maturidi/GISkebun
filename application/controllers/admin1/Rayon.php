<?php

class Rayon extends CI_Controller {
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
			"title"=>'Rayon',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_rayon')->result(),
			"aktif"=>"rayon",
			"content"=>"admin1/kota/rayon.php",
		);
		$this->breadcrumb->append_crumb('<i class="glyphicon glyphicon-book"></i> Data Master / <i class="glyphicon glyphicon-align-center"></i> Rayon', site_url('rayon'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('Rayon');
		}else{
			$data=array(
				// "kd_kabupaten"=>$_POST['id'],
				"rayon"=>$_POST['nama']
			);
			$this->db->insert('tb_rayon',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Rayon');
		}
	}
	public function delete($kd_rayon)
	{
		// $getrow=$this->db->query("select * from tb_rayon where kd_rayon='$kd_rayon'")->row_array();
		// $this->db->where('kd_rayon', $kd_rayon);
		// $this->db->delete('tb_rayon');
		// $this->db->query("delete from tb_rayon where kd_rayon='$kd_rayon'");
		// $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// redirect('Rayon');

		$getrow=$this->db->query("select count(*) as 'c' from tb_skk where kd_rayon='$kd_rayon'")->row();
		if ($getrow->c < 1) {
			$this->db->where('kd_rayon', $kd_rayon);
			$this->db->delete('tb_rayon');
			$this->db->query("delete from tb_rayon where kd_rayon='$kd_rayon'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('Rayon');
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('Rayon');
		}

		// $this->db->query("DELETE FROM profile where id='$id'");
		// $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		// redirect('User');
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
					redirect('Rayon');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Rayon');
			}else{
				$data=array(
					// "kd_kabupaten"=>$_POST['id'],
					"rayon"=>$_POST['nama']	
				);
				$this->db->where('kd_rayon', $_POST['id']);
				$this->db->update('tb_rayon',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Rayon');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('Rayon');
			}else{
				$data=array(
					// "kd_kabupaten"=>$_POST['id'],
					"rayon"=>$_POST['nama']
				);
				$this->db->where('kd_rayon', $_POST['id']);
				$this->db->update('tb_rayon',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Rayon');
			}     
		}


		
	}

}	