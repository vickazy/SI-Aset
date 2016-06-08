<?php
 $tipe= $this->session->userdata('tipe');
 ?>

<a href="" class="logo" style="font-size:14px"><b>Sistem Informasi Aset</b></a>

<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
  <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
  <?php if ($tipe=="admin")
  {?>
  <li class="dropdown notifications-menu">
  
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning" id="banyakpending"></span>
      </a>
      <ul class="dropdown-menu">

        <li class="header">Pemberitahuan</li>
        <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu" id="yangpending">
          <!-- <li>
          <a href="#">
            <i class="fa fa-users text-yellow"></i> 5 Pendaftar dalam status pending
          </a>
          </li> -->
        </ul>
        </li>
        </ul>
    </li>
  <li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="" class="dropdown-toggle" data-toggle="dropdown">
      <!-- The user image in the navbar-->
      <img src="<?php echo base_url()?>assets/img/avatar5.png" class="user-image" alt="User Image"/>
      <!-- hidden-xs hides the username on small devices so only the image appears. -->
      <span class="hidden-xs"><?php echo $this->session->userdata('nama');?></span>
    </a>
    <ul class="dropdown-menu">
      <!-- The user image in the menu -->
      <li class="user-header">
      <img src="<?php echo base_url()?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
      <p><?php echo $this->session->userdata('id');?> - <?php echo $this->session->userdata('tipe');?></p>
      </li>
      <!-- Menu Footer-->
      <li class="user-footer">
    
      <div class="pull-right">
        <a href="<?php echo base_url('index.php/home/logout')?>" class="btn btn-default btn-flat">Keluar</a>
      </div>
      </li>
    </ul>
    </li>
  </ul>
  <?php } else {?>
  <li class="dropdown notifications-menu">
  
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell-o"></i>
        <span class="label label-warning" id="banyakpemberitahuan"></span>
      </a>
      <ul class="dropdown-menu">

        <li class="header">Pemberitahuan</li>
        <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu" id="pemberitahuan">
          <!-- <li>
          <a href="#">
            <i class="fa fa-users text-yellow"></i> 5 Pendaftar dalam status pending
          </a>
          </li> -->
        </ul>
        </li>
        </ul>
    </li>
  <li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="" class="dropdown-toggle" data-toggle="dropdown">
      <!-- The user image in the navbar-->
      <img src="<?php echo base_url()?>assets/img/avatar5.png" class="user-image" alt="User Image"/>
      <!-- hidden-xs hides the username on small devices so only the image appears. -->
      <span class="hidden-xs"><?php echo $this->session->userdata('nama');?></span>
    </a>
    <ul class="dropdown-menu">
      <!-- The user image in the menu -->
      <li class="user-header">
      <img src="<?php echo base_url()?>assets/img/avatar5.png" class="img-circle" alt="User Image" />
      <p><?php echo $this->session->userdata('id');?> - <?php echo $this->session->userdata('tipe');?></p>
      </li>
      <!-- Menu Footer-->
      <li class="user-footer">
    
      <div class="pull-right">
        <a href="<?php echo base_url('index.php/home/logout')?>" class="btn btn-default btn-flat">Keluar</a>
      </div>
      </li>
    </ul>
    </li>
  </ul>
  <?php }?>

  </div>
</nav>

    
