<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Loader extends CI_Loader {
	
	public function template($template_name, $vars, $return = FALSE){
		$this->view('skin/header', $vars, $return);
		$this->view($template_name, $vars, $return);
		$this->view('skin/footer', $vars, $return);
	}
	
	public function template_admin($template_name, $vars, $sidebar = FALSE, $return = FALSE){
		$this->view('skin/header_admin', $vars, $return);
		if ($sidebar) $this->view('skin/sidebar', $vars);
		$this->view('admin/'.$template_name, $vars, $return);
		$this->view('skin/footer_admin', $vars, $return);
	}
	
	public function cek_sesi($enableRedirect = true){	
		if(isset($_SESSION['id'])){
			return true;
		}else{
			$url = explode("/", $_SERVER['REQUEST_URI'], 2);
			if ($enableRedirect)
				header("Location:".site_url('Autentikasi/index/?url='.urlencode($url[1])));
		}
		return false;
	}
}