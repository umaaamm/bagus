<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBooking extends CI_Controller {

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
		
		$databeranda['tampil_s']=$this->db->query("select * from tbl_service");
		$databeranda['tampil_a']=$this->db->query("select * from tbl_acc");
		$databeranda['tampil_m']=$this->db->query("select * from tbl_member");
		$databeranda['tampil']=$this->db->query("SELECT tbl_booking.*,tbl_service.paket_service,tbl_mekanik.nama_mekanik,tbl_acc.nama_acc FROM tbl_booking INNER JOIN tbl_service on tbl_booking.id_service = tbl_service.id_service JOIN tbl_mekanik on tbl_booking.id_mekanik = tbl_mekanik.id_mekanik JOIN tbl_acc on tbl_booking.id_acc = tbl_acc.id_acc");
		$databeranda['tampil_member']=$this->db->query("SELECT tbl_booking.*,tbl_service.paket_service,tbl_mekanik.nama_mekanik,tbl_acc.nama_acc FROM tbl_booking INNER JOIN tbl_service on tbl_booking.id_service = tbl_service.id_service JOIN tbl_mekanik on tbl_booking.id_mekanik = tbl_mekanik.id_mekanik JOIN tbl_acc on tbl_booking.id_acc = tbl_acc.id_acc where id_member='".$_SESSION['id_member']."' ");
		$databeranda['content']='booking/v_booking';
		$this->load->view('admin/home',$databeranda);
	}
	public function booking_admin()
	{
		
		$databeranda['tampil_s']=$this->db->query("select * from tbl_service");
		$databeranda['tampil_a']=$this->db->query("select * from tbl_acc");
		$databeranda['tampil_m']=$this->db->query("select * from tbl_member");
		$databeranda['tampil_me']=$this->db->query("select * from tbl_mekanik");
		$databeranda['tampil']=$this->db->query("SELECT tbl_member.id_member,tbl_member.nama,tbl_booking.*,tbl_service.paket_service,tbl_mekanik.nama_mekanik,tbl_acc.nama_acc FROM tbl_booking INNER JOIN tbl_service on tbl_booking.id_service = tbl_service.id_service JOIN tbl_mekanik on tbl_booking.id_mekanik = tbl_mekanik.id_mekanik JOIN tbl_acc on tbl_booking.id_acc = tbl_acc.id_acc JOIN tbl_member on tbl_booking.id_member = tbl_member.id_member");
		$databeranda['content']='booking/v_booking_admin';
		$this->load->view('admin/home',$databeranda);
	}

	public function simpan(){
			date_default_timezone_set("Asia/Jakarta");
			$date = date("Y-m-d H:i:s");
			$data['id_member']=$this->input->post("id_member");
			$data['id_service']=$this->input->post("id_service");
			$data['id_acc']=$this->input->post("id_acc");
			$data['id_mekanik']='1';
			$data['jam_booking']=$this->input->post("jam_booking");
			$data['tgl_booking']=$date;
			$data['s_service']='-';
			$data['total']=$this->input->post("total");
			$data['estimasi_selesai']='-';
 			$bayardp = date("Y-m-d H:i:s", strtotime($date . "+60 minutes"));
			$data['jam_bayar_dp']=$bayardp;
			$data['status_bayar']='0';
			$data['jumlah_dp']='0';

			 // print_r($data['jam_bayar_dp']);die;
			//print_r($data);die;
			$tambah = $this->RsModel->TambahData("tbl_booking",$data);
			 	$q1=$this->db->query("SELECT * from tbl_member where id_member = '".$_SESSION['id_member']."' ")->result_array();
			 	// print_r($q1[0]['email']);die;
		$from_email = "thisbagus4@gmail.com"; 
        $to_email = $q1[0]['email']; 
         // print_r($to_email);die;

        $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => $from_email,
                'smtp_pass' => 'bepe1995',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");   
         $this->email->from($from_email, 'Hermon motor '); 
         $this->email->to($to_email);
         $this->email->subject('Notif Waktu Pembayaran DP'); 
         $this->email->message('Silahkan datang ke Toko Kami dan Lakukan Pembayaran DP sebelum '.$bayardp.' Jika Tidak Melakukan Pembayaran DP maka booking Anda kami nyatakan batal.'); 

         //Send mail 
         //print_r($this->email->send());die;
         if($this->email->send()){
         	//echo "wowkwo berhasul";
            //$this->session->set_flashdata("notif","Email berhasil terkirim."); 
         }else {
         	 //show_error($this->email->print_debugger());   
         	// echo "wowkwo gagl";
                // $this->session->set_flashdata("notif","Email gagal dikirim."); 
                // $this->load->view('home'); 
         } 
			
			
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah, Silahkan Cek email anda untuk mengetahui Pembayaran DP.</div>");
			header('location:'.base_url().'Booking');
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$where=array('id_booking'=>$id);
		$this->RsModel->HapusData('tbl_booking',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'Booking');
	}
	public function hapus_oto($id){
		// $id=$this->uri->segment(3);
		$where=array('id_booking'=>$id);
		$this->RsModel->HapusData('tbl_booking',$where);
		$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil dihapus</div>");
		header('location:'.base_url().'Booking');
	}

	public function edit(){
			$where['id_booking']=$this->input->post('id_booking');
			
			$data['id_mekanik']=$this->input->post("id_mekanik");
			$data['s_service']=$this->input->post("s_service");
			$data['estimasi_selesai']=$this->input->post("estimasi_selesai");
			$data['jumlah_dp']=$this->input->post("jumlah_dp");
			$data['status_bayar']=$this->input->post("status_bayar");

			//print_r($where);die;
			$this->RsModel->EditData("tbl_booking",$data,$where);
			$this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil diedit</div>");
			header('location:'.base_url().'BookingAdmin');

	}

	public function notif_hapus(){
		$q=$this->db->query("select * from tbl_booking where status_bayar='0'")->result_array();
		// print_r($q);die;
		date_default_timezone_set("Asia/Jakarta");
		$date = date("Y-m-d H:i:s");

		
      	$curent = strtotime(date("Y-m-d h:i:sa"));

  //     	print_r(strtotime($date).', ');
		// print_r($curent);die;
		foreach ($q as $key => $value) {
			$jatuh_t_b = strtotime($value['jam_bayar_dp']);
			if ($jatuh_t_b == $curent) {
				$this->hapus_oto($value['id_booking']);
				$data = array(
		  			 'id_booking' => $value['id_booking']
				);
				echo json_encode($data);
			}elseif ($curent > $jatuh_t_b) {
				$this->hapus_oto($value['id_booking']);
				$data = array(
		  			 'id_booking' => $value['id_booking']
				);
				echo json_encode($data);
			}
		}

	}

	public function notif_booking(){
		$q = $this->db->query("select count(id_member) as notif from tbl_booking where s_service ='-' ")->result_array();
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

}
