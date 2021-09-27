<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>reponse</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">liste reponse</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="<?php echo base_url(); ?>index.php/affiche/addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a><br><br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>reponse</th>
						<th>id_question</th>
						<th>statut</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($reponses as $reponse){
						?>
						<tr>
							<td><?php echo $reponse->id; ?></td>
							<td><?php echo $reponse->reponse; ?></td>
							<td><?php echo $reponse->id_question; ?></td>
							<td><?php echo $reponse->statut; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/affiche/edit/<?php echo $user->id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a> || <a href="<?php echo base_url(); ?>index.php/affiche/delete/<?php echo $user->id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>