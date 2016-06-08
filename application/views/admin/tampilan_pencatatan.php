<?php $conn = new mysqli('localhost', 'root', '', 'si_aset');?>

 <div class="row">
          <div class="box-header">
                  <h2>Pencatatan Aset</h2> 
                </div>               
         <div class="box box-primary">

                        
                <form role="form" action="<?php echo base_url()?>index.php/daftar_aset/tambah_data" method="post">
                  <div class="box-body">
                 
          <div class="form-group">
          <label for="id_usulan">Jenis Aset</label>
                     
                       
                      <select id= "id_jenis" class="form-control" name="id_jenis" required value="" >
                      <option selected disabled value=''>--Jenis Aset--</option> 
                      <?php
                        $sql= "SELECT *FROM jenis_aset";
                       
                        $result = $conn->query($sql);
                        if($result->num_rows>0)
                        {
                          while($row = $result->fetch_assoc())
                          {
                            echo"<option value=\"$row[id_jenis]\">$row[jenis]</option>";
                          }
                        }
                      
                        
                        
                        ?>

                    </select>

           
                    </div>
                    <div class="form-group">
                      <label for="id_usulan">Usulan</label>
                     
                       
                      <select id= "id_usul" class="form-control" name="id_usul" required value="" >
                      <option selected disabled value=''>--Usulan--</option> 
                      <?php
                        $sql= "SELECT *FROM pengusulan where status = 1";
                       
                        $result = $conn->query($sql);
                        if($result->num_rows>0)
                        {
                          while($row = $result->fetch_assoc())
                          {
                            echo"<option value=\"$row[id_usul]\">ID Usulan : $row[id_usul] (Pengusul:  $row[id_user] | Barang: $row[nama_barang] | Spesifikasi :  $row[spesifikasi] | Merk: $row[merk])</option>";
                          }
                        }
                      
                        
                        
                        ?>

                    </select>

                    
                    </div>
                    
                   
          <div class="form-group">
          <label for="">Kondisi</label>
          <select id= "kondisi" class="form-control" name="kondisi" required>
          <option selected disabled value=''>--Kondisi--</option> 
          <option  value='Baik'>Baik</option> 
          <option value='Rusak Ringan'>Rusak Ringan</option>
          <option  value='Rusak Berat'>Rusak Berat</option>
          </select>
          
                  </div>

      <div class="form-group">
          <label for="">Pengguna</label>
          <input type ="text" class="form-control" name="id_users"  required>
          
                  </div>

          <div class="form-group">
          <label for="">Status</label> 
          <select id= "status" class="form-control" name="status" required>
          <option selected disabled value=''>--Status Aset--</option> 
          <option  value='0'>Dipinjamkan</option> 
          <option value='1'>Tidak Dipinjamkan</option>
          </select>
                  </div>
                  
<br>
<br>
                 <button type="submit" class="btn btn-primary">Simpan</button> <br>
                  
        
                    </div>
                    </form>
                    </div>



        