<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		// $this->load->library('input');
	}

	public function index()
	{
		$data['info']=$this->session->userdata('info');
		$this->load->view('admin/viewlogin', $data);
	}

	// memeriksa keberadaan akun username
	public function login(){
		$username = $this->input->post('username', 'true');
		$p = $this->input->post('password', 'true');
		$password = md5($p);
		$account = $this->ModelUser->check_user_account($username, $password)->row();

		if (empty($account)){
			$info='<div style="color:red">PERIKSA KEMBALI NAMA PENGGUNA DAN PASSWORD ANDA!</div>';
			$this->session->set_userdata('info',$info);

			redirect(base_url().'login');

		}
		else {

		$array_items = array(
		'id_user' => $account->id_user,
		'username' => $account->username,
		'logged_in' => true,
		'tipe' => $account->tipe
		);
		$this->session->set_userdata($array_items);
		redirect(site_url('Admin'));
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('Admin'));
	}

	public function register(){

		 $config['upload_path'] = './images/member/';
		 $config['allowed_types'] = 'gif|jpg|png';
		 $config['max_size'] = '2000';
		 //  $config['max_width'] = '1024';
		//  $config['max_height'] = '768';

		 $this->load->library('upload', $config);

		 if (!$this->upload->do_upload('foto')){
			 $error = array('error'=>$this->upload->display_errors());
			 $this->load->view('Index', $error);
		 	// echo "error";
		 }
		 else {
			 $upload_data = $this->upload->data();
			 $data['foto'] = $upload_data['file_name'];
			 $data['username'] = $this->input->post('username');
			 $p = $this->input->post('pass');
			 $data['pass'] = md5($p);
			 $data['email'] = $this->input->post('email');
			 $data['nama'] = $this->input->post('nama');
			 $data['alamat'] = $this->input->post('alamat');
			 $data['kota'] = $this->input->post('kota');
			 $data['no_telp'] = $this->input->post('no_telp');
			 $data['noktp'] = $this->input->post('noktp');
			 $data['level'] = 1;
			 // $upload_data['username'] = $judul;
			 // $data = array('upload_data' => $upload_data);

			 // $this->load->view('tes', $data);
			 $this->ModelUser->insert_user($data);
		 	 redirect(site_url('Welcome'));

		 }


		 // echo $data['username'];
	 }

}
