<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');

// echo '<div class="notif_dp"></div>';


?>
<script>

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
//pendpatan
one = document.autoSumForm.harga_service.value;
 
two = document.autoSumForm.harga_acc.value; 
document.autoSumForm.total.value = (one * 1) + (two * 1);
//pengeluaran

}



function stopCalc(){
clearInterval(interval);}

</script>
</div>
						<div class="col-md-3">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Booking Service</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>ControllerBooking/edit" method="post">
                                   
                                    <div class="box-body">
                                      <input type="hidden" name="id_booking" id="id">
                                            <div class="form-group">
                                            <label>Nama Member</label>
                                            <input type="text" class="form-control" id="id_membera" placeholder="Nama Member" required readonly >
                                        </div>

                                        <div class="form-group">
                                            <label>Mekanik</label>
                                            <select class="form-control" id="id_mekanik" name="id_mekanik">
                                              <?php foreach($tampil_me->result_array() as $keyy)
                                              {
                                                ?>
                                                    <option value="<?php echo $keyy['id_mekanik'];?>"><?php echo $keyy['nama_mekanik'];?></option>

                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                          <label>Status Service</label>
                                          <select class="form-control" id="st" name="s_service">
                                          <option value="-">Dalam Antrian</option>
                                          <option value="1">Belum Dikerjakan</option>
                                          <option value="2">Sedang Dikerjakan</option>
                                          <option value="3">Selesai</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                          <label>Status DP</label>
                                          <select class="form-control" id="std" name="status_bayar">
                                          <option value="-">-- Pilih Status DP --</option>
                                          <option value="0">Belum Membayar DP</option>
                                          <option value="1">Sudah Membayar DP</option>
                                          
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label>Jumlah Pembayaran DP</label>
                                            <input type="text" class="form-control" id="jumlah_dp" name="jumlah_dp" placeholder="Jumlah DP" required>
                                        </div>
                                      <div class="bootstrap-timepicker">
                                       <div class="form-group">
                                          <label>Estimasi Selesai</label>

                                          <div class="input-group">
                                            <input type="text" name="estimasi_selesai" class="form-control timepicker">

                                            <div class="input-group-addon">
                                              <i class="fa fa-clock-o"></i>
                                            </div>
                                          </div>
                                          <!-- /.input group -->


                                        </div>

                                    </div>
                                    
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                            

 <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Aksesoris</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="<?php echo base_url()?>ControllerAcc/edit" method="post">
                                   
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" >

                                       
                                        <div class="form-group">
                                            <label>Nama Aksesoris</label>
                                            <input type="text" id="nm" class="form-control" name="nama_acc" placeholder="Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Aksesoris</label>
                                            <input type="text" id="hg" class="form-control" name="harga_acc" placeholder="Harga" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <input type="text" id="jn" class="form-control" name="jenis" placeholder="Jenis" required>
                                        </div>
                                        

                                         
                                    
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                </div>
            </div>
        </div>                           
                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-9">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Data Booking</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="Admin1" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Member</th>
                                                <th>Paket Service</th>
                                                <th>Nama Aksesoris</th>
                                                <th>Nama Mekanik</th>
                                                <th>Jam Booking</th>
                                                <th>Tanggal Booking</th>
                                                <th>Status Service</th>
                                                 <th>Maksimal Pembayaran DP</th>
                                                <th>Status Bayar DP</th>
                                                <th>Jumlah Bayar Dp</th>
                                                <th>Total Service</th>
                                                <th>Estimasi Selesai</th>
											                       <th>Action</th>

                                            </tr>
                                        </thead>
                                        <?php
                        $a=1;
                        foreach ($tampil->result_array() as $key) {

                      ?>
                       
                      <tr>
                      
                      <td><?php echo $a; ?></td>
                      <td><?php echo $key["nama"];?></td> 
                      <td><?php echo $key["paket_service"];?></td> 
                      <td><?php echo $key["nama_acc"];?></td>
                                            <td><?php echo $key["nama_mekanik"];?></td>
                                            <td><?php echo $key["jam_booking"];?></td> 
                                             <td><?php echo $key["tgl_booking"];?></td> 
                                             <?php if ($key["s_service"] == '-') { ?>
                                              <td><small class="label bg-yellow">Masi Dalam Antrian</small></td>
                                             <?php }elseif($key["s_service"] == '1') { ?>
                                                <td><small class="label bg-yellow">Belum Dikerjakan</small></td>
                                              <?php }elseif ($key["s_service"] == '2') { ?>
                                                <td><small class="label bg-yellow">Sedang Dikerjakan</small></td>
                                              <?php }elseif ($key["s_service"] == '3') { ?>
                                                <td><small class="label bg-yellow">Selesai</small></td>
                                              <?php  }?>

                                                <td><?php echo $key["jam_bayar_dp"];?></td>
<?php if ($key["status_bayar"] == '0') { ?>
                                                  <td><small class="label bg-yellow">Belum Membayar DP</small></td>
                                             <?php }elseif($key["status_bayar"] == '1') { ?>
                                                  <td><small class="label bg-primary">Sudah Membayar DP</small></td>
                                                <?php } ?>
<td><?php echo $key["jumlah_dp"];?></td>
                                              <!-- <td><?php echo $key["s_service"];?></td>  -->
                                             <td><?php echo $key["total"];?></td> 
                                              <?php if ($key["estimasi_selesai"] == '-') { ?>
                                              <td><small class="label bg-yellow">Masi Dalam Antrian</small></td>
                                             <?php }else{ ?>
                                                <td><?php echo $key["estimasi_selesai"];?></td>
                                             <?php } ?>
                      <td><!-- <button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_booking"]; ?>')">Hapus</button> -->
                                            <button class="btn btn-info btn-sm" onclick="edit('<?php echo $key["id_booking"]; ?>','<?php echo $key["nama"]; ?>','<?php echo $key["id_mekanik"]; ?>','<?php echo $key["s_service"]; ?>','<?php echo $key["status_bayar"]; ?>','<?php echo $key["jumlah_dp"]; ?>')">Edit</button> 
                      </tr>
                    <?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           
                       <!--  </div>/.col (right)  -->
                    

<script type="text/javascript">

function hapus($id){
	var	conf=window.confirm('Data Akan Dihapus ?');
	if (conf) {
		document.location='<?php echo base_url(); ?>ControllerBooking/hapus/'+$id;
	}
}

function edit(id,nama,id_mekanik,st,std,jml_dp){
	
    $('#id').val(id);
	
   
	$('#id_membera').val(nama);
	$('#id_mekanik').val(id_mekanik);
   $('#st').val(st);
   $('#std').val(std);
   $('#jumlah_dp').val(jml_dp);
   
}



</script>


