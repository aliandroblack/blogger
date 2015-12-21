<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
		if($this->session->userdata('status') != "login"){
			redirect('blogger');
		}
	}
	function index(){
		$this->load->view('admin/header');
		$this->load->view('admin/v_home');
		$this->load->view('admin/footer');
	}
	function kategori(){
	    $data['kategori'] = $this->m_admin->kategori();
	    $this->load->view('admin/header');
	    $this->load->view('admin/v_kategori',$data);
	    $this->load->view('admin/footer');
	}
	function tambah_kategori(){
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('kategori','kategori','required');
	    $this->form_validation->set_message('kategori','Kategori harus di isi');
	    if($this->form_validation->run()=="true"){
	        $data = array(
	            'kategori' => $this->input->post('kategori')
	        );
	        $this->m_admin->tambah_kategori($data);
	        redirect('admin/kategori/ditambah');
	    }else{
	        $data['kategori'] = $this->m_admin->kategori();
	        $this->load->view('admin/header');
	        $this->load->view('admin/v_kategori',$data);
	        $this->load->view('admin/footer');
	    }
	}
	function edit_kategori($id){
	    $data['kategori'] = $this->m_admin->kategori();
	    $data['edit_kategori'] = $this->m_admin->edit_kategori($id);
	    $this->load->view('admin/header');
	    $this->load->view('admin/v_kategori_edit',$data);
	    $this->load->view('admin/footer');
	}
	function update_kategori(){
	    $data = array(
	        'kategori' => $this->input->post('kategori')
	    );
	    $id = $this->input->post('id');
	    $this->m_admin->update_kategori($id,$data);
	    redirect('admin/kategori/diupdate');
	}
	function hapus_kategori($id){
	    $this->m_admin->hapus_kategori($id);
	    redirect('admin/kategori/dihapus');
	}

	function artikel(){
	    $data['artikel'] = $this->m_admin->artikel();
	    $this->load->view('admin/header');
	    $this->load->view('admin/v_artikel',$data);
	    $this->load->view('admin/footer');
	}
	function tulis_artikel(){
	    $this->load->library('form_validation');
	    $data['kategori'] = $this->m_admin->kategori();
	    $this->load->view('admin/header');
	    $this->load->view('admin/v_artikel_baru',$data);
	    $this->load->view('admin/footer');
	}
	function artikel_act(){
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('judul','judul','required');
	    $this->form_validation->set_rules('isi','isi','required');
	    $this->form_validation->set_rules('kategori','kategori','required');
	    if($this->form_validation->run() != true ){
	        $data['kategori'] = $this->m_admin->kategori();
	        $this->load->view('admin/header');
	        $this->load->view('admin/v_artikel_baru',$data);
	        $this->load->view('admin/footer');
	    }else{
	        $judul = $this->input->post('judul');
	        $isi = $this->input->post('isi');
	        $kategori = $this->input->post('kategori');
	        $config['upload_path'] = './images/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('foto');
	        $data = array('upload_data' => $this->upload->data());
	        $d = array(
	            'judul' => $judul,
	            'isi_artikel' => $isi,
	            'kategori' => $kategori,
	            'tanggal' => date('Y-m-d'),
	            'author' => $this->session->userdata('id'),
	            'foto' => $data['upload_data']['file_name']
	        );
	        $this->m_admin->artikel_act($d);
	        redirect('admin/artikel/oke','refresh');
	    }
	}
	function edit_artikel($id){
	    $this->load->library('form_validation');
	    $data['artikel'] = $this->m_admin->edit_artikel($id);
	    $data['kategori'] = $this->m_admin->kategori();
	    $this->load->view('admin/header');
	    $this->load->view('admin/v_artikel_edit',$data);
	    $this->load->view('admin/footer');
	}
	function update_artikel(){
	    $this->load->library('form_validation');
	    $id = $this->input->post('id');
	    $this->form_validation->set_rules('judul','judul','required');
	    $this->form_validation->set_rules('isi','isi','required');
	    $this->form_validation->set_rules('kategori','kategori','required');
	    if($this->form_validation->run() != true ){
	        $data['artikel'] = $this->m_admin->edit_artikel($id);
	        $data['kategori'] = $this->m_admin->kategori();
	        $this->load->view('admin/header');
	        $this->load->view('admin/v_artikel_edit',$data);
	        $this->load->view('admin/footer');
	    }else{
	        $judul = $this->input->post('judul');
	        $isi = $this->input->post('isi');
	        $kategori = $this->input->post('kategori');
	        if($_FILES['foto']['name'] == ""){
	            $d = array(
	                'judul' => $judul,
	                'isi_artikel' => $isi,
	                'kategori' => $kategori
	            );
	            $this->m_admin->update_artikel($d,$id);
	            redirect('admin/artikel/diupdate','refresh');
	        }else{
	            $config['upload_path'] = './images/';
	            $config['allowed_types'] = 'gif|jpg|png';
	            $this->load->library('upload', $config);
	            $this->upload->do_upload('foto');
	            $data = array('upload_data' => $this->upload->data());
	            $d = array(
	                'judul' => $judul,
	                'isi_artikel' => $isi,
	                'kategori' => $kategori,
	                'foto' => $data['upload_data']['file_name']
	            );
	            $this->m_admin->update_artikel($d,$id);
	            redirect('admin/artikel/diupdate','refresh');
	        }
	    }
	}
	function hapus_artikel($id){
	    $this->m_admin->hapus_artikel($id);
	    redirect('admin/artikel/dihapus','refresh');
	}

	function pengaturan(){
	    $data['pengaturan'] = $this->m_admin->pengaturan();
	    $this->load->view('admin/header');
	    $this->load->view('admin/v_pengaturan',$data);
	    $this->load->view('admin/footer');
	}
	
	function update_pengaturan(){
	    $judul = $this->input->post('judul');
	    $deskripsi = $this->input->post('deskripsi');
	    if($_FILES['logo']['name'] == ""){
	        $data = array(
	            'judul_web' => $judul,
	            'desk_web' => $deskripsi
	        );
	        $this->m_admin->update_pengaturan($data);
	        redirect('admin/pengaturan/sukses','refresh');
	    }else{
	        $config['upload_path'] = './icon/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('logo');
	        $data = array('upload_data' => $this->upload->data());
	        $d = array(
	            'judul_web' => $judul,
	            'desk_web' => $deskripsi,
	            'logo_web' => $data['upload_data']['file_name']
	        );
	        $this->m_admin->update_pengaturan($d);
	        redirect('admin/pengaturan/sukses','refresh');
	    }
	}
	
}