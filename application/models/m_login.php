<?php
class M_login extends CI_Model{
	function cek($data){		
		return $this->db->get_where('users',$data)->num_rows();
		
	}
	function data($data){
		return $this->db->get_where('users',$data)->result();
		$cek = $this->m_login->cek($data);
		$data = $this->m_login->data($data);
		if($cek > 0){
		    $session = array(
		        'id' => $data[0]->id,
		        'nama' => $data[0]->username,
		        'status' => 'login'
		    );
		    $this->session->set_userdata($session);
		    redirect('admin/index');
		}else{
		    redirect('login/index/gagal');
		}
	}
}
