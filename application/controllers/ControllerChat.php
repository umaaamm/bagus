<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerChat extends CI_Controller {

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
		
		$databeranda['tampil']=$this->db->query("select * from tbl_chat order by id_chat DESC");
		$databeranda['content']='chat/v_chat';
		$this->db->query("UPDATE tbl_chat SET status = 1 WHERE status=0");
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
		
			// $data['id_member']=$this->input->post("id_member");
			$data['text']=$this->input->post("text");
			$data['nama']=$this->input->post("nama");
			$data['status']='0';
			
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_chat",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'ChatRoomUser');
	}

	public function notif(){
		$q = $this->db->query("select count(id_chat) as notif from tbl_chat where status ='0' ")->result_array();
		// print_r($q['0']['notif']);die;
		
		if ($q['0']['notif'] == '0') {
			$data = array(
		   'notification' => ''
			);
		}else {
			$data = array(
		   'notification' => $q['0']['notif']
		);
		}
		
			echo json_encode($data);
		// print_r($data);die;

	}

	public function user(){

		$databeranda['tampil']=$this->db->query("select * from tbl_chat order by id_chat DESC");
		$databeranda['content']='chat/v_chat_u';
		$this->load->view('admin/home',$databeranda);
	}
	public function simpan_c_u(){
		
			// $data['id_member']=$this->input->post("id_member");
			$data['text']=$this->input->post("text");
			$data['nama']=$this->input->post("nama");
			$data['status']='0';
			
			//print_r($data);die;
			$this->RsModel->TambahData("tbl_chat",$data);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
			header('location:'.base_url().'ChatRoomUser');
	}

	

}
