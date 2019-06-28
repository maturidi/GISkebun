<?php

class Log extends CI_Controller {
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
			"title"=>'Log',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_pengamatan')->result(),
			"kbn"=>$this->db->get('tb_kebun')->result(),
			"v"=>$this->db->get('v_pengamatan')->result(),
			"aktif"=>"log",
			"content"=>"log/index.php",
		);
		$this->breadcrumb->append_crumb('<i class="glyphicon glyphicon-dashboard"></i> Aktivitas / <i class="icon-book"></i> Pengamatan', site_url('log'));
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('jbatang', 'jbatang', 'required');
		$this->form_validation->set_rules('bbatang', 'bbatang', 'required');
		$this->form_validation->set_rules('jbatangha', 'jbatangha', 'required');
		$this->form_validation->set_rules('dbatang', 'dbatang', 'required');
		$this->form_validation->set_rules('jruas', 'jruas', 'required');
		$this->form_validation->set_rules('tbatang', 'tbatang', 'required');
		$this->form_validation->set_rules('brix', 'brix', 'required');
		$this->form_validation->set_rules('catatan', 'catatan', 'required');
		$this->form_validation->set_rules('kdkebun', 'kdkebun', 'required');
		/* Upload FOto */
		


		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('Log');
		}else{
			$data=array(
				// "kd_pengamatan"=>$_POST['id'],
				"tanggal"=>$_POST['tanggal'],
				"jml_batang"=>$_POST['jbatang'],
				"berat_batang"=>$_POST['bbatang'],
				"jml_batang_ha"=>$_POST['jbatangha'],
				"d_batang"=>$_POST['dbatang'],
				"jml_ruas"=>$_POST['jruas'],
				"t_batang"=>$_POST['tbatang'],
				"brix"=>$_POST['brix'],
				"catatan"=>$_POST['catatan'],
				"kd_kebun"=>$_POST['kdkebun']
			);
			$this->db->insert('tb_pengamatan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Log');
		}
	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('jbatang', 'jbatang', 'required');
		$this->form_validation->set_rules('bbatang', 'bbatang', 'required');
		$this->form_validation->set_rules('jbatangha', 'jbatangha', 'required');
		$this->form_validation->set_rules('dbatang', 'dbatang', 'required');
		$this->form_validation->set_rules('jruas', 'jruas', 'required');
		$this->form_validation->set_rules('tbatang', 'tbatang', 'required');
		$this->form_validation->set_rules('brix', 'brix', 'required');
		$this->form_validation->set_rules('catatan', 'catatan', 'required');
		$this->form_validation->set_rules('kdkebun', 'kdkebun', 'required');

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
					redirect('Log');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Log');
			}else{
				$data=array(
					
					"tanggal"=>$_POST['tanggal'],
					"jml_batang"=>$_POST['jbatang'],
					"berat_batang"=>$_POST['bbatang'],
					"jml_batang_ha"=>$_POST['jbatangha'],
					"d_batang"=>$_POST['dbatang'],
					"jml_ruas"=>$_POST['jruas'],
					"t_batang"=>$_POST['tbatang'],
					"brix"=>$_POST['brix'],
					"catatan"=>$_POST['catatan'],
					"kd_kebun"=>$_POST['kdkebun']
				);
				$this->db->where('kd_pengamatan', $_POST['id']);
				$this->db->update('tb_pengamatan',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Log');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('Log');
			}else{
				$data=array(
					"tanggal"=>$_POST['tanggal'],
					"jml_batang"=>$_POST['jbatang'],
					"berat_batang"=>$_POST['bbatang'],
					"jml_batang_ha"=>$_POST['jbatangha'],
					"d_batang"=>$_POST['dbatang'],
					"jml_ruas"=>$_POST['jruas'],
					"t_batang"=>$_POST['tbatang'],
					"brix"=>$_POST['brix'],
					"catatan"=>$_POST['catatan'],
					"kd_kebun"=>$_POST['kdkebun']				
				);
				$this->db->where('kd_pengamatan', $_POST['id']);
				$this->db->update('tb_pengamatan',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Log');
			}     
		}	
	}
	public function delete($kd_pengamatan)
	{
		
		$getrow=$this->db->query("select * from tb_pengamatan where kd_pengamatan='$kd_pengamatan'")->row_array();
		$this->db->where('kd_pengamatan', $kd_pengamatan);
		$this->db->delete('tb_pengamatan');
		
		$this->db->query("delete from tb_pengamatan where kd_pengamatan='$kd_pengamatan'");
		$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		redirect('Log');



		// $this->db->query("DELETE FROM profile where id='$id'");
		// $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		// redirect('User');
	}
}	