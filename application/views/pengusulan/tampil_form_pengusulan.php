<br>
			<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Form Pengajuan Aset </h3> <br>
                
                   <?php echo form_open_multipart('pengusulan/usulan');?>
                
                 <?php $info = $this->session->flashdata('info'); 
          if(!empty($info))
            {
              echo "<p style='color:skyblue'><strong>$info<strong></p>";
              }?>
                </div> <!-- /.box-header -->
                <!-- form start -->
				
                <!--<form role="form" action="<?php //echo base_url()?>index.php/pengusulan/usulan" method="post" enctype="multipart/form-data" >-->
               
            
                  <div class="box-body">
					<div class="form-group">
					
					<label for="pengusulan">Nama Barang </label>
					<input style="" type="text" class="form-control"  name="nama_barang" value="" id="nama" required >
                                         
                    </div>
                    <div class="form-group">
					
					<label for="pengusulan">Harga Pasaran</label>
					<input style="" type="text" class="form-control"  name="harga_pasaran" value="" id="harga" required>
                    
                    </div>
                    <div class="form-group">
                    <label for="pengusulan">Jumlah</label>
					<input style="" type="text" class="form-control"  name="jumlah_barang" id ="jumlah" value="" required>
                      
                    </div>

                    <div class="form-group">
                    <label for="pengusulan">Total Biaya</label>
					<input style="" type="text" class="form-control"  name="total_biaya" id ="total" value="" required>
                      
                    </div>

                    <div class="form-group">
                    <label for="pengusulan">Spesifikasi</label>
				<input style="" type="text" class="form-control"  name="spesifikasi" id ="spesifikasi" value="" required>
                      
                    </div>

                    <div class="form-group">
                    <label for="pengusulan">Merk</label>
					<input style="" type="text" class="form-control"  name="merk" id ="merk" value="" required >
                      
                    </div>

                    <div class="form-group">
                    <label for="pengusulan">Gambar</label>
					<input  type="file" class="form-control"  name="gambar" id ="gambar" required>
                      
                    </div>

                    <div class="form-group">
                    <label for="pengusulan">Keterangan</label>
					<input style="" type="text" class="form-control"  name="keterangan" id ="ket" value="" required>
                      
                    </div>

                    <br>

                    
                    <button type="submit" class="btn btn-primary">Submit</button> 
                 
                   
                  </div><!-- /.box-body -->

                 
					</div>