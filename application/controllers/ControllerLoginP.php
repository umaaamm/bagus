<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLoginP extends CI_Controller {

	public function index()
	{
	//	$databeranda['content']='admin/v-beranda';
		$this->load->view('v_login_member');
	}
		//login
	function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//print_r($npm);
		//$cek = $this->RsModel->cek_login("tbl_admin",$where)->num_rows();
		// $cek = $this->db->query("SELECT * FROM tbl_peserta WHERE npm='$npm' ");
		//print_r($cek);die;
		$cek = $this->db->query("SELECT * FROM tbl_member WHERE username='$username' AND password='$password' ");
		if($cek->num_rows() > 0){
				foreach($cek->result() as $key){
				$lvl = $key->level;
				$nama = $key->nama;
				$id_member = $key->id_member;
			}
			if($lvl=='Member'){
				$data_session = array(
					'id_member' => $id_member,
				'nama' => $nama,
				'level'=> $lvl,
				'id_untuk_chat'=>$id_member,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
			$this->session->set_flashdata("notif_l","<div class='alert alert-success'>Selamat Anda Berhasil Login</div>");
				redirect('ControllerUtama');
			}else{
				$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Password atau Username anda Salah</div>");
				redirect('LoginMember');
			}

		}else{
			$this->session->set_flashdata("notif_l","<div class='alert alert-danger'>Password atau Username anda Salah</div>");
			redirect('LoginMember');
		}
	}
 
	function logout_m(){
		$this->session->sess_destroy();
		redirect(base_url().'LoginMember');
	
	}

}