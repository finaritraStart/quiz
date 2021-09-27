 
<style type="text/css">
	.container{
		display: block;
		margin-left: auto;
		margin-right: auto;
		box-shadow: 8px 8px 12px #aaa;
		width:60%;
		height:50%;
	}
</style>
<br><br>
	<div class="container">
		<?php echo form_open('reponse/edit/'.$reponse['id_reponse']); ?>
		  <div class="form-group">
		    <div>
				<label class="col-2 col-form-label">Id_Reponse:</label>

				<input type="text" name="id_reponse" class="form-control" value="<?php echo ($this->input->post('id_reponse') ? $this->input->post('id_reponse') : $reponse['id_reponse']); ?>" />
				<span class="text-danger"><?php echo form_error('id_reponse');?></span>
			</div>
			<div>
				<label class="col-2 col-form-label">Reponse:</label>

				<input type="text" name="reponse" class="form-control" value="<?php echo ($this->input->post('reponse') ? $this->input->post('reponse') : $reponse['reponse']); ?>" />
				<span class="text-danger"><?php echo form_error('reponse');?></span>
			</div>
			<div>
				<label class="col-2 col-form-label">Id_Question:</label>

				<input type="text" name="id_question" class="form-control" value="<?php echo ($this->input->post('id_question') ? $this->input->post('id_question') : $reponse['id_question']); ?>" />
				<span class="text-danger"><?php echo form_error('id_question');?></span>
			</div>
			<div>
				<label class="col-2 col-form-label">Statut:</label> 

				<input type="text" name="statut" class="form-control" value="<?php echo ($this->input->post('statut') ? $this->input->post('statut') : $reponse['statut']); ?>" />
				<span class="text-danger"><?php echo form_error('statut');?></span>
			</div>
			<br>
			
		 </div>
		<button class="btn btn-success">Sauvegarder</button>
			
		<?php echo form_close(); ?>

	</div>


