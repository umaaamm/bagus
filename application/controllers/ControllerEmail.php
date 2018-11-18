<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerEmail extends CI_Controller {

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
		
	
		$databeranda['content']='emai/v_admin';
		$this->load->view('admin/home',$databeranda);
	}

	public function send_mail($email) { 

         $from_email = "thisbagus4@gmail.com"; 
         $to_email = $email; 
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
         $this->email->subject('Notif Waktu Service'); 
         $this->email->message('Silahkan datang ke Toko Kami Kendaraan Anda Sudah harus di Service.'); 

         //Send mail 
         //print_r($this->email->send());die;
         if($this->email->send()){
         	// echo "wowkwo berhasul";
                // $this->session->set_flashdata("notif","Email berhasil terkirim."); 
         }else {
         	 // show_error($this->email->print_debugger());   
         	// echo "wowkwo gagl";
                // $this->session->set_flashdata("notif","Email gagal dikirim."); 
                // $this->load->view('home'); 
         } 
      }

      public function send_mail_jam($email) { 

         $from_email = "thisbagus4@gmail.com"; 
         $to_email = $email;

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
         $this->email->from($from_email, 'Hermon motor'); 
         $this->email->to($to_email);
         $this->email->subject('Notif Waktu Service'); 
         $this->email->message('Silahkan datang ke Toko Kami Waktu service anda 30 menit lagi.'); 

         //Send mail 
         //print_r($this->email->send());die;
         if($this->email->send()){
         	// echo "wowkwo berhasul";
                // $this->session->set_flashdata("notif","Email berhasil terkirim."); 
         }else {
         	 // show_error($this->email->print_debugger());   
         	// echo "wowkwo gagl";
                // $this->session->set_flashdata("notif","Email gagal dikirim."); 
                // $this->load->view('home'); 
         } 
      }

      public function notif(){
      		// date_default_timezone_set("Asia/Jakarta");
  //       echo "The time is " . date("h:i A");
      	// print_r("wjwij");die;
      	// echo json_encode("wwowkowkowkokw");

      	$q=$this->db->query("SELECT tbl_member.*, DATE_ADD(tgl_booking, INTERVAL 30 DAY) as jatuh_tempo FROM tbl_booking INNER JOIN tbl_member ON tbl_booking.id_member = tbl_member.id_member WHERE tbl_booking.s_service = '3' ")->result();

      	foreach ($q as $row) {
      		$jatuh_t = strtotime($row->jatuh_tempo);
      		$curent = strtotime(date("Y-m-d h:i:sa"));
      		$mail = $row->email;
				
				
    		if ($curent == $jatuh_t) {
    			$this->send_mail($mail);
    		}

      	}
      	date_default_timezone_set("Asia/Jakarta");
      	$temp = date("h:i:s");
      	$q1=$this->db->query("SELECT tbl_member.*, timediff(jam_booking,'".$temp."') as notif_jam from tbl_booking INNER JOIN tbl_member ON tbl_booking.id_member = tbl_member.id_member")->result();

      	foreach ($q1 as $row1) {
      		$tmp = $row1->notif_jam;
      		$mail1 = $row1->email;
    		if ($tmp == '00:30:00') {
    			$this->send_mail_jam($mail1);
    		}

      	}
 		//print_r($q);die;
        // $curentt = strtotime(date("h:i A"));
        // $hasil= $curentt-1800;
      }
}
