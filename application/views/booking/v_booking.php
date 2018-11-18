<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');



?>

</div>

				<div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Booking Service</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" name="autoSumForm" action="<?php echo base_url()?>SimpanBooking" method="post">
                                   
                                    <div class="box-body">
                                      <input type="hidden" name="id_member" value="<?php echo $_SESSION['id_member']; ?>">
                                   <div class="form-group">
                                            <label>Paket Service</label>
                                            
                                                <?php
                                                    
                                                    $jsArray = "var prdName = new Array();\n";
                                                    echo '
                                                          <select name="id_service" class="form-control" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">
                                                   ';
                                                     foreach ($tampil_s->result_array() as $key => $row) {
                                                    
                                                   echo '
                                                  <option value="' . $row['id_service'] . '">' . $row['paket_service'] . '</option>';
                                                   $jsArray .= "prdName['" . $row['id_service'] . "'] = '" . addslashes($row['harga_service']) . "';\n";
                                                     }
                                                     echo '
                                                     </select>';
                                                  ?>
                                                  
                                           <!--  </select> -->
                                        </div> 
                                      
                                        <div class="form-group">
                                            <label>Harga Service</label>
                                            <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" id="prd_name" name="harga_service" placeholder="Harga" required readonly>
                                        </div>
                                        <script type="text/javascript">
                                                    <?php echo $jsArray; ?>
                                                    </script>    

<div class="form-group">
                                            <label>Nama Aksesoris</label>
                                            
                                                <?php
                                                   
                                                    $jsArraya = "var prdNamea = new Array();\n";
                                                    echo '
                                                          <select name="id_acc" class="form-control" onchange="document.getElementById(\'prd_namea\').value = prdNamea[this.value]">
                                                   ';
                                                     foreach ($tampil_a->result_array() as $key => $rowa) {
                                                  
                                                   echo '
                                                  <option value="' . $rowa['id_acc'] . '">' . $rowa['nama_acc'] . '</option>';
                                                   $jsArraya .= "prdNamea['" . $rowa['id_acc'] . "'] = '" . addslashes($rowa['harga_acc']) . "';\n";
                                                     }
                                                     echo '
                                                     </select>';
                                                  ?>
                                                  
                                         
                                        </div> 
                                    
                                        <div class="form-group">
                                            <label>Harga Aksesoris</label>
                                            <input type="text" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" id="prd_namea" name="harga_acc" placeholder="Harga" required readonly>
                                        </div>
                                        <script type="text/javascript">
                                                    <?php echo $jsArraya; ?>
                                                    </script>  

                                      <div class="bootstrap-timepicker">
                                       <div class="form-group">
                                          <label>Jam Service</label>

                                          <div class="input-group">
                                            <input type="text" name="jam_booking" class="form-control timepicker">

                                            <div class="input-group-addon">
                                              <i class="fa fa-clock-o"></i>
                                            </div>
                                          </div>
                                          <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label>Total Service</label>
                                            <input type="text" class="form-control" value='0' onchange='tryNumberFormat(this.form.thirdBox);' name="total" placeholder="Total Harga" required readonly>
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
                        <div class="col-md-8">
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
                                                <th>Paket Service</th>
                                                <th>Nama Aksesoris</th>
                                                <th>Nama Mekanik</th>
                                                <th>Jam Service</th>
                                                <th>Maksimal Pembayaran DP</th>
                                                <th>Tanggal Booking</th>
                                                <th>Status Service</th>
                                                <th>Status Bayar DP</th>
                                                <th>Total Service</th>
                                                <th>Jumlah Bayar Dp</th>
                                                <th>Estimasi Selesai</th>
											                       <th>Action</th>

                                            </tr>
                                        </thead>
                                        <?php
                        $a=1;
                        foreach ($tampil_member->result_array() as $key) {
                      ?>
                      <tr>
                      <td><?php echo $a; ?></td>
                                  
                      <td><?php echo $key["paket_service"];?></td> 
                      <td><?php echo $key["nama_acc"];?></td>
                                            <td><?php echo $key["nama_mekanik"];?></td>
                                            <td><?php echo $key["jam_booking"];?></td> 
                                            <td><?php echo $key["jam_bayar_dp"];?></td>
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
                                              <!-- <td><?php echo $key["s_service"];?></td>  -->
                                              <?php if ($key["status_bayar"] == '0') { ?>
                                                  <td><small class="label bg-yellow">Belum Membayar DP</small></td>
                                             <?php }elseif($key["status_bayar"] == '1') { ?>
                                                  <td><small class="label bg-primary">Sudah Membayar DP</small></td>
                                                <?php } ?>
                                             <td><?php echo $key["total"];?></td> 
                                             <td><?php echo $key["jumlah_dp"];?></td> 
                                              <?php if ($key["estimasi_selesai"] == '-') { ?>
                                              <td><small class="label bg-yellow">Masi Dalam Antrian</small></td>
                                             <?php }else{ ?>
                                                <td><?php echo $key["estimasi_selesai"];?></td>
                                             <?php } ?>
                      <td><button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_booking"]; ?>')">Hapus</button>
                                          <!--   <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_mekanik"]; ?>','<?php echo $key["nama_mekanik"]; ?>')">Edit</button>  -->
                      </tr>
                    <?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           
                       <!--  </div>/.col (right)  -->
                <!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script>     -->
<script type="text/javascript">

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){


one = document.autoSumForm.harga_service.value;
two = document.autoSumForm.harga_acc.value; 

document.autoSumForm.total.value = (one * 1) + (two * 1);


}

function stopCalc(){
clearInterval(interval);}

</script>
<script type="text/javascript">

function hapus($id){
	var	conf=window.confirm('Data Akan Dihapus ?');
	if (conf) {
		document.location='<?php echo base_url(); ?>ControllerBooking/hapus/'+$id;
	}
}

// function edit(id,nama,harga,jenis){
	
//     $('#id').val(id);
	
   
// 	$('#nm').val(nama);
// 	$('#hg').val(harga);
//     $('#jn').val(jenis);
   
// }



</script>

