

<div class="table-responsive">
	<table class="table table-striped">
	    <tr>
			<th>Id Pourcentage</th>
			<th>Id Question</th>
			<th>Question</th>
			<th>Participant</th>
			<th>Juste</th>
			<th>Faux</th>
			<th>Resultat</th>
			<th>Actions</th>
	    </tr>
		<?php foreach($pourcentage as $p){ ?>
	    <tr>
			<td><?php echo $p['id_pourcentage']; ?></td>
			<td><?php echo $p['id_question']; ?></td>
			<td><?php echo $p['question']; ?></td>
			<td><?php echo $p['participant']; ?></td>
			<td><?php echo $p['juste']; ?></td>
			<td><?php echo $p['faux']; ?></td>
			<td><?php echo $p['resultat']; ?></td>
			<td>
	            <a href="<?php echo site_url('pourcentage/edit/'.$p['id_pourcentage']); ?>">Edit</a> | 
	            <a href="<?php echo site_url('pourcentage/remove/'.$p['id_pourcentage']); ?>">Delete</a>
	        </td>
	    </tr>
		<?php } ?>
	</table>
</div>
