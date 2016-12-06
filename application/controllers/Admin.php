<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/

	function __construct(){
		parent::__construct();
		$this->load->model('ModelUser');
		$this->load->model('Model');
		$this->load->model('ModelPosting');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');

	}

	public function index(){
		if ($this->session->userdata('logged_in')) {
			redirect(site_url('admin/dashboard'));
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function dashboard()
	{
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/dashboard',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function daftar_keluarga(){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['pasien'] = $this->Model->tabel_kepala_keluarga()->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/tabel_keluarga',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function anggota_keluarga($idkk){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['fada'] = $this->Model->select_family_data($idkk)->result();
			$data['family'] = $this->Model->select_family_member($idkk)->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$data['status'] = 'baru';
			$this->load->view('Admin/family_member',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function edit_anggota_keluarga($idkk, $nik){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['fada'] = $this->Model->select_family_data($idkk)->result();
			$data['family'] = $this->Model->select_family_member($idkk)->result();
			$data['person'] = $this->Model->select_person($nik)->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$data['status'] = 'edit';
			$this->load->view('Admin/family_member',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_keluarga(){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/form_add_family',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_data_ekonomi($idkk){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['idkk'] = $idkk;
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/form_add_economic', $data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_data_perilaku($idkk){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['idkk'] = $idkk;
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/form_add_behavior',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_data_kesehatan($idkk){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['idkk'] = $idkk;
			$data['family'] = $this->Model->select_family_member($idkk)->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/form_add_health',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function daftar_risiko(){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['risiko'] = $this->Model->select_all_risk()->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/tabel_risiko',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function rekam_medis($nik){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['pasien'] = $this->Model->select_patient_by_id($nik)->result();
			$data['rekam'] = $this->Model->select_all_rm_patient($nik)->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/rekam_medis',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_pasien(){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['risiko'] = $this->Model->select_all_risk()->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/form_add_patient',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function update_pasien($nik){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['pasien'] = $this->Model->select_patient_by_id($nik)->result();
			$data['risiko'] = $this->Model->select_all_risk()->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/form_edit_patient',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_rekam_medis($nik){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['pasien'] = $this->Model->select_patient_by_id($nik)->result();
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/form_add_rm',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_risiko(){
		if ($this->session->userdata('logged_in')) {
			$id = $this->session->userdata('id_user');
			$data['user'] = $this->ModelUser->get_user($id)->result();
			$this->load->view('Admin/form_add_risk',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function insert_keluarga(){
		$data['alamat'] = $this->input->post('alamat');
		$data['RT'] = $this->input->post('rt');
		$data['RW'] = $this->input->post('rw');
		$data['kelurahan'] = $this->input->post('kelurahan');
		$data['kecamatan'] = $this->input->post('kecamatan');
		$data['kota'] = $this->input->post('kota');
		$data['pembayaran'] = $this->input->post('pembayaran');
		$result = $this->Model->insertkk('data_kepala_keluarga', $data);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Admin/anggota_keluarga/'.$result);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Admin/daftar_keluarga');
		}
	}

	public function insert_anggota_keluarga(){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['nik'] = $this->input->post('nik');
		$data['nama'] = $this->input->post('nama');
		$data['tanggal_lahir'] = $this->input->post('tgl');
		$data['pekerjaan'] = $this->input->post('pekerjaan');
		$data['hubungan_keluarga'] = $this->input->post('hubungan_keluarga');
		$data['status_kawin'] = $this->input->post('status_kawin');
		$data['umur_kawin'] = $this->input->post('umur_kawin');
		$kk = $this->Model->kepala_keluarga($idkk);
		if ($kk == null) {
			$data['kepala_keluarga'] = 1;
		}
		$result = $this->Model->insert('data_kependudukan', $data);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Admin/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Admin/anggota_keluarga/'.$idkk);
		}
	}

	public function insert_data_ekonomi(){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['luas_bangunan_lahan'] = $this->input->post('luas_bangunan_lahan');
		$data['status_kepemilikan_rumah'] = $this->input->post('status_kepemilikan');
		$data['daya_listrik'] = $this->input->post('daya_listrik');
		$se_ex = $this->input->post('sumber_ekonomi');
		$se = implode(", ",$se_ex);
		$data['sumber_ekonomi'] = $se;
		$pe_ex = $this->input->post('penopang_ekonomi');
		$pe = implode(", ",$pe_ex);
		$data['penopang_ekonomi'] = $pe;

		$result = $this->Model->insert('data_ekonomi_keluarga', $data);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Admin/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Admin/anggota_keluarga/'.$idkk);
		}
	}

	public function insert_data_perilaku(){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['jaminan_kesehatan'] = $this->input->post('jaminan_kesehatan');
		$data['pelayanan_preventif_balita'] = $this->input->post('pelayanan_prev_balita');
		$data['pemeliharaan_kes_keluarga'] = $this->input->post('pemeliharaan_kes_keluarga');
		$data['pelayanan_pengobatan_diri'] = $this->input->post('pelayanan_pengobatan_diri');
		$data['sumber_air_minum'] = $this->input->post('sumber_air_minum');
		$data['spal'] = $this->input->post('spal');
		$data['wc_kloset'] = $this->input->post('wc_kloset');
		$data['kamar_mandi'] = $this->input->post('kamar_mandi');
		$data['tempat_cuci_sendiri'] = $this->input->post('tempat_cuci_tersendiri');
		$result = $this->Model->insert('perilaku_kesehatan', $data);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Admin/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Admin/anggota_keluarga/'.$idkk);
		}
	}

	public function insert_data_kesehatan(){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['org_batuk'] = $this->input->post('org_batuk');
		$data['org_asma'] = $this->input->post('org_asma');
		$data['org_masalah_kes'] = $this->input->post('org_masalah');
		$data['masalah_kes'] = $this->input->post('isi_masalah');
		$data['org_penyakit_khusus'] = $this->input->post('org_khusus');
		$data['penyakit_khusus'] = $this->input->post('isi_khusus');
		$data['mulai_merokok'] = $this->input->post('mulai_merokok');
		$data['berhenti_merokok'] = $this->input->post('berhenti_merokok');
		$data['jml_rokok'] = $this->input->post('jumlah_rokok');
		$data['jamu'] = $this->input->post('jamu');
		$data['jenis_jamu'] = $this->input->post('jenis_jamu');
		$data['alkohol'] = $this->input->post('alkohol');
		$data['kopi'] = $this->input->post('kopi');
		$data['jenis_obat'] = $this->input->post('jenis_obat');
		$data['minum_dingin'] = $this->input->post('minum_dingin');
		$data['peilhara_hewan'] = $this->input->post('peilhara_hewan');
		$data['olahraga'] = $this->input->post('olahraga');
		$data['jenis_olahraga'] = $this->input->post('jenis_olahraga');
		$data['tidur_kasur_busa'] = $this->input->post('tidur_kasur_busa');
		$data['sepeda_motor'] = $this->input->post('sepeda_motor');
		$data['alergi_obat'] = $this->input->post('alergi_obat');
		$data['kosmetika_obat_luar'] = $this->input->post('kosmetika_obat_luar');
		$result = $this->Model->insert('data_sosial_kesehatan', $data);
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Admin/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Admin/anggota_keluarga/'.$idkk);
		}
	}
}
