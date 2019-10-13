<?php
class Ajax extends CI_Controller{
	private $strUnAuthorized = "Akses tidak diperbolehkan.";

	private function _generate_json_error($message) {
		return json_encode(array(
				"status" => "error",
				"message" => "Not authenticated."
		));
	}

	private function _check_session() {
		if(!$this->load->cek_sesi(false)) {
			echo $this->_generate_json_error($strUnAuthorized);
			return false;
		}
		return true;
	}
	public function index(){
		echo $this->_generate_json_error("Unrecognized action.");
	}
	
	public function grafik_kuisioner(){
		if (!$this->_check_session()) exit;
		
		$labels = array();
		$data = array();
		$this->load->model('mkuisioner');
		$daftarPelayanan = $this->mkuisioner->getGraphData();
		
		foreach ($daftarPelayanan as $namaPelayanan => $nilai){
			array_push($labels, $namaPelayanan);
			array_push($data, $nilai);
		}
		
		echo json_encode(array(
				'labels' => $labels,
				'datasets' => array(
						array(
								'label' => 'Data Kuisioner',
								'fillColor' => "rgba(220,220,220,0.5)",
								'strokeColor' => "rgba(151,187,205,0.8)",
								'highlightFill' => "rgba(151,187,205,0.75)",
								'highlightStroke' => "rgba(151,187,205,1)",
								'data' => $data
						)
				)
		));
	}
}