<?php

class Activity extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_Activity');
		$this->load->helper('form');
		no_access();

	}
	public function index()
	{
		$data=array(
			"title"=>'Activity',
			"head"=>gethead(),
			"menu"=>getmenu(),
			"admin"=>$this->db->get('tb_admin')->result(),
			"all"=>$this->db->get('tb_kebun')->result(),
			"ktgr"=>$this->db->get('tb_kategori')->result(),
			"kc"=>$this->db->get('tb_kecamatan')->result(),
			"md"=>$this->db->get('tb_mandor')->result(),
			"pl"=>$this->db->get('tb_plpg')->result(),
			"mng"=>$this->db->get('tb_manager')->result(),
			"afd"=>$this->db->get('tb_afdeling')->result(),
			"ryn"=>$this->db->get('tb_rayon')->result(),
			"v"=>$this->db->get('v_kebun')->result(),			

			"aktif"=>"activity",
			"content"=>"activity/index.php",
		);
		$this->breadcrumb->append_crumb('<i class="glyphicon glyphicon-map-marker"></i> Kebun / <i class="glyphicon glyphicon-flag"></i> Data Kebun', site_url('activity'));
		$this->load->view('admin/template',$data);
	}

		public function add()
	{
		// $this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
		$this->form_validation->set_rules('mandor', 'mandor', 'required');
		$this->form_validation->set_rules('plpg', 'plpg', 'required');
		$this->form_validation->set_rules('manager', 'manager', 'required');
		$this->form_validation->set_rules('afdeling', 'afdeling', 'required');
		$this->form_validation->set_rules('rayon', 'rayon', 'required');
		

		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('register', 'register', 'required');
		$this->form_validation->set_rules('luas', 'luas', 'required');
		$this->form_validation->set_rules('mt', 'mt', 'required');
		$this->form_validation->set_rules('varietas', 'varietas', 'required');
		$this->form_validation->set_rules('ipl', 'ipl', 'required');
		$this->form_validation->set_rules('bdalam', 'bdalam', 'required');
		$this->form_validation->set_rules('bluar', 'bluar', 'required');
		$this->form_validation->set_rules('b15', 'b15', 'required');
		$this->form_validation->set_rules('rakrp', 'rakrp', 'required');
		$this->form_validation->set_rules('rakkuha', 'rakkuha', 'required');
		$this->form_validation->set_rules('rakku', 'rakku', 'required');
		$this->form_validation->set_rules('tdeskuha', 'tdeskuha', 'required');
		$this->form_validation->set_rules('tdesku', 'tdesku', 'required');
		$this->form_validation->set_rules('ptdesrak', 'ptdesrak', 'required');
		$this->form_validation->set_rules('pbirak', 'pbirak', 'required');
		$this->form_validation->set_rules('tmarkuha', 'tmarkuha', 'required');
		$this->form_validation->set_rules('tmarku', 'tmarku', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');
		$this->form_validation->set_rules('longitude', 'longitude', 'required');

		// /* Upload FOto */
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
					redirect('Activity');
                }
               
		// /*end upload foto*/


		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan".validation_errors());
			redirect('Activity');
		}else{
			$data=array(
				// "kd_kebun"=>$_POST['id'],
				"kd_kategori"=>$_POST['kategori'],
				"kd_kecamatan"=>$_POST['kecamatan'],
				"kd_mandor"=>$_POST['mandor'],
				"kd_plpg"=>$_POST['plpg'],
				"kd_manager"=>$_POST['manager'],
				"kd_afdeling"=>$_POST['afdeling'],
				"kd_rayon"=>$_POST['rayon'],
				

				"nama_kebun"=>$_POST['nama'],
				"register"=>$_POST['register'],
				"luas"=>$_POST['luas'],
				"mt"=>$_POST['mt'],
				"varietas"=>$_POST['varietas'],
				"ipl"=>$_POST['ipl'],
				"b_dalam"=>$_POST['bdalam'],
				"b_luar"=>$_POST['bluar'],
				"b_15F_Rp"=>$_POST['b15'],
				"rak_Rp"=>$_POST['rakrp'],
				"rak_ku_ha"=>$_POST['rakkuha'],
				"rak_ku"=>$_POST['rakku'],
				"tdes_ku_ha"=>$_POST['tdeskuha'],
				"tdes_ku"=>$_POST['tdesku'],
				"p_tdes_rak"=>$_POST['ptdesrak'],
				"p_bi_rak"=>$_POST['pbirak'],
				"tmar_ku_ha"=>$_POST['tmarkuha'],
				"tmar_ku"=>$_POST['tmarku'],
				"latitude"=>$_POST['latitude'],
				"longitude"=>$_POST['longitude'],
				"foto_kebun"=>$this->upload->data('file_name')

			);
			$this->db->insert('tb_kebun',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Activity');
		}
	}
	public function delete($kd_kebun)
	{
		// $foto=getfotoskw($kd_kebun);
		// $getrow=$this->db->query("select * from tb_kebun where kd_kebun='$kd_kebun'")->row_array();
		// $this->db->where('kd_kebun', $kd_kebun);
		// $this->db->delete('tb_kebun');
		// unlink("uploads/".$getrow['foto_kebun']);
		// $this->db->query("delete from tb_kebun where kd_kebun='$kd_kebun'");
		// $this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
		// redirect('Activity');


		$getrow=$this->db->query("select count(*) as 'c' from tb_pengamatan where kd_kebun='$kd_kebun'")->row();
		if ($getrow->c < 1) {
			$foto=getfotoskw($kd_kebun);
			$getfoto=$this->db->query("select * from tb_kebun where kd_kebun='$kd_kebun'")->row_array();
			$this->db->where('kd_kebun', $kd_kebun);
			$this->db->delete('tb_kebun');
			unlink("uploads/".$getfoto['foto_kebun']);
			$this->db->query("delete from tb_kebun where kd_kebun='$kd_kebun'");
			$this->session->set_flashdata('sukses', "Data Berhasil Dihapus");
			redirect('Activity');
		} else {
			$this->session->set_flashdata('error', "Data Gagal Dihapus");
			redirect('Activity');
		}
		

	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
		$this->form_validation->set_rules('mandor', 'mandor', 'required');
		$this->form_validation->set_rules('plpg', 'plpg', 'required');
		$this->form_validation->set_rules('mandor', 'mandor', 'required');
		$this->form_validation->set_rules('manager', 'manager', 'required');
		$this->form_validation->set_rules('afdeling', 'afdeling', 'required');
		$this->form_validation->set_rules('rayon', 'rayon', 'required');

		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('register', 'register', 'required');
		$this->form_validation->set_rules('luas', 'luas', 'required');
		$this->form_validation->set_rules('mt', 'mt', 'required');
		$this->form_validation->set_rules('varietas', 'varietas', 'required');
		$this->form_validation->set_rules('ipl', 'ipl', 'required');
		$this->form_validation->set_rules('bdalam', 'bdalam', 'required');
		$this->form_validation->set_rules('bluar', 'bluar', 'required');
		$this->form_validation->set_rules('b15', 'b15', 'required');
		$this->form_validation->set_rules('rakrp', 'rakrp', 'required');
		$this->form_validation->set_rules('rakkuha', 'rakkuha', 'required');
		$this->form_validation->set_rules('rakku', 'rakku', 'required');
		$this->form_validation->set_rules('tdeskuha', 'tdeskuha', 'required');
		$this->form_validation->set_rules('tdesku', 'tdesku', 'required');
		$this->form_validation->set_rules('ptdesrak', 'ptdesrak', 'required');
		$this->form_validation->set_rules('pbirak', 'pbirak', 'required');
		$this->form_validation->set_rules('tmarkuha', 'tmarkuha', 'required');
		$this->form_validation->set_rules('tmarku', 'tmarku', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');
		$this->form_validation->set_rules('longitude', 'longitude', 'required');

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
					redirect('Activity');
                }

            if($this->form_validation->run()==FALSE){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit.".validation_errors());
				redirect('Activity');
			}else{
				$data=array(
					"kd_kategori"=>$_POST['kategori'],
					"kd_kecamatan"=>$_POST['kecamatan'],
					"kd_mandor"=>$_POST['mandor'],
					"kd_plpg"=>$_POST['plpg'],
					"kd_manager"=>$_POST['manager'],
					"kd_afdeling"=>$_POST['afdeling'],
					"kd_rayon"=>$_POST['rayon'],
					
					"nama_kebun"=>$_POST['nama'],
					"register"=>$_POST['register'],
					"luas"=>$_POST['luas'],
					"mt"=>$_POST['mt'],
					"varietas"=>$_POST['varietas'],
					"ipl"=>$_POST['ipl'],
					"b_dalam"=>$_POST['bdalam'],
					"b_luar"=>$_POST['bluar'],
					"b_15F_Rp"=>$_POST['b15'],
					"rak_Rp"=>$_POST['rakrp'],
					"rak_ku_ha"=>$_POST['rakkuha'],
					"rak_ku"=>$_POST['rakku'],
					"tdes_ku_ha"=>$_POST['tdeskuha'],
					"tdes_ku"=>$_POST['tdesku'],
					"p_tdes_rak"=>$_POST['ptdesrak'],
					"p_bi_rak"=>$_POST['pbirak'],
					"tmar_ku_ha"=>$_POST['tmarkuha'],
					"tmar_ku"=>$_POST['tmarku'],
					"latitude"=>$_POST['latitude'],
					"longitude"=>$_POST['longitude'],
					"foto_kebun"=>$this->upload->data('file_name')
				);
				$this->db->where('kd_kebun', $_POST['id']);
				$this->db->update('tb_kebun',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Activity');
			}               
		}else{
			if($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('error',"Data Anda Gagal Di Edit..".validation_errors());
				redirect('Activity');
			}else{
				$data=array(
					"kd_kategori"=>$_POST['kategori'],
					"kd_kecamatan"=>$_POST['kecamatan'],
					"kd_mandor"=>$_POST['mandor'],
					"kd_plpg"=>$_POST['plpg'],
					"kd_manager"=>$_POST['manager'],
					"kd_afdeling"=>$_POST['afdeling'],
					"kd_rayon"=>$_POST['rayon'],
					
					"nama_kebun"=>$_POST['nama'],
					"register"=>$_POST['register'],
					"luas"=>$_POST['luas'],
					"mt"=>$_POST['mt'],
					"varietas"=>$_POST['varietas'],
					"ipl"=>$_POST['ipl'],
					"b_dalam"=>$_POST['bdalam'],
					"b_luar"=>$_POST['bluar'],
					"b_15F_Rp"=>$_POST['b15'],
					"rak_Rp"=>$_POST['rakrp'],
					"rak_ku_ha"=>$_POST['rakkuha'],
					"rak_ku"=>$_POST['rakku'],
					"tdes_ku_ha"=>$_POST['tdeskuha'],
					"tdes_ku"=>$_POST['tdesku'],
					"p_tdes_rak"=>$_POST['ptdesrak'],
					"p_bi_rak"=>$_POST['pbirak'],
					"tmar_ku_ha"=>$_POST['tmarkuha'],
					"tmar_ku"=>$_POST['tmarku'],
					"latitude"=>$_POST['latitude'],
					"longitude"=>$_POST['longitude']

				);
				$this->db->where('kd_kebun', $_POST['id']);
				$this->db->update('tb_kebun',$data);
				$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
				redirect('Activity');
			}     
		}
	}

}
