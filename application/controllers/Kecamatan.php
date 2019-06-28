<?php

class Kecamatan extends CI_Controller {
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
			"title"=>'Kecamatan',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_kecamatan')->result(),
			"kb"=>$this->db->get('tb_kabupaten')->result(),
			"v"=>$this->db->get('v_kecamatan')->result(),			
			"aktif"=>"kecamatan",
			"content"=>"kota/kecamatan.php",
		);
		$this->breadcrumb->append_crumb('<i class="glyphicon glyphicon-book"></i> Data Master / <i class="glyphicon glyphicon-align-right"></i> Kecamatan', site_url('kecamatan'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('kb', 'kb', 'required');

		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('Kecamatan');
		}else{
			$data=array(
				// "kd_kecamatan"=>$_POST['id'],
				"nama_kecamatan"=>$_POST['nama'],
				"kd_kabupaten"=>$_POST['kb']

			);
			$this->db->insert('tb_kecamatan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Kecamatan');
		}
	}
	public function delete($kd_kecamatan)
	{

		$getrow=$this->db->query("select count(*) as 'c' from tb_kebun where kd_kecamatan='$kd_kecamatan'")->row();
		if ($getrow->c < 1) {
			$this->db->where('kd_kecamatan', $kd_kecamatan);
			$this->db->delete('tb_kecamatan');
			$this->db->query("delete from tb_kecamatan where kd_kecamatan='$kd_kecamatan'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('Kecamatan');
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('Kecamatan');
		}

		// $this->db->query("DELETE FROM profile where id='$id'");
		// $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		// redirect('User');
	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('kb', 'kb', 'required');

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
					redirect('Kecamatan');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Kecamatan');
			}else{
				$data=array(
					// "kd_kecamatan"=>$_POST['id'],
					"nama_kecamatan"=>$_POST['nama'],
					"kd_kabupaten"=>$_POST['kb']
				);
				$this->db->where('kd_kecamatan', $_POST['id']);
				$this->db->update('tb_Kecamatan',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Kecamatan');
			}               
		}else{
			if($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('User2');
			}else{
				$data=array(
					// "kd_kecamatan"=>$_POST['id'],
					"nama_kecamatan"=>$_POST['nama'],
					"kd_kabupaten"=>$_POST['kb']
				);
				$this->db->where('kd_kecamatan', $_POST['id']);
				$this->db->update('tb_kecamatan',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Kecamatan');
			}     
		}


	}
}	