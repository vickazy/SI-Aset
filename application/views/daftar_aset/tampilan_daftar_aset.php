<?php
 $tipe= $this->session->userdata('tipe');
 ?>
 <?php  if ($tipe == 'admin') {?>
          <div class="row">
          <div class="box-header">
                  <h2>Tabel Pelaporan Aset</h2> 
                </div>
            <div class="col-xs-16">

              <div class="box">
              
                <div class="box-header clearfix">
                <a href="<?php echo base_url()?>index.php/daftar_aset/pencatatan/" class="btn btn-default pull-right">Input Aset  &nbsp<i class="fa fa-plus"></i></a> 
                <a href="<?php echo base_url()?>index.php/daftar_aset/cetakdata/" class="btn btn-default pull-right">Print  &nbsp<i class="fa fa-print"></i></a>
                    <?php //if($_SESSION['akses']==1){?><?php// }?>
          <h3 class="box-title">Tabel Daftar Aset</h3>
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
                      <th>ID Usul</th>
                      <th>Kondisi</th>
                      <th>Pengguna</th>
                      <th>Status</th>
                      <th>Aksi</th>
                      
           
                        
                      </tr>
                    </thead>
                    <tbody>
                    
                    
                      
                      <?php 
                      $this->db->select('*');
                       $this->db->from('data_aset');
                       $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
                      $this->db->order_by("kode", "asc"); 

                      $data=$this->db->get();
                      foreach ($data -> result() as $row) {
                      ?>
                      <tr>
                        
                        <td><?php echo $row->jenis.'-'.$row->kode;?></td>
                        <td><a href="<?php echo base_url()?>index.php/persetujuan/detil/<?php echo $row->id_usul; ?>"><?php echo $row->id_usul; ?></a> </td>
                        <td><?php echo $row->kondisi;?></td>
                        <td><?php echo $row->id_users;?></td>
                        <td><?php 
                        if($row->status==0)
                        {
                          echo "Dipinjamkan";
                                                                
                        }
                        else
                          {
                            echo "Tidak Dipinjamkan";
                            }?>
                        </td>
<td><div class="btn-group">
              <a href="<?php echo base_url()?>index.php/daftar_aset/edit/<?php echo $row->i; ?>" class="btn btn-sm btn-default" title='Ubah'><i class="fa fa-edit"></i></a>

              <a href="<?php echo base_url()?>index.php/daftar_aset/delete/<?php echo $row->i; ?>" class="btn btn-sm btn-default" title='Hapus' onclick="return confirm('Anda yakin ingin menghapus data aset <?php /*echo " $mk | $ta"*/ ?>?')" ><i class="fa fa-remove"></i></a></div>
               
              
             
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
                  <h2>Daftar Aset</h2> 
                </div>
            <div class="col-xs-16">

              <div class="box">

              
                <div class="box-header clearfix">
                
          <h3 class="box-title">Daftar Aset yang Boleh Dipinjam</h3>
         
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
                      <th>Aksi</th>
                      
           
                        
                      </tr>
                    </thead>
                    <tbody>

                      <?php 
                      $this->db->select('*');
                      $this->db->from('pinjam_aset');
                      $this->db->join('data_aset', 'data_aset.i=pinjam_aset.i');
                      $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
                      $this->db->join('pengusulan', 'pengusulan.id_usul = data_aset.id_usul');
                      $this->db->where('data_aset.id_user', 'jurusan');
                      $this->db->where('data_aset.kondisi', 'baik');
                      $this->db->where('data_aset.status', 0);
                      $this->db->order_by("kode", "asc"); 

                      $data=$this->db->get();
                      foreach ($data -> result() as $row) {
                      ?>
                      <tr>
                        <td name="i"><?php echo $row->jenis.'-'.$row->kode;?></td>
                        <td><?php echo $row->nama_barang;?></td>
                        <td><div class="btn-group">
                        <a href="<?php echo base_url()?>index.php/peminjaman/konfirm/<?php echo $row->i; ?>" class="btn btn-primary">Pinjam</a>

              
             
            </td>
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
