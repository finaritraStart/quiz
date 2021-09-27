<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<br>
<div class="table-responsive">

<table class="table table-striped">
   <thead class="thead-dark">
    <tr>
		<th>Id Question</th>
		<th>Question</th>
		<th>Actions</th>
    </tr>
   </thead>
	<?php foreach($questions as $q){ ?>
    <tr>
		<td><?php echo $q['id_question']; ?></td>
		<td><?php echo $q['question']; ?></td>
		<td>
            <a href="<?php echo site_url('select/edit/'.$q['id_question']); ?>"><h class="icon-pencil"></h></a> | 
            <a href="<?php echo site_url('select/remove/'.$q['id_question']); ?>"><h class="icon-cancel" style="color: red;"></h></a>
        </td>
    </tr>
	<?php } ?>
</table>
 <?php echo anchor('select/add', "<button class='btn btn-primary'>ajouter</button>"); ?>
</div>

</body>
</html>