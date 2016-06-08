<?php
 $tipe= $this->session->userdata('tipe');
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>SI ASET</title>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
     <script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <link href="<?php echo base_url()?>assets/css/AdminLTE.min.login.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/plugins/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <!-- Theme style -->
    <link href="<?php echo base_url()?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    
    <link href="<?php echo base_url()?>assets/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

</head>
<body class="skin-blue">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">
        <?php $this->load->view('header');?>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
           <?php  $this->load->view('sidebar');?>

        </section>
        <!-- /.sidebar -->
      </aside>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
         
          <ol class="breadcrumb">
            <li><a href=><i class="fa fa-dashboard active"></i></a><?php echo $judul; ?> <?php echo $sub_judul; ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <?php 
            if(isset($pending))
            {
              $data['pending']=$pending;
              $this->load->view($content, $data);
            }
            else{
              $this->load->view($content);
            }
            ?>
            
        </section>
      </div>

     

    <footer class="main-footer">
        <strong>Copyright &copy; 2016 <a href="#">Jurusan Sistem Informasi, FTI</a></strong>
      </footer>
</div>
</section>
</div>
</div>
<script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/app.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/js/notif.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
   <script src="<?php echo base_url()?>assets/js/notif.js" type="text/javascript"></script>
  <script src="<?php echo base_url()?>assets/js/notif_user.js" type="text/javascript"></script>
  
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

</body>
</html>
