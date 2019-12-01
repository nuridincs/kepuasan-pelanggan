<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisioner extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('MKuisioner');
	}

	public function index(){
		$data['pageTitle'] = "PT MAKANAN UTAMA MANAJEMEN | Responden Kuisioner Kepuasan Pelanggan";
		if ($this->form_validation->run() == FALSE){
			
		}else{
			// $this->load->model('MKuisioner');
			$this->MKuisioner->setDataResponden();
			header("Location:".base_url("form"));
		}
		$this->load->template("form_awal", $data);
	}
	
	public function form() {
		// $responden = $this->session->flashdata();
		$responden = $this->input->post();
		if(empty($responden)){
			header("Location:".base_url(""));
		}else{
			$data['responden'] = $responden;
			$data['pageTitle'] = "PT MAKANAN UTAMA MANAJEMEN | Kuisioner Kepuasan Pelanggan";
			if ($this->form_validation->run() == FALSE){
				
			}else{
				// $this->load->model('MKuisioner');
				$data['error'] = $this->MKuisioner->setDataKuisioner();
				if(empty($data['error']))
					header("Location:".base_url("kuisioner/sukses_page"));
			}
			
			// $this->load->template("form_kuisioner", $data);
			$this->formKuisioner($data);
		}
	}

	public function formSubmit() {
		$responden = $this->input->post();

				
		if(empty($responden)){
			header("Location:".base_url(""));
		}else{
			$data['responden'] = $responden;
			$data['pageTitle'] = "PT MAKANAN UTAMA MANAJEMEN | Kuisioner Kepuasan Pelanggan";
	
			$data['success'] = $this->MKuisioner->execute('insert', 'skala', $responden);
			if(empty($data['success']))
				header("Location:".base_url("kuisioner/sukses_page"));
		}
	}
	
	public function sukses_page(){
		$data['pageTitle'] = "PT MAKANAN UTAMA MANAJEMEN | Kuisioner Kepuasan Pelanggan";
		$this->load->template("notif_sukses", $data);
	}

	public function formKuisioner($dataResponden) {
		$data = $this->MKuisioner->getData('kuisioner');
		$pernyataan = $this->MKuisioner->getData('pernyataan');

		$tmpPernyataan = [];
		foreach ($pernyataan as $value) {
			$tmpPernyataan[] = $value->pernyataan."~".$value->skor;
		}

		$dataKuisioner = [];
		$no = 0;
		$noSkala = 111;
		foreach ($data as $kuisioner) {
			$no++;
			$noSkala++;
			$dataKuisioner[] = array(
				'kuisioner' => $kuisioner->pertanyaan,
				'pernyataan' => array(
					'id_pernyataan' => $no,
					'id_skala' => $noSkala,
					'pernyataan' => $tmpPernyataan,
				)
			);
		}

		$dataTmp['dataKuisioner'] = $dataKuisioner;
		$dataTmp['dataResponden'] = $dataResponden;
		$this->load->template("form_kuisioner_new", $dataTmp);
	}
}