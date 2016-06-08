<!DOCTYPE html>
<html>
<head>
	<title>SI ASET</title>
	<meta charset="utf-8" />
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet">
	<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->

   <script type="text/javascript">
	function cekform()
	{
		if(!$("#id").val())
		{
			alert('Silahkan Masukkan ID Anda');
			$("#id").focus();
			return false;
		}
		if(!$("#password").val())
		{
			alert('Silahkan Masukkan Password Anda');
			$("#password").focus();
			return false;
		}

	}
	</script>
</head>
<body>

<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<form action="<?php echo base_url()?>index.php/login/getlogin" method="POST" onsubmit="return cekform()">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="ID" name="id" id="id" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" id ="password" type="password">
							</div>
							<p style="color:skyblue"><?php $info= $this->session->flashdata('info');
							if (!empty($info))
							{
							echo "$info";
							}?></p>
							<button class="btn btn-primary" type="submit">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</body>
</html>