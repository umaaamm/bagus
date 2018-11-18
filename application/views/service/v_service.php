<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
						<div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Kelola Data Paket Service</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>SimpanService" method="post">
                                   
                                    <div class="box-body">
                                       
                                    
                                        <div class="form-group">
                                            <label>Paket Service</label>
                                            <input type="text" class="form-control" name="paket" placeholder="Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Service</label>
                                            <input type="text" class="form-control" name="harga" placeholder="Harga" required>
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
                        <h4 class="modal-title" id="myModalLabel">Edit Paket Service</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="<?php echo base_url()?>ControllerService/edit" method="post">
                                   
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" >

                                       
                                        <div class="form-group">
                                            <label>Paket Service</label>
                                            <input type="text" id="nm" class="form-control" name="paket" placeholder="Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Service</label>
                                            <input type="text" id="hg" class="form-control" name="harga" placeholder="Harga" required>
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
                                    <h3 class="box-title">Data Paket Service</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="Admin" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
											
                                            
                                            
											<th>Paket Service</th>
											<th>Harga Service</th>
                                            
                                            
                                            
											<th>Action</th>

                                            </tr>
                                        </thead>
                                        
											<?php
												$a=1;
												foreach ($tampil->result_array() as $key) {
											?>
											<tr>
											<td><?php echo $a; ?></td>
											
                                           
											<td><?php echo $key["paket_service"];?></td>	
											<td><?php echo $key["harga_service"];?></td>
                                          
											<td><button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_service"]; ?>')">Hapus</button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_service"]; ?>','<?php echo $key["paket_service"]; ?>','<?php echo $key['harga_service'];?>')">Edit</button> 
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
		document.location='<?php echo base_url(); ?>ControllerService/hapus/'+$id;
	}
}

function edit(id,nama,harga){
	
    $('#id').val(id);
	
   
	$('#nm').val(nama);
	$('#hg').val(harga);
    
}



</script>

