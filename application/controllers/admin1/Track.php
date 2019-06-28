<?php

class Track extends CI_Controller {
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
			"title"=>'Tracking',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"all"=>$this->db->get('tb_kml')->result(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"kb"=>$this->db->get('tb_kebun')->result(),
			"v"=>$this->db->get('v_kebun')->result(),
			"aktif"=>"track",
			"content"=>"admin1/track/index.php",
		);

		$this->breadcrumb->append_crumb('<i class="glyphicon glyphicon-map-marker"></i> Kebun / <i class="icon-road"></i> Peta Kebun', site_url('track'));
		$this->load->view('admin/template',$data);
	}

	public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('ms', 'ms', 'required');
		$this->form_validation->set_rules('kml', 'kml', 'required');
		
		/* Upload FOto */
		// $this->load->helper(array('form', 'url'));
		// $config['upload_path']          = './uploads/';
  //               $config['allowed_types']        = 'gif|jpg|png';
  //               // $config['max_size']             = 100;
  //               // $config['max_width']            = 1024;
  //               // $config['max_height']           = 768;

  //               $this->load->library('upload', $config);

  //               if ( ! $this->upload->do_upload('foto'))
  //               {
                       
		// 			$this->session->set_flashdata('error', $this->upload->display_errors());
		// 			redirect('Track');
  //               }
               
		/*end upload foto*/


		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('Track');
		}else{
			$data=array(
				// "kd_manager"=>$_POST['id'],
				"ms_kml"=>$_POST['ms'],
				"kml"=>$_POST['kml']
			);
			$this->db->insert('tb_kml',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Track');
		}
	}

	public function delete($kd_kml)
	{
		// $foto=getfotom($kd_manager);
		// $getrow=$this->db->query("select * from tb_manager where kd_manager='$kd_manager'")->row_array();
		// $this->db->where('kd_manager', $kd_manager);
		// $this->db->delete('tb_manager');
		// unlink("uploads/".$getrow['foto_manager']);
		$this->db->query("delete from tb_kml where kd_kml='$kd_kml'");
		$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		redirect('Track');

		// $getrow=$this->db->query("select count(*) as 'c' from tb_kebun where kd_manager='$kd_manager'")->row();
		// if ($getrow->c < 1) {
		// 	$foto=getfotom($kd_manager);
		// 	$getfoto=$this->db->query("select * from tb_manager where kd_manager='$kd_manager'")->row_array();
		// 	$this->db->where('kd_manager', $kd_manager);
		// 	$this->db->delete('tb_manager');
		// 	unlink("uploads/".$getfoto['foto_manager']);
		// 	$this->db->query("delete from tb_manager where kd_manager='$kd_manager'");
		// 	$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// 	redirect('Track');		
		// } else {
		// 	$this->session->set_flashdata('error', "Data Gagal Dihapus");
		// 	redirect('Track');	
		// }

	}

	public function lihat($kd_kml)
	{
		$data=array(
			"title"=>'Peta Kebun',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"all"=>$this->db->where('kd_kml',$kd_kml)->get('tb_kml')->result(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"v"=>$this->db->get('v_kebun')->result(),
			"aktif"=>"track",
			"kd_kml"=>$kd_kml,
			"content"=>"track/index1.php",
		);

		$this->breadcrumb->append_crumb('<i class="glyphicon glyphicon-map-marker"></i> Kebun / <i class="icon-road"></i> Peta Kebun / '.getmasa($kd_kml). '' , site_url('Track1'));
		$this->load->view('admin/template',$data);
	}

	


	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('ms', 'ms', 'required');
		$this->form_validation->set_rules('kml', 'kml', 'required');

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
					redirect('Track');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Track');
			}else{
				$data=array(
					"ms_kml"=>$_POST['ms'],
					"kml"=>$_POST['kml']
				);
				$this->db->where('kd_kml', $_POST['id']);
				$this->db->update('tb_kml',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Track');
			}               
		} else  {
			if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('Track');
			}else{
				$data=array(
					"ms_kml"=>$_POST['ms'],
					"kml"=>$_POST['kml']
				);
				$this->db->where('kd_kml', $_POST['id']);
				$this->db->update('tb_kml',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Track');
			}     
		}
		
	}
	
}
