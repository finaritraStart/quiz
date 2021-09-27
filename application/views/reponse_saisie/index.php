

<br>
<div class="table-reponsive">
	<table class="table table-striped">
	    <tr>
			<th>Id Saisie</th>
			<th>Id Reponse</th>
			<th>Session</th>
			<th>Id Question</th>
			<th>Actions</th>
	    </tr>
		<?php foreach($reponse_saisie as $r){ ?>
	    <tr>
			<td><?php echo $r['id_saisie']; ?></td>
			<td><?php echo $r['id_reponse']; ?></td>
			<td><?php echo $r['session']; ?></td>
			<td><?php echo $r['id_question']; ?></td>
			<td>
	            <a href="<?php echo site_url('reponse_saisie/edit/'.$r['id_saisie']); ?>"><h class="icon-pencil"></h></a> | 
	            <a href="<?php echo site_url('reponse_saisie/remove/'.$r['id_saisie']); ?>"><h class="icon-cancel" style="color:#ff4444;"></h></a>
	        </td>
	    </tr>
		<?php } ?>
	</table>
</div>

