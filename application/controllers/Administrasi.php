<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('MKuisioner');
    }

	public function index(){
		if(!$this->load->cek_sesi()) exit;
		
		$this->dashboard();
	}
	
	public function dashboard(){
		if(!$this->load->cek_sesi()) exit;
	
		$data['pageTitle'] = "Dashboard Administrator";
		$data['activePage'] = "dashboard";
		
		// $this->load->model('mkuisioner');
		$data['simpulan'] = $this->mkuisioner->simpulanIKM();
		$data['jumlahResponden'] = $this->mkuisioner->getJumlahResponden();
		$this->load->template_admin("dashboard", $data, true);
	}
	
	public function lihat_respon(){
		if(!$this->load->cek_sesi()) exit;
		// $this->load->model('mkuisioner');
	
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
	
	/*tambahan buat datatables
	
	function ssp_tm_alkes(){
        $aColumns = array('nomer', 'umur', 'jenkel', 'pendidikan', 'pekerjaan', 'prosedur', 'persyaratan', 'kejelasan', 'kedisiplinan', 'tanggungjawab', 'kemampuan', 'kecepatan', 'keadilan', 'kesopanan', 'kewajaranBiaya', 'kepastianBiaya', 'kepastianJadwal', 'kenyamanan', 'keamanan');
        
        $sIndexColumn = "nomer";
        
        // paging
        $sLimit = "";
        if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ){
            $sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
                mysql_real_escape_string( $_GET['iDisplayLength'] );
        }
        $numbering = mysql_real_escape_string( $_GET['iDisplayStart'] );
        $page = 1;
        
        // ordering
        if ( isset( $_GET['iSortCol_0'] ) ){
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ ){
                if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" ){
                    $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                        ".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
                }
            }
            
            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" ){
                $sOrder = "";
            }
        }

        // filtering
        $sWhere = "";
        if ( $_GET['sSearch'] != "" ){
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ ){
                $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }
        
        // individual column filtering
        for ( $i=0 ; $i<count($aColumns) ; $i++ ){
            if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' ){
                if ( $sWhere == "" ){
                    $sWhere = "WHERE ";
                }
                else{
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
            }
        }
        
        $rResult = $this->admin->ssp_tm_alkes($aColumns, $sWhere, $sOrder, $sLimit);
        
        $iFilteredTotal = 10;
        
        $rResultTotal = $this->admin->ssp_tm_alkes_total($sIndexColumn);
        $iTotal = $rResultTotal->num_rows();
        $iFilteredTotal = $iTotal;
        
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        
        foreach ($rResult->result_array() as $aRow){
            $row = array();
            for ( $i=0 ; $i<count($aColumns) ; $i++ ){
                /* General output 
                if($i < 1)
                    $row[] = $numbering+$page.'|'.$aRow[ $aColumns[$i] ];
                else
                    $row[] = $aRow[ $aColumns[$i] ];
            }
            $page++;
            $output['aaData'][] = $row;
        }
        
        echo json_encode( $output );
    }*/
	
    public function home() {
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
        $this->load->view("layout/sidebar", $data);
    }

    public function kelolaUser() {
        $data['content'] = 'content/kelola/user';
        $this->load->view("layout/sidebar", $data);
    }

    public function hasilKuisioner() {
        $data['data']['kenyataan'] = $this->MKuisioner->getData('kenyataan');
        $data['data']['harapan'] = $this->MKuisioner->getData('harapan');
        $data['content'] = 'content/hasilKuisioner';

        // $this->load->view("layout/sidebar", $data);
        // $data['content'] = 'content/hasilKuisioner';
        $this->load->view("layout/sidebar", $data);
    }

    public function laporan() {
        $data['content'] = 'content/laporan';
        $this->load->view("layout/sidebar", $data);
    }
	
}