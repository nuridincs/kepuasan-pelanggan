<?php
class MKuisioner extends CI_Model{

	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	public function getNomerResponden(){
		$query = $this->db->get('tbl_kuisioner');
		return "RSP-".str_pad($query->num_rows() + 1, 4, 0, STR_PAD_LEFT);
	}
	
	public function setDataResponden(){
		$umur = $this->input->post('umur');
		$jenkel = $this->input->post('jenkel');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		
		if($jenkel == "0")
			$jenkel = "Laki-Laki";
		else
			$jenkel = "Perempuan";
		
		$data = array('umur' => $umur, 'jenkel' => $jenkel,
				'pendidikan' => $pendidikan, 'pekerjaan' => $pekerjaan
		);
		
		$this->session->set_flashdata($data);
	}
	
	public function setDataKuisioner(){
		$nomer = $this->getNomerResponden();
		$umur = $this->input->post('umur');
		$jenkel = $this->input->post('jenkel');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		$prosedur = $this->input->post('prosedur');
		$persyaratan = $this->input->post('persyaratan');
		$kejelasan = $this->input->post('kejelasan');
		$kedisiplinan = $this->input->post('kedisiplinan');
		$tanggungjawab = $this->input->post('tanggungjawab');
		$kemampuan = $this->input->post('kemampuan');
		$kecepatan = $this->input->post('kecepatan');
		$keadilan = $this->input->post('keadilan');
		$kesopanan = $this->input->post('kesopanan');
		$kewajaranBiaya = $this->input->post('kewajaranBiaya');
		$kepastianBiaya = $this->input->post('kepastianBiaya');
		$kepastianJadwal = $this->input->post('kepastianJadwal');
		$kenyamanan = $this->input->post('kenyamanan');
		$keamanan = $this->input->post('keamanan');
		$waktu_pengisian = date("Y-m-d H:i:s");
		
		$data = array('nomer' => $nomer, 'umur' => $umur, 'jenkel' => $jenkel, 'pendidikan' => $pendidikan,
				'pekerjaan' => $pekerjaan, 'prosedur' => $prosedur, 'persyaratan' => $persyaratan,
				'kejelasan' => $kejelasan, 'kedisiplinan' => $kedisiplinan, 'tanggungjawab' => $tanggungjawab,
				'kemampuan' => $kemampuan, 'kecepatan' => $kecepatan, 'keadilan' => $keadilan, 'kesopanan' => $kesopanan,
				'kewajaranBiaya' => $kewajaranBiaya, 'kepastianBiaya' => $kepastianBiaya, 'kepastianJadwal' => $kepastianJadwal,
				'kenyamanan' => $kenyamanan, 'keamanan' => $keamanan, 'waktu_pengisian' => $waktu_pengisian
		);
		
		$this->db->insert('tbl_kuisioner', $data);
		
		if($this->db->affected_rows() != 0){
			return null;
		} else{
			return "Data gagal ditambahkan : ".$this->db->error;
		}
	}
	
	public function getDataKuisioner(){
		$query = $this->db->get('tbl_kuisioner');
		$indeks = 0;
		$result = array();
		
		foreach ($query->result_array() as $row){
			$result[$indeks++] = $row;
		}
		
		return $result;
	}
	
	public function getJumlahResponden(){
		$listKuisioner = $this->getDataKuisioner();
		
		return $jumlahResponden = count($listKuisioner);
	}
	
	public function hitungNilaiUnsurPelayanan(){
		$listKuisioner = $this->getDataKuisioner();
		
		$hasil = array(
				'prosedur' => 0,
				'persyaratan' => 0,
				'kejelasan' => 0,
				'kedisiplinan' => 0,
				'tanggungjawab' => 0,
				'kemampuan' => 0,
				'kecepatan' => 0,
				'keadilan' => 0,
				'kesopanan' => 0,
				'kewajaranBiaya' => 0,
				'kepastianBiaya' => 0,
				'kepastianJadwal' => 0,
				'kenyamanan' => 0,
				'keamanan' => 0
		);
		
		$jumlahResponden = count($listKuisioner);
		
		foreach ($listKuisioner as $kuisioner){
			foreach ($kuisioner as $pelayanan => $nilai){
				if(array_key_exists($pelayanan, $hasil)){
					$hasil[$pelayanan] += $nilai;
				}
			}
		}
		
		foreach ($hasil as $unitPelayanan => $nilai){
			$hasil[$unitPelayanan] = $nilai/$jumlahResponden;
		}
		
		return $hasil;
	}
	
	public function hitungNilaiIKM() {
		$nilaiUnsurPelayanan = $this->hitungNilaiUnsurPelayanan();
		$result = 0;
		
		foreach ($nilaiUnsurPelayanan as $unsurPelayanan){
			$result += $unsurPelayanan*0.071;
		}
		
		return $result;
	}
	
	public function simpulanIKM(){
		$nilaiIKM = $this->hitungNilaiIKM();
		$nilaiIKM = $nilaiIKM * 25;
		
		if($nilaiIKM >= 25 && $nilaiIKM <= 43.75){
			$result['mutu'] = 'D';
			$result['kinerja'] = 'Tidak Baik';
		}else if($nilaiIKM > 43.75 && $nilaiIKM <= 62.5){
			$result['mutu'] = 'C';
			$result['kinerja'] = 'Kurang Baik';
		}else if($nilaiIKM > 62.5 && $nilaiIKM <= 81.25){
			$result['mutu'] = 'B';
			$result['kinerja'] = 'Baik';
		}else if($nilaiIKM > 81.25 && $nilaiIKM <= 100){
			$result['mutu'] = 'A';
			$result['kinerja'] = 'Sangat Baik';
		}
		$result['konversi'] = $nilaiIKM;
		
		return $result;
	}
	
	public function getGraphData(){
		$nilaiUnsurPelayanan = $this->hitungNilaiUnsurPelayanan();
		$result = array();
		$konversi = array(
				'prosedur' => 'Prosedur Pelayanan',
				'persyaratan' => 'Persyaratan Pelayanan',
				'kejelasan' => 'Kejelasan Petugas Pelayanan',
				'kedisiplinan' => 'Kedisiplinan Petugas Pelayanan',
				'tanggungjawab' => 'Tanggung Jawab Petugas Pelayanan',
				'kemampuan' => 'Kemampuan Petugas Pelayanan',
				'kecepatan' => 'Kecepatan Pelayanan',
				'keadilan' => 'Keadilan Mendapatkan Pelayanan',
				'kesopanan' => 'Kesopanan dan Keramahan Petugas',
				'kewajaranBiaya' => 'Kewajaran Biaya Pelayanan',
				'kepastianBiaya' => 'Kepastian Biaya Pelayanan',
				'kepastianJadwal' => 'Kepastian Jadwal Pelayanan',
				'kenyamanan' => 'Kenyamanan Lingkungan',
				'keamanan' => 'Keamanan Pelayanan'
		);
		
		foreach ($nilaiUnsurPelayanan as $unsurPelayanan => $nilai){
			$result[$konversi[$unsurPelayanan]] = $nilai;
		}
		
		return $result;
	}

	public function getData($type="", $id="", $tbl="") {
		if($type === 'kuisioner') {
			$sql = "select *
					from tbl_var_kehandalan
					union all
					select *
					from tbl_var_daya_tanggap
					union all
					select *
					from tbl_var_jaminan
					union all
					select *
					from tbl_var_empati
					union all
					select *
					from tbl_var_bukti_fisik
				";
		} elseif ($type === 'pernyataan') {
			$sql = "select * from tbl_pernyataan";
		} elseif ($type === 'var_kehandalan') {
			$sql = "select * from tbl_var_kehandalan";
		} elseif ($type === 'var_daya_tanggap') {
			$sql = "select * from tbl_var_daya_tanggap";
		} elseif ($type === 'var_empati') {
			$sql = "select * from tbl_var_empati";
		} elseif ($type === 'var_jaminan') {
			$sql = "select * from tbl_var_jaminan";
		} elseif ($type === 'var_bukti_fisik') {
			$sql = "select * from tbl_var_bukti_fisik";
		} elseif ($type === 'kenyataan') {
			$sql = "select * from tbl_kuisioner_kenyataan";
		} elseif ($type === 'harapan') {
			$sql = "select * from tbl_kuisioner_harapan";
		} elseif ($type === 'customer') {
			$sql = "select * from tbl_customer";
		} elseif ($type === 'user') {
			$sql = "select * from tbl_user";
		} elseif ($type === 'dtlKuisioner') {
			$sql = "select * from $tbl where id=$id";
		}

		$sql = $this->db->query($sql);
		return $sql->result();
	}

	public function execute($action, $type, $data, $id="", $tbl="") {
		if ($action === 'insert') {
			if ($type === 'skala') {
				$dataCustomer = array(
					'nama' => $data['nama'],
					'umur' => $data['umur'],
					'jk' => $data['jenkel'],
					'frekuensi' => $data['frekuensi'],
					'pekerjaan' => $data['pekerjaan'],
				);	

				$this->db->insert('tbl_customer', $dataCustomer);
				$customer_id = $this->db->insert_id();	

				$this->execute('insert', 'kenyataan', $data, $customer_id);
				$this->execute('insert', 'harapan', $data, $customer_id);
			} elseif ($type === 'kenyataan') {
				$p = [];
				$p['id_responden'] = $id;
				for ($i=1; $i <= 24 ; $i++) { 
					$pp = "p$i";
					$pk = "kenyataan$i";
					$p[$pp]= $data[$pk];
				}

				$dataKenyataan = $p;

				$this->db->insert('tbl_kuisioner_kenyataan', $dataKenyataan);
			} elseif ($type === 'harapan') {
				$p = [];
				$p['id_responden'] = $id;
				$no=0;
				for ($i=112; $i <= 135 ; $i++) { 
					$no++;
					$pp = "p$no";
					$pk = "harapan$i";
					$p[$pp]= $data[$pk];
				}

				$dataHarapan = $p;

				$this->db->insert('tbl_kuisioner_harapan', $dataHarapan);
			} elseif ($type === 'variabel') {
				$this->db->insert($tbl, array('pertanyaan' => $data));
			}
		} elseif ($action === 'update') {
			if ($type === 'variabel') {
				$this->db->where('id', $id);
				$this->db->update($tbl, array('pertanyaan' => $data));
			}
		}
	}
}