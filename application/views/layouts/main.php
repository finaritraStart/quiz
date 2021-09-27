<!DOCTYPE html>
<html>

	<head>
		<title></title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/boo.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fontello/css/i-con.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.slim.min.js" ></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    	
	</head>

	<body>
	
	<?php	if(isset($_view) && $_view)
	    $this->load->view($_view);
	?>
	</body>
</html>
