<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
 
	}
	function index(){
		$this->load->view('v_login');
	}
	function cek(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','password','trim|required|md5');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$data = array(
			'username' => $username,
			'password' => $password
			);
		if($this->form_validation->run() == true){
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
		}else{
			redirect('login/index/gagal');
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('blogger');
	}
}