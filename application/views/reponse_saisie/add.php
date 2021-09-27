<?php echo form_open('reponse_saisie/add'); ?>

	<div>
		Id Reponse : 
		<input type="text" name="id_reponse" value="<?php echo $this->input->post('id_reponse'); ?>" />
	</div>
	<div>
		Session : 
		<input type="text" name="session" value="<?php echo $this->input->post('session'); ?>" />
	</div>
	<div>
		Id Question : 
		<input type="text" name="id_question" value="<?php echo $this->input->post('id_question'); ?>" />
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>