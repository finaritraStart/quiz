<!DOCTYPE html>
<html>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  
<head>
	<title>quizz en ligne</title>
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fontello/css/i-con.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js" ></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
		text-align: center;
	}
	.container{
	  height: 100%;
	  display: table;
	  padding-top: 200px;
	  width: 100%;
	}
	img.fond{
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: auto;
		min-width: 1024px;
		min-height: 100%;
	}
	@media screen and (max-width: 1024px){
	img.fond{
		left: 50%;
		margin-left: -512px;
	}
}
</style>

</head>
<body>
<img id="fond" class="fond" src="<?php echo base_url(); ?>assets/img/pi.jpg ?>">


<header class="container">
      
        <div class="col-md-12 mb-4 white-text text-center">
                      <h1 id="ti" class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s">
                        <strong>quizz en ligne</strong>
                      </h1>
                      <hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">

                    <?php echo anchor('quiz/qest', "<button style='border-radius: 30px;width: 150px;' class='btn btn-primary'name='terminer'>commencer</button>"); ?>

                     <?php echo anchor('Auth_presentateur/pres_login', "<button style='border-radius: 30px;width: 150px;' class='btn btn-success'name='terminer'>presentateur</button>"); ?>
        </div>
    </header>

</body>
</html>





