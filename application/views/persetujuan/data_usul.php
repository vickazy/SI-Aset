<?php
 $tipe= $this->session->userdata('tipe');
 ?>
 <?php  if ($tipe == 'admin') {?>  
 <div class="row">
          <div class="box-header">
                  <h2>Daftar Pengajuan Aset</h2> 
                </div>
            <div class="col-xs-16">

              <div class="box">
              
                <div class="box-header clearfix">
                
                    <?php //if($_SESSION['akses']==1){?><?php// }?>
          <h3 class="box-title">Tabel Pengusulan Pengadaan Aset</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <table id="example1" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                      <th><center>No Usulan</center></th>
                      <th>Pengusul</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                      <th>Spesifikasi</th>
                      <th>Merk</th>      
                      <th>Gambar</th>
                      <th>Keterangan</th>
                       
           
                        
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                      foreach ($data -> result() as $row) {
                      ?>
                      <tr>
                      
                      
                        <td><center><?php echo $row->id_usul;?></center></td>
                        <td><?php echo $row->id_user;?></td>
                        <td><?php echo $row->nama_barang;?></td>
                        <td><?php echo $row->harga_pasaran;?></td>
                        <td><?php echo $row->jumlah_barang;?></td>
                        <td><?php echo $row->total_biaya;?></td>
                        <td><?php echo $row->spesifikasi;?></td>
                        <td><?php echo $row->merk;?></td>
                        <td><a href="<?php echo base_url()."file/".$row->gambar;?>" target="_blank"><img width="80" height="40" src="<?php echo base_url()."file/".$row->gambar;?>"/></a></td>
                        <td><?php echo $row->keterangan;?></td>
                        
                                                </tr>  
        
                <?php }?>
                        
                   
                    
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <?php }?>
  
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
