<?php 
function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Jakarta');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ H:i:s');
}
function in_access()
{
    $ci=& get_instance();
    if($ci->session->userdata('user')){
        redirect('welcome');
    }
}
function no_access()
{
    $ci=& get_instance();
    if(!$ci->session->userdata('user')){
        redirect('login');
    }
}
function menuaktif($aktif,$menu){	
	if($aktif==$menu){
		return "active";
	}else{
		return "";
	}
}
function gethead(){ 
    $CI =& get_instance();
    if($CI->session->userdata('level')==1){
        return "head.php";
    }else{
        return "head.php";
    }
}
function getmenu(){	
    $CI =& get_instance();
	if($CI->session->userdata('level')==1){
        return "menuadmin.php";
    }else{
        return "menuadmin1.php";
    }
}
function getkd($kd_manager)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_manager.") as kd_max from tb_manager");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
function getkd1($kd_skk)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_skk.") as kd_max from tb_skk");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
function getkd2($kd_skw)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_skw.") as kd_max from tb_skw");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
function getkd3($kd_plpg)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_plpg.") as kd_max from tb_plpg");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
function getkd4($kd_mandor)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_mandor.") as kd_max from tb_mandor");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
function getkb($kd_kabupaten)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_kabupaten.") as kd_max from tb_kabupaten");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
function getkc($kd_kecamatan)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_kecamatan.") as kd_max from tb_kecamatan");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
function getkdkebun($kd_kebun)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_kebun.") as kd_max from tb_kebun");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
function getkt($kd_kategori)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_kategori.") as kd_max from tb_kategori");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
function getpeng($kd_pengamatan)
{
    $ci=& get_instance();
    $q = $ci->db->query("select(".$kd_pengamatan.") as kd_max from tb_pengamatan");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = ($tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}
// function gettanggal()
// {
//     date("Y-m-d H:i:s");
// }


function getnama($kd_admin)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_admin where kd_admin='$kd_admin'")->row_array();
    return $q['nama'];
}

function getemail($kd_admin)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_admin where kd_admin='$kd_admin'")->row_array();
    return $q['email'];
}

function gettelepon($kd_admin)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_admin where kd_admin='$kd_admin'")->row_array();
    return $q['no_telp'];
}

function getusername($kd_admin)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_admin where kd_admin='$kd_admin'")->row_array();
    return $q['username'];
}

function getfoto($kd_admin)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_admin where kd_admin='$kd_admin'")->row_array();
    return $q['foto'];
}
function getfotom($kd_manager)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_manager where kd_manager='$kd_manager'")->row_array();
    return $q['foto_manager'];
}
function getfotoskk($kd_skk)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_skk where kd_skk='$kd_skk'")->row_array();
    return $q['foto_skk'];
}
function getfotoskw($kd_skw)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_skw where kd_skw='$kd_skw'")->row_array();
    return $q['foto_skw'];
}
function getfotoplpg($kd_plpg)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_plpg where kd_plpg='$kd_plpg'")->row_array();
    return $q['foto_plpg'];
}
function getfotomandor($kd_mandor)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_mandor where kd_mandor='$kd_mandor'")->row_array();
    return $q['foto_mandor'];
}
function getfotokebun($kd_kebun)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_kebun where kd_kebun='$kd_kebun'")->row_array();
    return $q['foto_kebun'];
}
function getkml($kd_kml)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_kml where kd_kml='$kd_kml'")->row_array();
    return $q['kml'];
}
function getmasa($kd_kml)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tb_kml where kd_kml='$kd_kml'")->row_array();
    return $q['ms_kml'];
}