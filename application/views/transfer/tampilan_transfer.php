<?php
 $tipe= $this->session->userdata('tipe');
 ?>
 <?php  if ($tipe == 'admin') {?>
          <div class="row">
          <div class="box-header">
                  <h2>Permintaan Transfer Aset</h2> 
                </div>
            <div class="col-xs-16">

              <div class="box">
              
                <div class="box-header clearfix">
                <a href="<?php echo base_url()?>index.php/transfer/transfer_aset" class="btn btn-default pull-right">Transfer Aset  &nbsp &nbsp<i class="fa fa-plus"></i></a>
                    
          <h3 class="box-title">Tabel Permintaan</h3>
               </div><!-- /.box-header -->
                <div class="box-body">
        <?php $info = $this->session->flashdata('info'); 
          if(!empty($info))
            {
              echo "<p style='color:skyblue'><strong>$info<strong></p>";
              }?>
                 <table id="example1" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>Penerima</th>
                      <th>Kode Aset</th>
                      <th>Nama Aset</th>
                      <th>Status Transfer</th>
                      <th>Aksi</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                    
                    
                     <?php 
                      $this->db->select('*');
                       $this->db->from('perpindahan');
                        $this->db->join('data_aset', 'data_aset.i=perpindahan.i');
                        $this->db->join('pengusulan', 'pengusulan.id_usul=data_aset.id_usul');
                       $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
                      $this->db->order_by("kode", "asc"); 

                      $data=$this->db->get();
                      foreach ($data -> result() as $row) {
                      ?>
                      <tr>
                        <td><?php echo $row->id_penerima;?></td>
                        <td><?php echo $row->jenis.'-'.$row->kode;?></td>
                        <td><?php echo $row->nama_barang;?> </td>
                        <td><?php 
                        if($row->status_transfer==0)
                        {
                          echo "Belum Disetujui";
                                                                
                        }
                        else if($row->status_transfer==1)
                          {
                            echo "Disetujui";
                            }
                        else if ($row->status_transfer==2) {
                          echo "Ditolak";
                        }?>
                        </td>
              <td><div class="btn-group">
              <a href="<?php echo base_url()?>index.php/transfer/delete/<?php echo $row->id_perpindahan; ?>" class="btn btn-sm btn-default" title='Hapus' onclick="return confirm('Anda yakin ingin menghapus data aset?')" ><i class="fa fa-remove"></i></a></div>
               
              
             
            </td>
             </tr>
                <?php }?>         
                        
             
                      
                    
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->      
          <?php }
            else
            {?>

         <div class="row">
          <div class="box-header">
                  <h2>Permintaan Transfer Aset</h2> 
                </div>
            <div class="col-xs-16">

              <div class="box">
              
                <div class="box-header clearfix">
                
                    
          <h3 class="box-title">Tabel Permintaan</h3>
               </div><!-- /.box-header -->
                <div class="box-body">
        <?php $info = $this->session->flashdata('info'); 
          if(!empty($info))
            {
              echo "<p style='color:skyblue'><strong>$info<strong></p>";
              }?>
                 <table id="example1" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>Kode Aset</th>
                      <th>Nama Aset</th>
                      <th>Status Transfer</th>
                      <th>Aksi</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                    
                    
                     <?php 
                      $this->db->select('*');
                       $this->db->from('perpindahan');
                        $this->db->join('data_aset', 'data_aset.i=perpindahan.i');
                        $this->db->join('pengusulan', 'pengusulan.id_usul=data_aset.id_usul');
                        $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
                        $x = 0;
                        $x = $x + $this->session->userdata('id');
                        $this->db->where('id_penerima', $x);

                      $this->db->order_by("kode", "asc"); 

                      $data=$this->db->get();
                      foreach ($data -> result() as $row) {
                      ?>
                      <tr>
                        <td><?php echo $row->jenis.'-'.$row->kode;?></td>
                        <td><?php echo $row->nama_barang;?> </td>
                        <td><?php if($row->status_transfer==0)
                        {
                          echo "Belum Disetujui";
                                                                
                        }
                        else if($row->status_transfer==1)
                          {
                            echo "Disetujui";
                            }
                        else if ($row->status_transfer==2) {
                          echo "Ditolak";
                        }?>
                        </td>

              <td><div class="btn-group">
              <?php if($row->status_transfer==0)
              {?> 
              <a  href="<?php echo base_url()?>index.php/transfer/terima/<?php echo $row->id_perpindahan; ?>" class="btn btn-sm btn-default" title='Terima'><i class="fa fa-edit"></i></a>

              <a  href="<?php echo base_url()?>index.php/transfer/tolak/<?php echo $row->id_perpindahan; ?>" class="btn btn-sm btn-default" title='Tolak' ><i class="fa fa-remove"></i></a>
               <?php }?>  
                <?php if($row->status_transfer!=0)
              {?> 
              <a  disabled href="<?php echo base_url()?>index.php/transfer/terima/<?php echo $row->id_perpindahan; ?>" class="btn btn-sm btn-default" title='Terima'><i class="fa fa-edit"></i></a>

              <a  disabled href="<?php echo base_url()?>index.php/transfer/tolak/<?php echo $row->id_perpindahan; ?>" class="btn btn-sm btn-default" title='Tolak' ><i class="fa fa-remove"></i></a>
               <?php }?>  
                
             
            </td></div>
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
