<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerRating extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    
    // $databeranda['tampil']=$this->db->query("select * from tbl_rating");
    $databeranda['content']='rating/v_rating';
    $this->load->view('admin/home',$databeranda);
  }
  public function simpan(){
      $data['id_member']=$this->input->post("id_member");
      $data['rating']=$this->input->post("rating");
      
      
      
      //print_r($data);die;
      $this->RsModel->TambahData("tbl_rating",$data);
      $this->session->set_flashdata("notif","<div class='alert alert-success'>Data berhasil ditambah</div>");
      header('location:'.base_url().'Rating');
  }
  public function rating_admin(){
    $databeranda['rating'] = $this->db->query("SELECT SUM(rating)/count(rating) as jml_rating FROM tbl_rating");
    $databeranda['content']='rating/v_rating_admin';
    $this->load->view('admin/home',$databeranda);
  }
}
