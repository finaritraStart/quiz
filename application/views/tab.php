<!DOCTYPE html>
<html>
<head>
	<title>quiz en ligne</title>
</head>
<body><br>
  <div class="table-responsive">
   <table class="table table-hover tablesorter">
        <thead class="thead-dark">
            <tr>       
                <th class="header">numero</th>                           
                <th class="header">question</th>
                <th class="header">participant</th>
                <th class="header">juste</th>
                <th class="header">faux</th>                      
                <th class="header">pourcentage</th>       
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($pourcentageInfo) && !empty($pourcentageInfo)) {
                foreach ($pourcentageInfo as $key => $element) {
                    ?>
                    <tr>
                        <td><?php echo $element['id_question']; ?></td>   
                        <td><?php echo $element['question']; ?></td>
                        <td><?php echo $element['participant']; ?></td>
                        <td style="color: green;"><?php echo $element['juste']; ?></td>
                        <td style="color: red;"><?php echo $element['faux']; ?></td> 
                        <td><?php echo $element['resultat'];?>%</td>                       
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">pas resultat.</td>    
                </tr>
            <?php } ?>
 
        </tbody>
    </table>
  </div>
    
   <?php echo anchor('export/index', "<button class='btn btn-primary'name='terminer'>Exporter</button>"); ?>
</div>
  <script type="text/javascript">
      
  </script>
</body>
</html>