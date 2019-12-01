<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('MKuisioner');

        if(!$this->load->cek_sesi()) exit;
    }

	public function index(){
		if(!$this->load->cek_sesi()) exit;
		
		$this->dashboard();
	}
	
	public function dashboard(){
		if(!$this->load->cek_sesi()) exit;
	
		$data['pageTitle'] = "Dashboard Administrator";
		$data['activePage'] = "dashboard";
		
        $this->home();
	}
	
	public function lihat_respon(){
		if(!$this->load->cek_sesi()) exit;
	
		$data['listRespon'] = $this->mkuisioner->getDataKuisioner();
		$data['pageTitle'] = "Dashboard Administrator";
		$data['activePage'] = "respon";
		$this->load->template_admin("lihat_respon", $data, true);
	}
	
	public function export_respon(){
		if(!$this->load->cek_sesi()) exit;
		// $this->load->model('mkuisioner');
		$this->load->helper('export_xlsx');
	
		$data['listRespon'] = $this->mkuisioner->getDataKuisioner();
		$data['simpulan'] = $this->mkuisioner->simpulanIKM();
		$data['hasil'] = $this->mkuisioner->hitungNilaiUnsurPelayanan();
		do_export_xlsx($data['listRespon'], $data['simpulan'], $data['hasil']);
	}
	
    public function home() {
        if(!$this->load->cek_sesi()) exit;

        $data['content'] = 'content/home';
        $this->load->view("layout/sidebar", $data);
    }

    public function kelolaKuisioner() {
        $data['data']['kehandalan'] = $this->MKuisioner->getData('var_kehandalan');
        $data['data']['daya_tanggap'] = $this->MKuisioner->getData('var_daya_tanggap');
        $data['data']['empati'] = $this->MKuisioner->getData('var_empati');
        $data['data']['jaminan'] = $this->MKuisioner->getData('var_jaminan');
        $data['data']['bukti_fisik'] = $this->MKuisioner->getData('var_bukti_fisik');
        $data['content'] = 'content/kelola/kuisioner';

        $this->load->view("layout/sidebar", $data);
    }

    public function kelolaCustomer() {
        $data['content'] = 'content/kelola/customer';
        $data['data'] = $this->MKuisioner->getData('customer');
        $this->load->view("layout/sidebar", $data);
    }

    public function kelolaUser() {
        $data['content'] = 'content/kelola/user';
        $data['data'] = $this->MKuisioner->getData('user');
        $this->load->view("layout/sidebar", $data);
    }

    public function hasilKuisioner() {
        $data['data']['kenyataan'] = $this->MKuisioner->getData('kenyataan');
        $data['data']['harapan'] = $this->MKuisioner->getData('harapan');
        $data['content'] = 'content/hasilKuisioner';

        $this->load->view("layout/sidebar", $data);
    }

    public function laporan() {
        $data['content'] = 'content/laporan';
        $data['data']['kenyataan'] = $this->MKuisioner->getData('kenyataan');
        $data['data']['harapan'] = $this->MKuisioner->getData('harapan');
        $this->load->view("layout/sidebar", $data);
    }

    public function getDetailKuisioner() {
        $id = $this->input->post('id');
        $tbl = $this->input->post('tbl');

        $data = $this->MKuisioner->getData('dtlKuisioner', $id, $tbl);
        echo json_encode($data[0]);
    }

    public function add() {
        $dataParam = $this->input->post();   
        $data = $this->MKuisioner->execute('insert', 'variabel', $dataParam['pertanyaan'], '', $dataParam['tbl']);

        $result = [
            'status' => '200',
            'msg' => 'success'
        ];

        echo json_encode($result);
    }

    public function update() {
        $dataParam = $this->input->post();
        $data = $this->MKuisioner->execute('update','variabel', $dataParam['pertanyaan'], $dataParam['id'], $dataParam['tbl']);

        $result = [
            'status' => '200',
            'msg' => 'success'
        ];

        echo json_encode($result);
    }

    public function delete($id, $tbl) {
        $this->db->delete($tbl, array('id' => $id));
        redirect('Administrasi/kelolaKuisioner');
    }
	
}