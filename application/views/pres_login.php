<style type="text/css">
  form{
    margin-top: auto;
    margin-bottom: auto;
  }
  body {
  margin:0;
  color:#edf3ff;
  background:#c8c8c8;
  background:url("<?php echo base_url(); ?>assets/img/font.jpg") fixed;
  background-size: cover;
  font:600 16px/18px 'Open Sans',sans-serif;
}
</style>
<link rel="stylesheet" type="text/css" href="hoCss.css">
  <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap.min.js"></script>  
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/log.css" rel="stylesheet">

  <br><br>
  <center>
  <form  method="POST" action="" id="regForm">
<div class="login-wrap">
  <div class="login-html">
    <label for="tab-1" class="tab">S'identifier</label>
    <div class="login-form">
      <div class="sign-in-htm">
         <?php if(isset($_SESSION['success'])){ ?>
     <div class="alert alert-success"><?php $_SESSION['success']; ?></div>
    
<?php
 }
   ?>
    <?php echo validation_errors('<div class="alert alert-danger">','</div>') ?>
        <div class="group">
          <label for="user" class="label">Nom</label>
          <input  type="text" class="input" id="username" name="username" placeholder="votre nom">
        </div>
        <div class="group">
          <label for="pass" class="label">Mot de passe</label>
          <input  type="password" id="password" placeholder="votre mot de passe" class="input" data-type="password" name="password">
        </div>
        <div class="group">
          <input id="submit" type="submit" class="btn btn-primary" name="submit" value="Connecter" >
        </div>
        <div class="hr"></div>
        <a><?php echo anchor('auth_presentateur/pres_register', "s'inscrire"); ?></a>
      </div>
      
    </div>
  </div>
</div>  
  
</form>
</center>
    