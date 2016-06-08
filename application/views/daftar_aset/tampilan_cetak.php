<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Aset</title>
	<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
     <script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    
</head>
<body onload="window.print()"><center>
<br>
<br>
<h1>Data Aset Jurusan Sistem Informasi</h1>
<br>
<br>
</center>

<div class="col-md-12">
								 <table class="table table-striped">
   								 <thead>
                 
                      <tr>
                      <th>No</th>
                      <th>Kode Aset</th>
                      <th>Nama Aset</th>
                      <th>Merk</th>
                      <th>Spesifikasi</th>
                      <th>Kondisi</th>
                      <th>Pengguna</th>
                      
                      
           
                        
                      </tr>
                    </thead>
                    <tbody>

<?php 
	$no=1;
                      $this->db->select('*');
                       $this->db->from('data_aset');
                       $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
                       $this->db->join('pengusulan', 'pengusulan.id_usul = data_aset.id_usul');
                      $this->db->order_by("kode", "asc"); 
                      $data=$this->db->get();
                     foreach ($data -> result() as $row) {
                      ?>
                      <tr>
                      	<td><?php echo $no++;?></td>
                       
                        <td><?php echo $row->jenis.'-'.$row->kode;?></td>
                        <td><?php echo $row->nama_barang;?></td>
                        <td><?php echo $row->merk;?></td>
                        <td><?php echo $row->spesifikasi;?></td>
                        <td><?php echo $row->kondisi;?></td>
                        <td><?php echo $row->id_users;?></td>
                        </tr>
                        
                         <?php }?>         
                        
             
                    </tbody>
                  </table>
</div>


</body>
</html>