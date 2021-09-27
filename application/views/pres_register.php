

<html>
  <head>
    <title>quizz en ligne</title>
    <link rel="stylesheet" type="text/css" href="hoCss.css">
  <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/log.css" rel="stylesheet">
<style type="text/css">
body {
  margin:0;
  color:#edf3ff;
  background:#c8c8c8;
  background:url("<?php echo base_url(); ?>assets/img/font.jpg") fixed;
  background-size: cover;
  font:600 16px/18px 'Open Sans',sans-serif;
}
</style>

  </head> 
  <body>
    <br><br>
    <center>
    <form  method="POST" action="" id="regForm">
<div class="login-wrap">
  <div class="login-html">
    <label for="tab-1" class="tab">Inscription</label>
    <div class="login-form">
      <div class="sign-in-htm">
        <?php if (isset($_SESSION['success'])) { ?>
         <center><div class="alert alert-success"> <?php echo $_SESSION['success']; ?> </div></center>

      <?php  
      } ?>


<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <div class="group">
          <label for="user" class="label">Nom</label>
          <input  type="text" class="input" name="username" id="username">
        </div>


        <div class="group">
          <label for="password" class="label">Mot de passe</label>
          <input  type="password" id="password" class="input" data-type="password" name="password">
        </div>

        <div class="group">
          <label for="confirmer" class="label">Confirmer mot de passe</label>
          <input  type="password" id="ito" class="input" data-type="password" name="password2" id="password">
        </div>

        <div class="group">
          <input id="register" type="submit" class="btn btn-primary" name="register" value="S'inscrire">
        </div>
        <div class="hr"></div>
        <a><?php echo anchor('auth_presentateur/pres_login', "se connecter"); ?></a>
      </div>
      
    </div>
  </div>
</div>  
  
</form>
</center>
    </body>
    
  
</html>
