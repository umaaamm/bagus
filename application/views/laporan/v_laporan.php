<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
 <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Laporan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
    <form role="form" action="<?php echo base_url()?>LaporanFilter" method="post">
        <div class="col-md-3">
            <div class="form-group">
                <label>Pilih Berdasarkan Tanggal Booking</label>
       

                <div id="datetimepicker1" class="input-group date">
                    <input data-format="yyyy-MM-dd hh:mm:ss" class="form-control" name="tanggal1" type="text"></input>
                    <span class="input-group-addon add-on">
                        <i data-time-icon="glyphicon glyphicon-calendar" data-date-icon="glyphicon glyphicon-calendar">
                      </i>
                    </span>
                  </div>
                <br>
                <div id="datetimepicker2" class="input-group date">
                    <input data-format="yyyy-MM-dd hh:mm:ss" class="form-control" name="tanggal2" type="text"></input>
                    <span class="input-group-addon add-on">
                        <i data-time-icon="glyphicon glyphicon-calendar" data-date-icon="glyphicon glyphicon-calendar">
                      </i>
                    </span>
                  </div>
                <br>
                <button type="submit" name="filter" class="btn btn-primary">Lihat</button>
                 <!-- <button type="submit" name="cetak" class="btn btn-primary">Cetak</button> -->
                
            </div>

    
</div>

                        <!-- right column -->
                           <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Laporan Service</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="l3" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nama Member</th>
                                            <th>Alamat Member</th>
                                            <th>No Hp</th>
                                            <th>Paket Service</th>
                                            <th>Harga Service</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Nama Mekanik</th>
                                            <th>Jam Service</th>
                                            <th>Waktu Booking</th>
                                            <th>Estimasi Selesai</th>
                                            <th>Total Bayar</th>
                                            </tr>
                                        </thead>
                                        
                                            <?php
                                                $a=1;
                                                foreach ($hasil->result_array() as $key) {
                                            ?>
                                            <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $key["nama"];?></td>
                                            <td><?php echo $key["alamat"];?></td>
                                            <td><?php echo $key["no_hp"];?></td> 
                                            <td><?php echo $key["paket_service"];?></td>
                                            <td><?php echo $key["harga_service"];?></td>
                                            <td><?php echo $key["nama_acc"];?></td> 
                                            <td><?php echo $key["harga_acc"];?></td>
                                            <td><?php echo $key["nama_mekanik"];?></td> 
                                            <td><?php echo $key["jam_booking"];?></td> 
                                            <td><?php echo $key["tgl_booking"];?></td> 
                                            <td><?php echo $key["estimasi_selesai"];?></td> 
                                            <td><?php echo $key["total"];?></td> 
                                            </tr>
                                        <?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           </div>
                     