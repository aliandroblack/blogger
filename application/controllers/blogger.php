<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogger extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_admin');
       
    }
	public function index()
	{
		$data['pengaturan'] = $this->m_admin->pengaturan();
		$data['kategori'] = $this->m_admin->kategori();
		$data['artikel'] = $this->m_admin->artikel();
		$data['guestbook']=$this->m_admin->guestbook();
		$this->load->view('header',$data);
		$this->load->view('v_blog',$data);		
		$this->load->view('footer',$data);		
	}
	public function login(){
	    $this->load->view('v_login');
	}
	function single($id)
	{
	    $data['pengaturan'] = $this->m_admin->pengaturan();
	    $data['kategori'] = $this->m_admin->kategori();
	    $data['artikel'] = $this->m_admin->artikel();
	    $data['single'] = $this->m_admin->single($id);	    
	    $this->load->view('header',$data);
	    $this->load->view('v_single',$data);
	    $this->load->view('footer',$data);
	}
	
	function kategori($id){
	    $data['pengaturan'] = $this->m_admin->pengaturan();
	    $data['kategori'] = $this->m_admin->kategori();
	    $data['artikel'] = $this->m_admin->artikel_kategori($id);
	    $this->load->view('header',$data);
	    $this->load->view('v_blog', $data);
	    $this->load->view('footer',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */