<style>
.slidecontainer {
    width: 100%;
    padding-left: 10px;
    padding-bottom: 10px;
    padding-right: 10px;
    padding-top: 10px;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 35px;
    height: 35px;
    border: 0;
    background: url("<?php echo base_url();?>asset/a.png");
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 35px;
    height: 35px;
    border: 0;
    background: url("<?php echo base_url();?>asset/a.png");
    cursor: pointer;
}
</style>
<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');

$hasil = $rating->result_array() ;
// print_r($hasil[0]['jml_rating']);die;
?>
</div>
<div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Rating</h3>
              
            </div>
            <!-- <form action="<?php echo base_url()?>SimpanRating" method="post"> -->
<div class="slidecontainer">
   
  <input type="range" min="0" max="5" name="rating" value="<?php echo $hasil[0]['jml_rating'] ?>" class="slider" id="myRange">
</div>

<div class="box-footer">
                                        <!-- <button type="submit" class="btn btn-primary">Simpan</button>     -->
                                    Jumlah Rating Anda : <?php echo $hasil[0]['jml_rating'] ?> 
                                    <br>
                                    <br>
                                    <b>Keterangan :</b>
                                    <br>
                                     <li>5 : Sangat Memuaskan</li>
                                     <li>4 : Cukup Memuaskan</li>
                                     <li>3 : Memuaskan</li>
                                     <li>2 : Tidak Memuaskan</li>
                                     <li>1 : Sangat Tidak Memuaskan</li>
                                    </div>
                                    <!-- </form> -->
</div>
</div>