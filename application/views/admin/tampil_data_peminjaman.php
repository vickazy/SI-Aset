<?php
 $tipe= $this->session->userdata('tipe');
 ?>
 <?php  if ($tipe == 'admin') {?>
 <div class="row">

</div> 

          <div class="box-header">
                  <h2>Peminjaman Aset</h2> 
                
            <div class="col-xs-16">
             <div class="box">
                   
                      
              
                <div class="box-header clearfix">
                   

          <h3 class="box-title">History Peminjaman</h3>
         
                </div><!-- /.box-header -->

                <div class="box-body">
               
                 <table id="example1" class="table table-hover table-bordered table-striped">
 
                    <thead>
                      <tr>
                     <th>ID_Pinjam</th>
                      <th>Peminjam</th>
                      <th>Kode Aset</th>
                      <th>Status</th>
                      <th>Waktu Pinjam</th>
                      
                      <th>Aksi</th>
                      <th>Denda</th>   
         
                      </tr>
                    </thead>

                    <tbody>

                   <?php   foreach ($data -> result() as $row) { ?> 
 
                      <tr>
                       
                        <td><?php echo $row->id_pinjam;?></td>
                        <td><?php echo $row->id_peminjam;?></td>
                        <td><?php echo $row->jenis.'-'.$row->kode;?></td>
                        <td><?php
                        if($row->lunas ==1)
                          {
                            echo "Dikembalikan";
                          }
                          else 
                          {
                            echo "Belum Dikembalikan";
                          
                          };?></td>
                        <td><?php echo $row->waktu_pinjam;?></td> 

                        <?php if ($row->lunas == 1 )
                        {?>
                         <td>
                          <a disabled href="<?php echo base_url()?>index.php/peminjaman/ubah_status/<?php echo $row->i;?>" class="btn btn-sm btn-default">Ubah Status Aset</a>&nbsp <a disabled href="<?php echo base_url()?>index.php/peminjaman/bayar_sanksi/<?php echo $row->id_pinjam;?>" class="btn btn-sm btn-default">Sanksi</a></td>
                       <?php }?>
                        <?php if ($row->lunas == 0)
                        {?>
                        <td>
                                       
                           <a  href="<?php echo base_url()?>index.php/peminjaman/ubah_status/<?php echo $row->i;?>" class="btn btn-sm btn-default">Ubah Status Aset</a> &nbsp    
                           <a href= "<?php echo base_url()?>index.php/peminjaman/bayar_sanksi/<?php echo $row->id_pinjam;?>" class="btn btn-sm btn-default">Sanksi</a>
                        
                        
                         </td>
                        <?php }?>
                          
                          
                       
                        <td><?php echo $row->denda;?></td>               
                          <?php }?>
                      </tr>

                
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
<?php } else{?>
<div class="row">

</div> 

          <div class="box-header">
                  <h2>Peminjaman Aset</h2> 
                
            <div class="col-xs-16">
             <div class="box">
                   
                      
              
                <div class="box-header clearfix">
                <a href="<?php echo base_url()?>index.php/peminjaman/aset_pinjam" class="btn btn-default pull-right">Pinjam Aset  &nbsp<i class="fa fa-plus"></i></a> 
               

          <h3 class="box-title">History Peminjaman</h3>
         
                </div><!-- /.box-header -->

                <div class="box-body">
               
                 <table id="example1" class="table table-hover table-bordered table-striped">
 
                    <thead>
                      <tr>
                     <th>ID_Pinjam</th>
                      <th>Peminjam</th>
                      <th>Kode Aset</th>
                      <th>Status</th>
                      <th>Waktu Pinjam</th>
                               
                      </tr>
                    </thead>

                    <tbody>

                   <?php   foreach ($data -> result() as $row) { ?> 
 
                      <tr>
                       
                        <td><?php echo $row->id_pinjam;?></td>
                        <td><?php echo $row->id_peminjam;?></td>
                        <td><?php echo $row->jenis.'-'.$row->kode;?></td>
                        <td><?php
                        if($row->cek == 0)
                          {
                            echo "Dikembalikan";
                          }
                          else
                           {
                            echo "Dipinjam";
                          };?></td>
                        <td><?php echo $row->waktu_pinjam;?></td>    
                       
                        <?php }?>
                                             
                        
                      </tr>

                
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          
 <?php };?>    
         
  
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