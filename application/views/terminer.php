<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Quizz en ligne</title>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
	     <script src="<?php echo base_url(); ?>assets/cercle/progresscircle.js"></script>
	     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cercle/progresscircle.css" rel="stylesheet">
	     
	</head>
	<body>
     <center>
		 <br><br><br>
		 <h1 style="text-transform: initial;"><b>RESULTAT:</b></h1><br><br>
			<div class="circle" id="result" data-percentage="<?php echo $resultat; ?>">  
			</div><br><br>
           <?php echo anchor('accueil/index', "<button style='border-radius: 30px;width: 150px;' class='btn btn-warning'>accueil</button>"); ?>
		 <script type="text/javascript">
		 	$(document).ready(function() {
             $('.circle').circlechart();

		 	});
		 </script>
		 </center>
	</body>
</html>