<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLaporan extends CI_Controller {

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
		$databeranda['hasil']=$this->db->query("SELECT tbl_member.alamat,tbl_member.nama,tbl_member.no_hp,tbl_mekanik.nama_mekanik, tbl_booking.*, tbl_acc.nama_acc,tbl_acc.harga_acc,tbl_service.harga_service,tbl_service.paket_service from tbl_booking LEFT JOIN tbl_member on tbl_booking.id_member = tbl_member.id_member LEFT JOIN tbl_mekanik on tbl_booking.id_mekanik = tbl_mekanik.id_mekanik LEFT JOIN tbl_acc ON tbl_booking.id_acc = tbl_acc.id_acc LEFT JOIN tbl_service ON tbl_booking.id_service = tbl_service.id_service");
		$databeranda['content']='laporan/v_laporan';
		$this->load->view('admin/home',$databeranda);
	}

	public function filter(){
		$jenis=$this->input->post("jenis");
		$radio=$this->input->post("optionsRadios");
		$tanggal1 = $this->input->post("tanggal1");
		$tanggal2 = $this->input->post("tanggal2");

		
		// print_r($tanggal1);die;

		if ($tanggal1 == '' && $tanggal2=='') {
			$databeranda['hasil']=$this->db->query("SELECT tbl_member.alamat,tbl_member.nama,tbl_member.no_hp,tbl_mekanik.nama_mekanik, tbl_booking.*, tbl_acc.nama_acc,tbl_acc.harga_acc,tbl_service.harga_service,tbl_service.paket_service from tbl_booking LEFT JOIN tbl_member on tbl_booking.id_member = tbl_member.id_member LEFT JOIN tbl_mekanik on tbl_booking.id_mekanik = tbl_mekanik.id_mekanik LEFT JOIN tbl_acc ON tbl_booking.id_acc = tbl_acc.id_acc LEFT JOIN tbl_service ON tbl_booking.id_service = tbl_service.id_service");
		}else {
			
		$databeranda['hasil']=$this->db->query("SELECT tbl_member.alamat,tbl_member.nama,tbl_member.no_hp,tbl_mekanik.nama_mekanik, tbl_booking.*, tbl_acc.nama_acc,tbl_acc.harga_acc,tbl_service.harga_service,tbl_service.paket_service from tbl_booking LEFT JOIN tbl_member on tbl_booking.id_member = tbl_member.id_member LEFT JOIN tbl_mekanik on tbl_booking.id_mekanik = tbl_mekanik.id_mekanik LEFT JOIN tbl_acc ON tbl_booking.id_acc = tbl_acc.id_acc LEFT JOIN tbl_service ON tbl_booking.id_service = tbl_service.id_service where tbl_booking.tgl_booking between '".$tanggal1."' and '".$tanggal2."' ");

	}
		$databeranda['content']='laporan/v_laporan';
		// $this->session->set_flashdata("notif","<div class='alert alert-success'>Data Berhasil difilter</div>");
		$this->load->view('admin/home',$databeranda);
	}

	
	

	

}
