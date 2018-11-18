<div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chat Room</h3>
              
            </div>
            <!-- /.box-header -->
            <form action="<?php echo base_url()?>SimpanChat" method="post">
            <div class="box-body">
             

             <div class="form-group">
                        <label>Nama</label><br>
                        <input type="hidden" name="id_member" value="<?php echo $_SESSION['id_untuk_chat']; ?>">
                        <input type="text" class="form-control" value="<?php echo $_SESSION['nama']; ?>" placeholder="Nama Anda" readonly>
                     
            </div>
            <div class="form-group">
                        <label>Chat Room</label><br>
                       <textarea name="text" class="form-control" placeholder="Text Anda"></textarea>
            </div>
            <div class="form-group">
                        <label>Chat Room</label><br>
                        <div style="overflow-y: scroll; height:300px;"> 
                          <?php
                          
                          if ($tampil->num_rows() != 0) {
                            foreach($tampil->result_array() as $row){ ?>
                            
                            <div class="form-group">

                              <label><br>Nama : </label> <?php echo $row['nama'] ?><br>
                              <label><br>Text : </label> <?php echo $row['text'] ?><br>
                              <hr size="1px;">
                            </div> 
                       <?php
                          }
                          }
                      ?>
                          
                          


                        </div>
            </div>

                  <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                    </div>
            <!-- <div class="box-footer">
              <input type="submit" name="submit">
                <a href="./" class="btn btn-success btn-warning fa fa-save"> Kirim Komentar</a>
                </div> -->
            <!-- /.box-body -->
            </form>
          </div>

          <!-- /.box -->
        </div>
            