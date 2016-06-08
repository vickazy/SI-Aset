<?php
 $tipe= $this->session->userdata('tipe');

            if ($tipe == 'admin')
            {
              ?>
                <center> <h1>Selamat Datang di Halaman Admin<br>Sistem Informasi Aset</h1></center>
                
        
      
                  <?php }

            else
            {
             
             ?>
                <center> <h1>Selamat Datang di Sistem Informasi Aset</h1></center>
               <br>
                <br>
            <center>
            <div class="row" style="margin-top:5%;margin-left:30%">
        
        <div class="col-lg-6 col-xs-6">
          <div class="row">
          <div class="col-lg-12 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skyblue">
         
             <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Permintaan Transfer Aset</h3>
                  <div class="box-tools pull-right">
                   </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="color:skyblue">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Pengirim</th>
                          <th>Kode Aset</th>
                          <th>Nama Aset</th>
                           
                        </tr>
                      </thead>
                      <tbody>
                     <?php 
                      $this->db->select('*');
                       $this->db->from('perpindahan');
                       $this->db->join('data_aset', 'data_aset.i = perpindahan.i');
                       $this->db->join('pengusulan', 'pengusulan.id_usul = data_aset.id_usul');
                       $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
                        $x = 0;
                        $x = $x + $this->session->userdata('id');
                        $this->db->where('id_penerima', $x);
                       
                       $data=$this->db->get();
                      
                       foreach ($data -> result() as $row) {
                        
                      ?>
                        <tr>
                          <td><?php echo $row->id_pengirim;?></td>
                          <td><?php echo $row->jenis.'-'.$row->kode;?></td>
                          <td><?php echo $row->nama_barang;?></td>
                          </tr>
            <?php } ?>
            <?php } ?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div>
           
        
         
          <a href="<?php echo base_url()?>index.php/transfer" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          </div>
          </center>
        </div>

     
            
           