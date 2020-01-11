<?php

/**
 * Kelas untuk model Admin
 * @author PT MAKANAN UTAMA MANAJEMEN
 *
 */
class Admin extends CI_Model{
		
	private $idAdmin, $username, $password, $email, $fullname, $lastLogin, $lastIp, $privilege;
	
	public function __construct(){
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	/**
	 * Fungsi untuk menambah admin
	 * @return string keterangan sukses atau gagal
	 */
	public function addAdmin(){
		$this->load->model('jurusan');
		
		$this->username = $this->input->post('username');
		$this->password = $this->input->post('password');
		$this->email = $this->input->post('email');
		$this->fullname = $this->input->post('fullname');
		$namaJurusan = $this->input->post('jurusan');
		$jurusan = $this->jurusan->getJurusanbyName($namaJurusan);
		$this->privilege = $jurusan['id'];
		
		$cost = 10;
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
		$salt = sprintf("$2a$%02d$", $cost) . $salt;
		$passwordHash = crypt($this->password, $salt);
		
		if($this->cekUsername($username) == 0){
			$this->db->insert('tbl_admin', array('username'=>$this->username, 'password'=>$passwordHash,
					'email'=>$this->email,'$privilege'=>$this->privilege)
			);
			
			if($this->db->affected_rows() != 0){
				return "ok";
			}else return $this->db->error;
		}else return "Username sudah terdaftar";
	}
	
	public function getAdminJurusan(){
		$result = $this->db->get_where('tbl_admin', array('idAdmin !=' => 1));
		
		$row = $result->result_array();
		return $row;
	} 
	
	/**
	 * Fungsi untuk mendapatkan baris admin berdasarkan idnya
	 * @param int $idAdmin
	 * @return row of array Admin
	 */
	public function getAdminbyId($idAdmin) {
	
		$result = $this->db->get_where('tbl_admin', array('idAdmin'=>$idAdmin), 1);
	
		$row = $result->row_array();
		return $row;
	}
	
	/**
	 * Fungsi untuk mendapatkan baris admin berdasarkan emailnya
	 * @param string $email
	 * @return row Admin
	 */
	public function getAdminbyEmail($email) {
	
		$result = $this->db->get_where('tbl_admin', array('email'=>$email), 1);
	
		$row = $result->row();
		return $row;
	}
	
	/**
	 * Fungsi untuk mendapatkan baris admin berdasarkan usernamenya
	 * @param string $username
	 * @return row of array Admin
	 */
	public function getAdminbyUsername($username) {
	
		$result = $this->db->get_where('tbl_admin', array('username'=>$username), 1);
	
		$row = $result->row_array();
		return $row;
	}
	
	function set_hashed_password($userName, $newPassWord){
		// == Generate hash untuk password baru
		$cost = 10;
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
		$salt = sprintf("$2a$%02d$", $cost) . $salt;
		$passwordHash = crypt($newPassWord, $salt);
	
		$this->db->where('username',$userName);
		$qResult = $this->db->update('tbl_admin', array('password' => $passwordHash));
	
		if ($this->db->affected_rows() == 0) return ("No affected rows.");
		return null;
	}
	
	/**
	 * Fungsi untuk mengubah password Admin
	 * @return string|NULL
	 */
	public function changePassword() {
		
		$this->idAdmin = $this->input->post('idAdmin');
		$this->idAdmin = $this->encryption->decrypt($this->idAdmin);
		$oldPassWord = $this->input->post('oldPassword');
		$newPassWord = $this->input->post('newPassword');
		
		$adminData = $this->getAdminbyId($this->idAdmin);
		if ($adminData == null) return "Admin tidak ditemukan";
	
		// if password OK
		if ((crypt($oldPassWord, $adminData['password'])) === $adminData['password']) {
			// == Generate hash untuk password baru
			$cost = 10;
			$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
			$salt = sprintf("$2a$%02d$", $cost) . $salt;
			$passwordHash = crypt($newPassWord, $salt);
			
			$this->db->update('tbl_admin', array('password'=>$passwordHash),array('idAdmin'=>$adminData['idAdmin']));
			
			if ($this->db->affected_rows() === 0) return ("Query Gagal!");
	
		} else return "Password lama salah! Pastikan ditulis dengan benar.";
		return null;
	}
	
	/**
	 * Fungsi untuk merubah email admin
	 * @return string|NULL
	 */
	public function changeEmail(){
		$this->idAdmin = $this->input->post('idAdmin');
		$this->idAdmin = $this->encryption->decrypt($this->idAdmin);
		$password = $this->input->post('password');
		$email = $this->input->post('newEmail');
		
		$adminData = $this->getAdminbyId($this->idAdmin);
		if ($adminData == null) return "Admin tidak ditemukan";
		
		// if password OK
		if ((crypt($password, $adminData['password'])) === $adminData['password']) {
			$this->db->update('tbl_admin', array('email'=>$email), array('idAdmin'=>$adminData['idAdmin']));
			if ($this->db->affected_rows() === 0) return ("Query failed!");
		}else return "Password tidak tepat.";
		$this->session->set_userdata(array('sessionEmail' => $email));
		return null;
	}
	
	/**
	 * Fungsi untuk mereset password admin
	 * @return string
	 */
	public function resetPassword(){
		$admin = $this->input->post('admin');
		$newPassword = $this->input->post('newPassword');
		
		$cost = 10;
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
		$salt = sprintf("$2a$%02d$", $cost) . $salt;
		$passwordHash = crypt($newPassword, $salt);
			
		$this->db->update('tbl_admin', array('password'=>$passwordHash),array('idAdmin'=>$admin));
			
		if ($this->db->affected_rows() === 0) return $this->db->error;
	}
	
	/**
	 * Fungsi untuk memeriksa username sudah ada atau belum
	 * @param string $username
	 * @return string|number
	 */
	public function cekUsername($username){
		
		$this->db->select('username');
		$result = $this->db->get_where('tbl_admin', array('username'=>$username), 1);
		
		if ($row = $result->row_array()) {
			return $row['username'];
		}
		return 0;
	}
	
	/**
	 * Fungsi untuk memeriksa email sudah ada atau belum
	 * @return string|number
	 */
	public function cekEmail(){
		$email = $this->input->post('email');
		$this->db->select('email');
		$result = $this->db->get_where('tbl_admin', array('email'=>$email), 1);
	
		if ($row = $result->row_array()) {
			return $row['email'];
		}
		return 0;
	}
	
	/**
	 * Fungsi untuk admin melakukan login. Fungsi ini akan membuat sesi admin tersebut. Sesi yang terbuat:
	 * $_SESSION['sessionType'], $_SESSION['sessionEmail'], $_SESSION['sdminName'], $_SESSION['id']
	 * @param boolean $updateRecord
	 * @return NULL|string
	 */
	public function adminLogin($updateRecord = true) {
		
		$this->username = $this->input->post('username');
		$this->password = $this->input->post('password');
		$this->captcha = $this->input->post('captcha');
		$this->captcha_temporary = $this->input->post('captcha_temporary');
		if ($this->captcha !== $this->captcha_temporary) {
			return "Captcha yang Anda masukin salah.";
			exit;
		}
		
		$adminData = $this->getAdminbyUsername($this->username);
		if ($adminData != null) {
			// if password OK
			if ((crypt($this->password, $adminData['password'])) === $adminData['password']) {
				$data = array('sessionEmail'=>$adminData['email'], 'adminName'=>$adminData['fullname'], 
						'id'=>$adminData['idAdmin']);
				
				$this->session->set_userdata($data);
					
				if ($updateRecord) {
					$this->lastLogin = date("Y-m-d H:i:s");
					$this->lastIp = $_SERVER['REMOTE_ADDR'];
					$this->db->update('tbl_admin', array('lastLogin'=>$this->lastLogin, 'lastIp'=>$this->lastIp), array('idAdmin'=>$adminData['idAdmin']));
				}
				return null;
			}
		}
		return "Username atau password salah. Pastikan ditulis dengan benar.";
	}
	
	/**
	 * Fungsi untuk admin melakukan logout. Fungsi ini akan mengakhiri sesi dari admin tersebut
	 * 
	 */
	public function adminLogout() {
		unset($_SESSION['id']);
		unset($_SESSION['sessionEmail']);
		unset($_SESSION['adminName']);
	}
	
}
?>