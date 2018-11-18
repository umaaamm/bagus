<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerMekanik extends CI_Controller {

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
	public function index()
	{
		
		$databeranda['tampil']=$this->db->query("select * from tbl_mekanik");
		$databeranda['content']='mekanik/v_mekanik';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
			$data['nama_mekanik']=$this->input->post("nama_mekanik");
			// $data['username']=$this->input->post("user");
			// $data['password']=$this->input->post("pass");
			// $data['level']='Mekanik';
			
			
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_mekanik",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaMekanik');
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_mekanik'=>$id);
		$this->RsModel->HapusData('tbl_mekanik',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaMekanik');
	}

	public function edit(){
			$where['id_mekanik']=$this->input->post('id');
			$data['nama_mekanik']=$this->input->post("nama_mekanik");
			// $data['username']=$this->input->post("user");
			// $data['password']=$this->input->post("pass");

			//print_r($where);die;
			$this->RsModel->EditData("tbl_mekanik",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaMekanik');

	}

}
