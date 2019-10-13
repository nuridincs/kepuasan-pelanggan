<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller{
	public function index(){
		if($this->load->cek_sesi(false)){
			$this->output->set_header("Location: ".site_url("/administrasi"));
			return;
		}
		if($this->input->get('url') !== null)
			$data['location'] = htmlspecialchars($this->input->get('url'));
		$data['useSimple'] = true;
		$data['pageTitle'] = "PT MAKANAN UTAMA MANAJEMEN | Halaman Login PT MAKANAN UTAMA MANAJEMEN";
		$this->load->template_admin("form_login", $data);
	}
	
	public function login(){
		if($this->load->cek_sesi(false)){
			$this->output->set_header("Location: ".site_url("/administrasi"));
			return;
		}
		$data['pageTitle'] = "PT MAKANAN UTAMA MANAJEMEN | Halaman Login PT MAKANAN UTAMA MANAJEMEN";
		$data['useSimple'] = true;
		if($this->input->post('location') !== null)
			$data['location'] = $this->input->post('location');
	
		if ($this->form_validation->run() == FALSE){
			
		}else{
			$this->load->model("admin");
			$data['errors'] = $this->admin->adminLogin();
			if (empty($data['errors']) && $this->input->post('location') == "")
				header("Location:".site_url("administrasi/dashboard"));
			if (empty($data['errors']) && $this->input->post('location') != "")
				header("Location:".base_url($this->input->post('location')));
		}
		$this->load->template_admin("form_login", $data);
	}
	
	public function ubah_password(){
		if(!$this->load->cek_sesi()) exit;
	
		$this->load->library('encryption');
		$data['id'] = $this->encryption->encrypt($this->session->id);
		$data['pageTitle'] = "Ubah Password";
		if ($this->form_validation->run() == FALSE){
				
		}else {
			$this->load->model('admin');
			$data['errors'] = $this->admin->changePassword();
			if (empty($data['errors']))
				$data['submitSukses'] = "Password berhasil diubah";
		}
		$this->load->template_admin("ubah_password", $data, true);
	}
	
	public function ubah_email(){
		if(!$this->load->cek_sesi()) exit;
	
		$this->load->library('encryption');
		$data['id'] = $this->encryption->encrypt($this->session->id);
		$data['pageTitle'] = "Ubah Email";
		if ($this->form_validation->run() == FALSE){
	
		}else {
			$this->load->model('admin');
			$data['errors'] = $this->admin->changeEmail();
			if (empty($data['errors']))
				$data['submitSukses'] = "Email berhasil diubah";
		}
		$this->load->template_admin("ubah_email", $data, true);
	}
	
	public function reset_password(){
		if(!$this->load->cek_sesi()) exit;
	
		$this->load->model('admin');
		$data['admin'] = $this->admin->getAdminJurusan();
		$data['pageTitle'] = "Reset Password";
		$data['activePage'] = "reset";
		if ($this->form_validation->run() == FALSE){
	
		}else {
			$data['errors'] = $this->admin->resetPassword();
			if (empty($data['errors']))
				$data['submitSukses'] = "Password berhasil diubah";
		}
		$this->load->template_admin("reset_password", $data, true);
	}
	
	public function logout(){
		$this->load->model('admin');
		$this->admin->adminLogout();
		$this->output->set_header("Location: ".site_url("/autentikasi"));
	}
}