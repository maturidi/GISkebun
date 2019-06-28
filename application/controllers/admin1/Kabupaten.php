<?php

class Kabupaten extends CI_Controller {
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
			"title"=>'Kabupaten',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_kabupaten')->result(),
			"aktif"=>"kabupaten",
			"content"=>"admin1/kota/kabupaten.php",
		);
		$this->breadcrumb->append_crumb('<i class="glyphicon glyphicon-book"></i> Data Master / <i class="glyphicon glyphicon-align-left"></i> Kabupaten', site_url('kabupaten'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('Kabupaten');
		}else{
			$data=array(
				// "kd_kabupaten"=>$_POST['id'],
				"nama_kabupaten"=>$_POST['nama']
			);
			$this->db->insert('tb_kabupaten',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Kabupaten');
		}
	}
	public function delete($kd_kabupaten)
	{
		$getrow=$this->db->query("select count(*) as 'c' from tb_kecamatan where kd_kabupaten='$kd_kabupaten'")->row();
		if ($getrow->c < 1) {
			$this->db->where('kd_kabupaten', $kd_kabupaten);
			$this->db->delete('tb_kabupaten');
			$this->db->query("delete from tb_kabupaten where kd_kabupaten='$kd_kabupaten'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('kabupaten');
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('kabupaten');
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
					redirect('Kabupaten');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Kabupaten');
			}else{
				$data=array(
					// "kd_kabupaten"=>$_POST['id'],
					"nama_kabupaten"=>$_POST['nama']	
				);
				$this->db->where('kd_kabupaten', $_POST['id']);
				$this->db->update('tb_kabupaten',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Kabupaten');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('Kabupaten');
			}else{
				$data=array(
					// "kd_kabupaten"=>$_POST['id'],
					"nama_kabupaten"=>$_POST['nama']
				);
				$this->db->where('kd_kabupaten', $_POST['id']);
				$this->db->update('tb_kabupaten',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Kabupaten');
			}     
		}


		
	}

}	