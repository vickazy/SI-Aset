<?php
 $tipe= $this->session->userdata('tipe');
 ?>
         <div class="row">
          <br>
            <div class="col-xs-16">

              <div class="box">
              
                     <div class="box-body">
                 <?php $info = $this->session->flashdata('info'); 
          if(!empty($info))
            {
              echo "<p style='color:skyblue'>$info</p>";
              }?>
              <div style="margin-left:20%;margin-right:20%">
                 <table id="example1" class="table table-hover table-bordered table-striped">
                    <?php 
                      foreach ($data -> result() as $row) {
                      ?>
                      <tr>
                      <td><strong>No Usulan  </strong></td><td><?php echo $row->id_usul;?></td></tr>
                      <tr><td><strong>Pengusul  </strong></td><td><?php echo $row->id_user;?></td></tr>
                      <tr><td><strong>Nama  </strong></td> <td><?php echo $row->nama_barang;?></td></tr>
                      <tr><td><strong>Harga </strong> </td> <td><?php echo $row->harga_pasaran;?></td></tr>
                      <tr><td><strong>Jumlah </strong></td> <td><?php echo $row->jumlah_barang;?></td></tr>
                      <tr><td><strong>Total </strong></td><td><?php echo $row->total_biaya;?></td></tr>
                      <tr><td><strong>Spesifikasi  </strong></td> <td><?php echo $row->spesifikasi;?></td></tr>
                      <tr><td><strong>Merk </strong></td><td><?php echo $row->merk;?></td> </tr>      
                      <tr><td><strong>Gambar </strong></td><td><a href="<?php echo base_url()."file/".$row->gambar;?>" target="_blank"><img width="200" height="100" src="<?php echo base_url()."file/".$row->gambar;?>"/></a></td></tr>
                      <tr><td><strong>Keterangan </td><td><?php echo $row->keterangan;?></td></tr>
                      <?php if ($tipe == 'admin')
                      {if($row->status!=1){
                        ?>
                         <tr><td><strong>Aksi </strong></td><td><a type="submit" class ="btn btn-sm btn-default" href="<?php echo base_url()?>index.php/persetujuan/setujui/<?php echo $row->id_usul; ?>"><i class="fa fa-edit">Setujui</i></a> &nbsp 
                       <a type="submit" class ="btn btn-sm btn-default" style ="color:red"href="<?php echo base_url()?>index.php/persetujuan/tolak/<?php echo $row->id_usul; ?>"><i class="fa fa-remove">Tolak</i></a></td></tr>
                       <?php }}
                       else {
                        echo '<tr><td><strong>Status </strong></td><td>'; 
                        if($row->status ==0)
                          {
                            echo "<span class='label label-warning'> Belum Diproses</span>" ;
                          }
                          else if ($row->status ==1)
                          {
                            echo '<span class="label label-success"> Disetujui</span>' ;
                          }
                          else if($row->status == 2){
                            echo '<span class="label label-danger"> Ditolak</span>';
                          }
                        echo'</td> </tr>';      
                       }
                  } ;        
                  ?>
                        
                     </table>
                     </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->      
          
            
         
  
    <script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
   
   <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
