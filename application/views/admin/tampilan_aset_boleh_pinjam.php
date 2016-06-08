<?php $conn = new mysqli('localhost', 'root', '', 'si_aset');?>

 <div class="row">
          <div class="box-header">
                  <h2>Peminjaman Aset</h2> 
                </div>               
         <div class="box box-primary">

                        
                <form role="form" action="<?php echo base_url()?>index.php/peminjaman/tambah_aset_pinjam" method="post">
                  <div class="box-body">
                 
         <?php $info = $this->session->flashdata('info'); 
          if(!empty($info))
            {
              echo "<p style='color:skyblue'><strong>$info<strong></p>";
              }?>
              <br>
              <br>
                    <div class="form-group">
                      <label for="id_usulan">Aset yang tersedia</label>
                     
                       
                      <select id= "i" class="form-control" name="i" required value="" >
                      <option selected disabled value=''>-- Aset --</option> 
                      <?php
                        $sql= "SELECT *FROM data_aset JOIN pengusulan on pengusulan.id_usul=data_aset.id_usul JOIN jenis_aset on jenis_aset.id_jenis=data_aset.id_jenis WHERE data_aset.id_users = 'jurusan' AND data_aset.cek = 0 AND data_aset.status=0 AND data_aset.kondisi ='baik'";
                       
                        $result = $conn->query($sql);
                        if($result->num_rows>0)
                        {
                          while($row = $result->fetch_assoc())
                          {
                            echo"<option value=\"$row[i]\">$row[jenis]-$row[kode]: $row[nama_barang]</option>";
                          }
                        }
                      
                        
                        
                        ?>

                    </select>

                    
                    </div>
                    <br>
                    
                    
                   
          <button type="submit" class="btn btn-primary">Pinjam</button> <br>
                  
        
                    </div><br>
                    </form>

                    
                    </div>



        