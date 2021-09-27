<!DOCTYPE html>
<html>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
     <title>quizz-project</title>
      <head>
           <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
           <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/quizz.css">
           <style type="text/css">
            #terminer{display: none;}
            button{
              border:none;
              padding:6px 0 6px 0;
              border-radius:8px;}

  .rep{
  width: 200px;
  height: 40px;
  margin: 1.5rem 0;
  margin-right: auto;
  margin-left: auto;  
  display: block;
 box-shadow: 8px 8px 12px #aaa;         
}

.card{
   box-shadow: 8px 8px 12px #aaa;

}


.side-label::after{
  display: none;
}

input:checked + .slide-label::after{
  display: block;
}
           </style>
     </head>
    <body>
  <?php
      foreach ($result as $row) 
      {
       $prop[]=$row->reponse;
       $id[]=$row->id_reponse;   
       $statut[]=$row->statut;
      }
      $idqest=$row->id_question;
      $getnum=$this->db->get('questions');
      $num=$getnum->num_rows();
      $qet=$this->db->get_where('questions',array('id_question'=>$idqest));
      foreach ($qet->result() as $row) 
      {
       $question=$row->question;
      }
     $conditions=array('statut'=>'1','id_question'=>$idqest );  
              $get= $this->db->select('*')
                   ->from('reponse')
                   ->where($conditions)
                   ->get();
      foreach ($get->result() as $row) 
      {
       $juste=$row->reponse;
      }
      $session=session_id();     
 ?>
    <br><div class=""><center>
      <div class="card w-75">
          <div class="modal-content">
            <div class="modal-header">
               <h5 style="color: #000;"><b class="text text-warning">Q<?php echo $idqest; ?>.</b><?php echo $question;?></h5><h5 class="text text-primary"><?php echo $idqest; ?>/<?php echo $num; ?></h5>
            </div>
             
                  <div class="modal-body">   
           
                       <form id="qestform" action="" method="post">

                         <div class="row">
                             <div id="rad 1" class="card rep col-sm-5 text-center 1">
                             <input type="radio" name="reponse" id="<?php echo $statut[0]; ?>" value="<?php echo $id[0] ?>"> <label class="side-label"><?php echo $prop[0] ?></label> 
                                            
                            </div>
                                  

                             <div id="rad 2" class="card rep col-sm-5 text-center 2">
                               <input type="radio" name="reponse" id="<?php echo $statut[1]; ?>" value="<?php echo $id[1] ?>"><label class="side-label"><?php echo $prop[1] ?></label>
                             </div>
                                   <br> 
                          </div>
                       
                          <div class="row">
                             <div id="rad 3" class="card rep col-sm-5 text-center 3">
                                 <input type="radio" name="reponse" id="<?php echo $statut[2]; ?>" value="<?php echo $id[2] ?>"><label class="side-label"><?php echo $prop[2] ?></label> 
                             </div>
                                      
                               <div id="rad 4" class="card rep col-sm-5 text-center 4">               
                                   <input type="radio" name="reponse" id="<?php echo $statut[3]; ?>" value="<?php echo $id[3] ?>"> <label class="side-label"><?php echo $prop[3] ?></label>
                               </div>
                                <br>
                          </div>
                             
                	          <center><input style=" border-radius: 30px;width: 150px;" type="button" class="button btn btn-primary " id="valider"value="valider"></center>
                       </form>

                     <center><div style="display: none;" class="next_quest" id="next">
                    	 <?php echo $this->pagination->create_links(); ?>
                    </div> </center>
                    <center>
                    <?php echo anchor('quiz/terminer', "<button id='terminer' class='button btn btn-warning'>Terminer</button>"); ?>
                    </center>
               </div>               
            <center>
               <p> <h5 id="faux"></h5> <h5 id="juste"></h5></p>
               
            </center>
              
             <div class="progress">
        <div class="bar"></div>
      </div>
            </div>
            </div>
            </center>

    </div>
               
      <script type="text/javascript">
        $(document).ready(function($) {
              
              $('#valider').click(function(e){           
                  e.preventDefault();
                  var reponse = $("input[name='reponse']:checked").val();
                  var session = <?php echo json_encode($session); ?>;
                  var question = <?php echo json_encode($idqest); ?>;
                  var juste = <?php echo json_encode($juste); ?>;
                  var num = <?php echo json_encode($num); ?>;

                    $.ajax({
                          url: "<?php echo base_url(); ?>" + "quiz/envoyer",
                          type:'POST', 
                          data: {reponse:reponse,
                                 session:session,
                                 question:question}, 
                          error: function()
                          {   
                             $('#faux').append("<h class=' icon-cancel'></h>"+'non repondu'+ '<br>').css({color:'red'});
                             $('#juste').append(juste).css({color:'red'});
                          },
                          success: function(json)
                          {                       
                           if (document.getElementById('1').checked) {
                        valeur = document.getElementById('1').value;
                        $('#juste').append("<h class=' icon-ok'></h>"+'bonne reponse').css({color:'green'});
                          
                       }else{
                        $('#faux').append("<h class=' icon-cancel'></h>"+'mauvaise reponse'+ '<br>').css({color:'red'});
                        $('#juste').append(juste).css({color:'red'});                        
                      }                                  
                          }
                    }); 
                    $('#valider').hide(1000);
                    $('#next').show(1000);
                    if (num==question) {$('#terminer').show(1000);}           
                    
                });

      $('#valider').click(function(e){           
      e.preventDefault();  
      
      });   
    });       
      </script>
      </body>
</html>





