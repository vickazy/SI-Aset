<?php
$this->db->select('*');
    $this->db->from('pinjam_aset');
     $this->db->join('data_aset', 'data_aset.i = pinjam_aset.i');
         $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
         //$this->db->join('pengembalian_aset', 'pengembalian_aset.id_pinjam = pinjam_aset.id_pinjam');
         return $data = $this->db->get();  
         $row=$data->result();
         echo"lalala"

?>

 <div class="row">
          <div class="box-header">
                  <h2>Detail Peminjaman</h2> 
                </div>
          
                      
              
                
         <div class="box box-primary">
                        
                <form role="form" action= "" method="post">
                  <div class="box-body">
  
                         <div class="form-group">
          <table>
          <tr>
          <td>
          <label for="">ID Pinjam &nbsp &nbsp</label></td>
          <td><input style="width:200px" type="text" class="form-control"  name="kode" value="<?php echo $row->id_pinjam;?>" id="kode" disabled=""  ></td>
                  </tr>
                      </table>                   
                    </div>
 
                    <div class="form-group">
          <table>
          
            <tr>
              <td>
          <label for="">Peminjam &nbsp &nbsp</label></td>
          <td>
          <input style="width:200px" type="text" class="form-control"  name="peminjam" value="<?php echo $row->id_peminjam;?>" id="peminjam" disabled="" >
                    </td>
                     </tr>
                      </table>                                        
                    </div>
                   
                    <div class="form-group">
           <table>
            <tr>
              <td>
          <label for="">Status &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label></td>
           <td>
          <input style="width:200px" type="text" class="form-control"  name="status" value="<?php if($row->cek == '1') 
          {
            echo "Tidak Tersedia";
          }
          else
          {
            echo "Tersedia";
          }
           ?>" id="status" disabled="" ></td>
                      </tr>
                      </table>    

                    </div>
                    <div class="form-group">
           <table>
            <tr>
              <td>
          <label for="">Waktu Peminjaman &nbsp &nbsp</label></td>
           <td>
          <input style="width:200px" type="text" class="form-control"  name="status" value="<?php echo $row->waktu_pinjam?>" id="status" disabled="" ></td>
                      </tr>
                      </table>    

                    </div>


            <div class="form-group">
                 <table>
                  <tr>
                    <td>
                      <label for="">Waktu Terlambat  &nbsp &nbsp &nbsp &nbsp</label></td>
                      
                      <td>
                      <input style="width:200px" type="number" class="form-control"  name="sanksi" value="" id="sanksi"  ></td><td>&nbsp <strong>Hari</strong></td>
                             </tr>
                                  </table>                         
                                </div>
                                <div class="form-group">
                              
                    <button type="submit" class="btn btn-primary">Bayar Sanksi</button><br> <br>
                            
         
                    </div>
                    </form>
                    </div>
                    
                    </div>
