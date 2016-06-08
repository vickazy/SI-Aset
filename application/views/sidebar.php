<?php
 $tipe= $this->session->userdata('tipe');
 ?>
<div class="user-panel">
    <div class="pull-left image">
        <img src="<?php echo base_url()?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
    <p><?php echo $this->session->userdata('id');?></p>
    <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>

<ul class="sidebar-menu">
    <li class="header">MENU</li>
    <li><a href="<?php echo base_url()?>index.php/home"><span>Home</span></a></li>
   
    <?php if($tipe == 'mahasiswa' || $tipe == 'unit' || $tipe == 'dosen' ){?>
    <li><a href="<?php echo base_url()?>index.php/peminjaman"><span>Peminjaman Aset</span></a></li>
    <li><a href="<?php echo base_url()?>index.php/pengusulan"><span>Pengajuan Aset</span></a></li>
    <li><a href="<?php echo base_url()?>index.php/persetujuan/"><span>Persetujuan Aset</span></a></li>
    <?php } ?>
    <?php if ($tipe == 'admin') {?>
    <li><a href="<?php echo base_url()?>index.php/daftar_aset"><span>Daftar Aset</span></a></li>
    <li><a href="<?php echo base_url()?>index.php/persetujuan"><span>Pengajuan Aset</span></a></li>
    <?php } ?>
    <?php if($tipe == 'dosen'|| $tipe == 'admin'  ){?>
     <li><a href="<?php echo base_url()?>index.php/transfer"><span>Transfer Aset</span></a></li>
    <?php } ?> 
    <?php if ($tipe == 'admin') {?>
    <li><a href="<?php echo base_url()?>index.php/peminjaman"><span>Peminjaman Aset</span></a></li>
   
    <?php } ?>
    
</ul>