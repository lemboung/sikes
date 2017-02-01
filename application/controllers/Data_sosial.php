<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sosial extends CI_Controller {

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

	}

	public function index(){
	}

	public function tambah_data_ekonomi($idkk){
		if ($this->session->userdata('logged_in')) {
			$data['status'] = "baru";
			$data['idkk'] = $idkk;
			$this->load->view('admin/form_add_economic', $data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function edit_data_ekonomi($idkk){
		if ($this->session->userdata('logged_in')) {
			$data['idkk'] = $idkk;
			$data['status'] = "edit";
			$data['economic_data'] = $this->Model->select_economic_data($idkk)->result();
			$this->load->view('admin/form_add_economic', $data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function tambah_data_perilaku($idkk){
		if ($this->session->userdata('logged_in')) {
			$data['idkk'] = $idkk;
			$data['status'] = "baru";
			$this->load->view('Admin/form_add_behavior',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function edit_data_perilaku($idkk){
		if ($this->session->userdata('logged_in')) {
			$data['idkk'] = $idkk;
			$data['behavior_data'] = $this->Model->select_behav_data($idkk)->result();
			$data['status'] = "baru";
			$this->load->view('Admin/form_add_behavior',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function kelola_data_kesehatan($idkk){
		if ($this->session->userdata('logged_in')) {
			$data['idkk'] = $idkk;
			$data['family'] = $this->Model->select_family_member($idkk)->result();
			$data['health'] = $this->Model->select_health_data($idkk)->result();
			$data['status'] = 'baru';
			$this->load->view('Admin/form_add_health',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function edit_data_kesehatan($idkk, $id_dsk){
		if ($this->session->userdata('logged_in')) {
			$data['idkk'] = $idkk;
			$data['id_dsk'] = $id_dsk;
			$data['family'] = $this->Model->select_family_member($idkk)->result();
			$data['health'] = $this->Model->select_health_data($idkk)->result();
			$data['ahealth'] = $this->Model->select_a_health_data($id_dsk)->result();
			$data['status'] = 'edit';
			$this->load->view('Admin/form_add_health',$data);
		}
		else {
			redirect(site_url('login'));
		}
	}

	public function insert_data_ekonomi(){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['luas_bangunan_lahan'] = $this->input->post('luas_bangunan_lahan');
		$data['status_kepemilikan_rumah'] = $this->input->post('status_kepemilikan');
		$data['daya_listrik'] = $this->input->post('daya_listrik');
		$se = $this->input->post('sumber_ekonomi');
		$data['sumber_ekonomi'] = implode(", ",$se);
		$pe = $this->input->post('penopang_ekonomi');
		$data['penopang_ekonomi'] = implode(", ",$pe);

		$error = $this->Model->insert('data_ekonomi_keluarga', $data);
		if($error == null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}
	}

	public function update_data_ekonomi($idkk){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['luas_bangunan_lahan'] = $this->input->post('luas_bangunan_lahan');
		$data['status_kepemilikan_rumah'] = $this->input->post('status_kepemilikan');
		$data['daya_listrik'] = $this->input->post('daya_listrik');
		$se = $this->input->post('sumber_ekonomi');
		$data['sumber_ekonomi'] = implode(", ",$se);
		$pe = $this->input->post('penopang_ekonomi');
		$data['penopang_ekonomi'] = implode(", ",$pe);

		$result = $this->Model->update('data_ekonomi_keluarga', $data, $idkk, 'dkk_id_kepala_keluarga');
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}
	}

	public function insert_data_perilaku(){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['jaminan_kesehatan'] = $this->input->post('jaminan_kesehatan');
		$data['pelayanan_preventif_balita'] = $this->input->post('pelayanan_prev_balita');
		$data['pemeliharaan_kes_keluarga'] = $this->input->post('pemeliharaan_kes_keluarga');
		$data['pelayanan_pengobatan_diri'] = $this->input->post('pelayanan_pengobatan_diri');
		$sam = $this->input->post('sumber_air_minum');
		$data['sumber_air_minum'] = implode(", ", $sam);
		$data['spal'] = $this->input->post('spal');
		$data['wc_kloset'] = $this->input->post('wc_kloset');
		$data['kamar_mandi'] = $this->input->post('kamar_mandi');
		$data['tempat_cuci_sendiri'] = $this->input->post('tempat_cuci_tersendiri');
		$error = $this->Model->insert('perilaku_kesehatan', $data);
		if($error != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}
	}

	public function update_data_perilaku($idkk){
		$idkk = $this->input->post('idkk');
		$data['dkk_id_kepala_keluarga'] = $idkk;
		$data['jaminan_kesehatan'] = $this->input->post('jaminan_kesehatan');
		$data['pelayanan_preventif_balita'] = $this->input->post('pelayanan_prev_balita');
		$data['pemeliharaan_kes_keluarga'] = $this->input->post('pemeliharaan_kes_keluarga');
		$data['pelayanan_pengobatan_diri'] = $this->input->post('pelayanan_pengobatan_diri');
		$sam = $this->input->post('sumber_air_minum');
		$data['sumber_air_minum'] = implode(", ", $sam);
		$data['spal'] = $this->input->post('spal');
		$data['wc_kloset'] = $this->input->post('wc_kloset');
		$data['kamar_mandi'] = $this->input->post('kamar_mandi');
		$data['tempat_cuci_sendiri'] = $this->input->post('tempat_cuci_tersendiri');
		$result = $this->Model->update('perilaku_kesehatan', $data, $idkk, 'dkk_id_kepala_keluarga');
		if($result != null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_keluarga/anggota_keluarga/'.$idkk);
		}
	}

		public function insert_data_kesehatan(){
		$idkk = $this->input->post('idkk');
		$data['dkk_id'] = $idkk;
		$data['tanggal'] = date("Y-m-d");
		$btk = $this->input->post('org_batuk');
		$data['org_batuk'] = implode(", ",$btk);
		$asma = $this->input->post('org_asma');
		$data['org_asma'] = implode(", ",$asma);
		$mslh = $this->input->post('org_masalah');
		$data['org_masalah_kes'] = implode(", ",$mslh);
		$data['masalah_kes'] = $this->input->post('isi_masalah');
		$khusus = $this->input->post('org_khusus');
		$data['org_penyakit_khusus'] = implode(", ",$khusus);
		$data['penyakit_khusus'] = $this->input->post('isi_khusus');
		$data['mulai_merokok'] = $this->input->post('mulai_merokok');
		$data['berhenti_merokok'] = $this->input->post('berhenti_merokok');
		$data['jml_rokok'] = $this->input->post('jml_rokok');
		$data['jenis_rokok'] = $this->input->post('jenis_rokok');
		$data['jamu'] = $this->input->post('jamu');
		$data['jenis_jamu'] = $this->input->post('jenis_jamu');
		$data['alkohol'] = $this->input->post('alkohol');
		$data['kopi'] = $this->input->post('kopi');
		$data['jenis_obat'] = $this->input->post('jenis_obat');
		$data['minum_dingin'] = $this->input->post('minum_dingin');
		$data['pelihara_hewan'] = $this->input->post('peilhara_hewan');
		$data['olahraga'] = $this->input->post('olahraga');
		$data['jenis_olahraga'] = $this->input->post('jenis_olahraga');
		$data['olahraga_keluarga'] = $this->input->post('olahraga_keluarga');
		$data['tidur_kasur_busa'] = $this->input->post('tidur_kasur_busa');
		$data['sepeda_motor'] = $this->input->post('sepeda_motor');
		$data['alergi_obat'] = $this->input->post('alergi_obat');
		$data['kosmetika_obat_luar'] = $this->input->post('kosmetika_obat_luar');
		$error = $this->Model->insert('data_sosial_kesehatan', $data);
		if($error == null){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
			header('location:'.base_url().'Data_sosial/kelola_data_kesehatan/'.$idkk);
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'Data_sosial/kelola_data_kesehatan/'.$idkk);
		}
	}

		public function update_data_kesehatan(){
			$id_dsk = $this->input->post('id_dsk');
			$idkk = $this->input->post('idkk');
			$data['dkk_id'] = $idkk;
			$data['tanggal'] = date("Y-m-d");
			$btk = $this->input->post('org_batuk');
			$data['org_batuk'] = implode(", ",$btk);
			$asma = $this->input->post('org_asma');
			$data['org_asma'] = implode(", ",$asma);
			$mslh = $this->input->post('org_masalah');
			$data['org_masalah_kes'] = implode(", ",$mslh);
			$data['masalah_kes'] = $this->input->post('isi_masalah');
			$khusus = $this->input->post('org_khusus');
			$data['org_penyakit_khusus'] = implode(", ",$khusus);
			$data['penyakit_khusus'] = $this->input->post('isi_khusus');
			$data['mulai_merokok'] = $this->input->post('mulai_merokok');
			$data['berhenti_merokok'] = $this->input->post('berhenti_merokok');
			$data['jml_rokok'] = $this->input->post('jml_rokok');
			$data['jenis_rokok'] = $this->input->post('jenis_rokok');
			$data['jamu'] = $this->input->post('jamu');
			$data['jenis_jamu'] = $this->input->post('jenis_jamu');
			$data['alkohol'] = $this->input->post('alkohol');
			$data['kopi'] = $this->input->post('kopi');
			$data['jenis_obat'] = $this->input->post('jenis_obat');
			$data['minum_dingin'] = $this->input->post('minum_dingin');
			$data['pelihara_hewan'] = $this->input->post('peilhara_hewan');
			$data['olahraga'] = $this->input->post('olahraga');
			$data['jenis_olahraga'] = $this->input->post('jenis_olahraga');
			$data['olahraga_keluarga'] = $this->input->post('olahraga_keluarga');
			$data['tidur_kasur_busa'] = $this->input->post('tidur_kasur_busa');
			$data['sepeda_motor'] = $this->input->post('sepeda_motor');
			$data['alergi_obat'] = $this->input->post('alergi_obat');
			$data['kosmetika_obat_luar'] = $this->input->post('kosmetika_obat_luar');
			$result = $this->Model->update('data_sosial_kesehatan', $data, $id_dsk, 'id_dsk');
			if($result != null){
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
				header('location:'.base_url().'Data_sosial/kelola_data_kesehatan/'.$idkk);
			}else{
				$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
				header('location:'.base_url().'Data_sosial/kelola_data_kesehatan/'.$idkk);
			}
		}

		public function hapus_data_kesehatan($id, $id_dsk){
			$where = "id_dsk";
			$idkk = $id;
			$result = $this->Model->delete('data_sosial_kesehatan', $where, $id_dsk);
			if($result != null){
				$this->session->set_flashdata("sukses", "<div class='alert alert-warning'><strong>Hapus data BERHASIL dilakukan</strong></div>");
				header('location:'.base_url().'Data_sosial/kelola_data_kesehatan/'.$idkk);
			}else{
				$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>hapus data GAGAL di lakukan</strong></div>");
				header('location:'.base_url().'Data_sosial/kelola_data_kesehatan/'.$idkk);
			}
		}
}
