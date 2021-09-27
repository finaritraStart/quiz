
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>quizz-projet</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/boo.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/site.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fontello/css/i-con.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootflat-admin.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fontello/css/i-con.css" rel="stylesheet">

<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js" ></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/application.js"></script>



    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    
    <link rel="stylesheet" href="dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    
    <script type="text/javascript" src="dist/js/site.min.js"></script>
  </head>
  <body>

    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
         
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" style="color: #fff;" class="navbar-brand">Quizz</a>
          </div>

         
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                   
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle icon-user-male" href="#"><?php echo $_SESSION['username']; ?><b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header">Setting</li>
                                                   
                  <li class="divider"></li>
                  <li class="disabled"><a href="#">Deconnecter</a></li>
                </ul>
              </li>
            </ul>

          </div>
        </div>
      </nav>
  
    <div class="container-fluid">

        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>SIDE PANEL</b></li>
                
                <li class="list-group-item"><a href="index.html"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
                
                <li>
                  <a href="#demo4" class="list-group-item " data-toggle="collapse">question<span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo4">
                      <a class="list-group-item" href="<?php echo base_url(); ?>question/index">liste</a>
                      <a class="list-group-item" href="<?php echo base_url(); ?>question/add">ajout</a>
                     
                    </li>
                </li>

                <li>
                  <a href="#demo4" class="list-group-item " data-toggle="collapse">reponse<span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo4">
                     <a class="list-group-item" href="<?php echo base_url(); ?>reponse/index">liste</a>
                      <a class="list-group-item" href="<?php echo base_url(); ?>reponse/add">ajout
                     </a>
                    </li>
                </li>

                <li>
                  <a href="#demo4" class="list-group-item " data-toggle="collapse">presentateur<span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo4">
                      <a class="list-group-item" href="<?php echo base_url(); ?>presentateur/index "> liste</a>
                     <a class="list-group-item" href="<?php echo base_url(); ?>presentateur/add">ajout</a>
                     
                    </li>
                </li>
              </ul>
          </div>


          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Reponse</h3>
              </div>
              <div class="panel-body">
                  <div class="content-row">




<br>
<div class="table-responsive">
	
	<table class="table table-striped">
		 <thead class="thead-dark">
		    <tr>
				<th>Id Reponse</th>
				<th>Reponse</th>
				<th>Id Question</th>
				<th>Statut</th>
				<th>Actions</th>
		    </tr>
		 </thead>
		<?php foreach($reponse as $r){ ?>
	    <tr>
			<td><?php echo $r['id_reponse']; ?></td>
			<td><?php echo $r['reponse']; ?></td>
			<td><?php echo $r['id_question']; ?></td>
			<td><?php echo $r['statut']; ?></td>
			<td>
	            <a class="btn btn-primary btn-sm" href="<?php echo site_url('reponse/edit/'.$r['id_reponse']); ?>"><h class="icon-pencil"></h></a> | 
	            <a class="btn btn-danger btn-sm" href="<?php echo site_url('reponse/remove/'.$r['id_reponse']); ?>"><h class="icon-cancel"></h></a>
	        </td>
	    </tr>
		<?php } ?>
	</table>
	<?php echo anchor('reponse/add', "<button class='btn btn-primary'>ajouter</button>"); ?>
</div>




        </div>
              </div>     



                  </div>
        </div>

                  

                  
   
  </body>
</html>

















