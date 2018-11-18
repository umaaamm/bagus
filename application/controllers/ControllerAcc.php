<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerAcc extends CI_Controller {

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
		
		$databeranda['tampil']=$this->db->query("select * from tbl_acc");
		$databeranda['content']='acc/v_acc';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
		
			$data['nama_acc']=$this->input->post("nama_acc");
			$data['harga_acc']=$this->input->post("harga_acc");
			$data['jenis']=$this->input->post("jenis");
			
			
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_acc",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'KelolaAcc');
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_acc'=>$id);
		$this->RsModel->HapusData('tbl_acc',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'KelolaAcc');
	}

	public function edit(){
			$where['id_acc']=$this->input->post('id');
			
			$data['nama_acc']=$this->input->post("nama_acc");
			$data['harga_acc']=$this->input->post("harga_acc");
			$data['jenis']=$this->input->post("jenis");

			//print_r($where);die;
			$this->RsModel->EditData("tbl_acc",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'KelolaAcc');

	}

}
