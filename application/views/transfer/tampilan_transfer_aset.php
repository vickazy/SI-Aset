 <?php 
   $this->db->select('*');
   $this->db->from('data_aset');
  $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
  $this->db->join('pengusulan', 'pengusulan.id_usul = data_aset.id_usul');
   $this->db->order_by("kode", "asc"); 
   $data=$this->db->get();?>
 <div class="row">
          <div class="box-header">
                  <h2>Transfer Aset</h2> 
                </div>
            
              
                
         <div class="box box-primary">
          <?php $info = $this->session->flashdata('info'); 
          if(!empty($info))
            {
              echo "<p style='color:skyblue'><strong>$info<strong></p>";
              }?>
                        
                <form role="form" action="<?php echo base_url()?>index.php/transfer/tambah_transfer" method="post">
                  <div class="box-body">
                                    
                <div class="form-group">
                      <label for="kode_aset">Kode Aset</label>
                     
                      <select id= "kode_aset" class="form-control" name="kode_aset" required>
                      <option selected disabled value=''>--Kode Aset--</option> 
                      <?php foreach ($data -> result() as $row) {
                      ?><?php
                                       
                          echo"<option value=\" $row->i\"> $row->jenis-$row->kode (Nama Aset : $row->nama_barang | Pengguna : $row->id_users )</option>";
                        
                        ?><?php }?>

                    </select>
                    
                    </div>
                    <div class="form-group">
                    <?php
                      $this->db->select('*');
                      $this->db->from('user');
                      $data=$this->db->get();?>
                      <label for="id_penerima">Penerima Aset</label>
                     
                      <select id= "id_penerima" class="form-control" name="id_penerima" required>
                      <option selected disabled value=''>--ID User Penerima--</option> 
                      
                    <?php foreach ($data -> result() as $row) {
                      ?><?php
                                       
                          echo"<option value=\" $row->id\"> $row->nama</option>";
                        
                        ?><?php }?>

                    </select>
                    
                    </div>
                    <button type="submit" class="btn btn-primary">Transfer</button> <br>
                  
                    </div>
                    </form>
                    </div>



          