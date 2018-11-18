<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerMember extends CI_Controller {

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


	// function __construct(){
	// parent::__construct();
	
	// 		if($this->session->userdata('status') != "login"){
	// 		redirect(base_url('Login'));
	// 	}
	

	public function index()
	{
		
		// $databeranda['content']='peserta/v_daftar';
		// $this->load->view('peserta/v_daftar');
		$this->load->view('v_login_member');
	}
	public function simpan(){
			$data['nama']=$this->input->post("nama");
			$data['no_hp']=$this->input->post("no_hp");
			$data['alamat']=$this->input->post("alamat");
			$data['merk_motor']=$this->input->post("merk_motor");
			$data['type_motor']=$this->input->post("type_motor");
			$data['plat_motor']=$this->input->post("plat_motor");
			$data['username']=$this->input->post("username");
			$data['password']=$this->input->post("password");
			$data['email']=$this->input->post("email");
			$data['level']="Member";
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_member",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Anda Berhasil Register, Silahkan Login Menggunakan Username dan Password.</div>");
			header('location:'.base_url().'LoginMember');
	}
	public function data_member(){
		$databeranda['tampil']=$this->db->query("select * from tbl_member where id_member='".$_SESSION['id_member']."'");
		$databeranda['content']='member/v_data_member';
		$this->load->view('admin/home',$databeranda);
	}
	public function login_member(){
		$this->load->view('v_login_member');
	}
	public function edit_member(){
			$data['nama']=$this->input->post("nama");
			$data['no_hp']=$this->input->post("no_hp");
			$data['alamat']=$this->input->post("alamat");
			$data['merk_motor']=$this->input->post("merk_motor");
			$data['type_motor']=$this->input->post("type_motor");
			$data['plat_motor']=$this->input->post("plat_motor");
			$data['username']=$this->input->post("username");
			$data['password']=$this->input->post("password");
			$data['email']=$this->input->post("email");
			$data['level']="Member";
			$where['id_member']=$this->input->post('id');
			$this->RsModel->EditData("tbl_member",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'DataMember');
	}
	public function daftar(){
		$this->load->view('peserta/v_daftar');
	}
}
