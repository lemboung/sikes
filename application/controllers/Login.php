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
	}

	public function index()
	{
		$data['info']=$this->session->userdata('info');
		$this->load->view('admin/viewlogin', $data);
		if(!empty($this->session->userdata('username'))){
			redirect(base_url());
		}
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
		'fktp' => $account->fktp,
		'logged_in' => true,
		'tipe' => $account->tipe
		);
		$this->session->set_userdata($array_items);
		redirect(site_url('Home'));
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}
