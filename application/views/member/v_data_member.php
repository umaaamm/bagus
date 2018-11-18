<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');

?>
</div>
						

                            

 <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data Member</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="<?php echo base_url()?>ControllerMember/edit_member" method="post">
                                   
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" >

                                       
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" id="nm" class="form-control" name="nama" placeholder="Nama" required>
                                        </div>
                                         <div class="form-group">
                                            <label>No Hp</label>
                                            <input type="text" id="hp" class="form-control" name="no_hp" placeholder="No Hp" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                           <!--  <input type="text" id="hp" class="form-control" name="no_hp" placeholder="No Hp" required> -->
                                           <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Merk Motor</label>
                                            <input type="text" id="mm" class="form-control" name="merk_motor" placeholder="Merk Motor" required>
                                        </div>    
                                        <div class="form-group">
                                            <label>Type Motor</label>
                                            <input type="text" id="tm" class="form-control" name="type_motor" placeholder="Type Motor" required>
                                        </div>       
                                        <div class="form-group">
                                            <label>Plat Motor</label>
                                            <input type="text" id="pm" class="form-control" name="plat_motor" placeholder="Plat Motor" required>
                                        </div>    
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" id="us" class="form-control" name="username" placeholder="Username" required>
                                        </div>    
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" id="ps" class="form-control" name="password" placeholder="Password" required>
                                        </div>   
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" id="em" class="form-control" name="email" placeholder="Email" required>
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
        </div>         <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Data Member</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="Admin" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
											
                                            
                                            
											<th>Nama</th>
											<th>No Hp</th>
                                            <th>Merk Motor</th>
                                            <th>Type Motor</th>
                                            <th>Plat Motor</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            
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
											<td><?php echo $key["no_hp"];?></td>
                                          <td><?php echo $key["merk_motor"];?></td>  
                                            <td><?php echo $key["type_motor"];?></td>
                                            <td><?php echo $key["plat_motor"];?></td>    
                                            <td><?php echo $key["username"];?></td>
                                            <td><?php echo $key["password"];?></td>    
                                            <td><?php echo $key["email"];?></td>
                                              <td><?php echo $key["level"];?></td>
											<td><!-- <button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_member"]; ?>')">Hapus</button> -->
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_member"]; ?>','<?php echo $key["nama"]; ?>','<?php echo $key['no_hp'];?>','<?php echo $key['merk_motor'];?>','<?php echo $key['type_motor'];?>','<?php echo $key['plat_motor'];?>','<?php echo $key['username'];?>','<?php echo $key['password'];?>','<?php echo $key['email'];?>')">Edit</button> 
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
		document.location='<?php echo base_url(); ?>ControllerMember/hapus/'+$id;
	}
}

function edit(id,nama,no_hp,merk_motor,type_motor,plat_motor,username,password,email){
	
    $('#id').val(id);
	$('#nm').val(nama);
    $('#hp').val(no_hp);
    $('#mm').val(merk_motor);
    $('#tm').val(type_motor);
	$('#pm').val(plat_motor);
	$('#us').val(username);
    $('#ps').val(password);
    $('#em').val(email);
    
}



</script>

