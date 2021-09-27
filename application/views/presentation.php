<!DOCTYPE html>
<html>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <head>
  	 <title>presentateur</title>   
   
     <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js" ></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery-migrate-3.1.0.min.js" ></script>
     <script src="<?php echo base_url(); ?>assets/cercle/progresscircle.js"></script>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cercle/progresscircle.css" rel="stylesheet"> 

        <style type="text/css">
         h1{     
              color: #efecec;
  text-transform: uppercase;
  font-size: 40px;
  line-height: 50px;
  font-weight: 400;
  margin-top: 20px;
  color: 000;
          }
    .container {
  display: table;
  padding-top: 80px;
  width: 100%;
}
button {
  border-radius: 30px;
}

.content {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}  
.container {
    position: relative;
    display: block;
    vertical-align: baseline;
    margin: 0 auto;
    padding: 80px 0 0 0;
  }  
        </style>
  </head>
<body>
<?php              
       foreach ($qet as $row) 
      {
       $question=$row->question;
      }
      $id_question=$row->id_question;
      $getnum=$this->db->get('questions');
      $num=$getnum->num_rows();
      
?>
      <header class="container">
        <center><section class="content">
           
               <h1 id="question"><?php echo $question; ?></h1>
                 <br>
               <button style=" border-radius: 30px;width: 150px;" class="btn btn-primary" id="res">resultat</button><br>
                <div id="act">
                    <?php if(isset($resultat)){ ?>
                                                
                  <div class="circle" id="result" data-percentage="<?php echo $resultat;?>">  
                   </div> 
                      
                    <?php  } ?>
                </div>
              <br>            
                <div style="display: none;" class="next_quest" id="suivant">
                       <?php echo $this->pagination->create_links(); ?>
                </div>
               <div id="test"></div>
                <?php echo anchor('export/index', "<button class='btn btn-warning' id='terminer' name='terminer' style='display:none; border-radius: 30px;width: 150px;'>terminer</button>"); ?>           
         </section>
         </center>
        </header>
                
<script type="text/javascript">
  $(document).ready(function($){
      var id_question=<?php echo json_encode($id_question); ?>;
      var question=<?php echo json_encode($question); ?>;
      var num=<?php echo json_encode($num); ?>;      
      $('#res').click(function(e){   
        e.preventDefault(); 
         $.ajax({
            url: "<?php echo base_url(); ?>" + "quiz/pourcentage",
            type:'POST', 
            data: {id_question:id_question,question:question}, 
            error: function()
            {
              alert('echec');
            },
            success: function(data)
            {    
                                             
            }
          });
          setTimeout(load);    
         setTimeout(affiche,2000);
      });
     function load(){
       $('#act').load('presentation #result'); 
     }

     function affiche(){
          $('.circle').circlechart();        
          $('#res').hide(1000);    
          $('#suivant').show(2000);
          $('#result').show(1000);
          if (num==id_question) {$('#terminer').show(2000);}
     }
  });

</script>

</body>
</html>





