<?php

class Afdeling extends CI_Controller {
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
			"title"=>'Afdeling',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_afdeling')->result(),
			"aktif"=>"afdeling",
			"content"=>"kota/afdeling.php",
		);
		$this->breadcrumb->append_crumb('<i class="glyphicon glyphicon-book"></i> Data Master / <i class="glyphicon glyphicon-align-justify"></i> Afdeling', site_url('afdeling'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('Afdeling');
		}else{
			$data=array(
				// "kd_kabupaten"=>$_POST['id'],
				"afdeling"=>$_POST['nama']
			);
			$this->db->insert('tb_afdeling',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Afdeling');
		}
	}
	public function delete($kd_afdeling)
	{
		// $getrow=$this->db->query("select * from tb_afdeling where kd_afdeling='$kd_afdeling'")->row_array();
		// $this->db->where('kd_afdeling', $kd_afdeling);
		// $this->db->delete('tb_afdeling');
		// $this->db->query("delete from tb_afdeling where kd_afdeling='$kd_afdeling'");
		// $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// redirect('Afdeling');


		$getrow=$this->db->query("select count(*) as 'c' from tb_skw where kd_afdeling='$kd_afdeling'")->row();
		if ($getrow->c < 1) {
			$this->db->where('kd_afdeling', $kd_afdeling);
			$this->db->delete('tb_afdeling');
			$this->db->query("delete from tb_afdeling where kd_afdeling='$kd_afdeling'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('Afdeling');
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('Afdeling');
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
					redirect('Afdeling');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Afdeling');
			}else{
				$data=array(
					// "kd_kabupaten"=>$_POST['id'],
					"afdeling"=>$_POST['nama']	
				);
				$this->db->where('kd_afdeling', $_POST['id']);
				$this->db->update('tb_afdeling',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Afdeling');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('Afdeling');
			}else{
				$data=array(
					// "kd_kabupaten"=>$_POST['id'],
					"afdeling"=>$_POST['nama']
				);
				$this->db->where('kd_afdeling', $_POST['id']);
				$this->db->update('tb_afdeling',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Afdeling');
			}     
		}


		
	}

}	