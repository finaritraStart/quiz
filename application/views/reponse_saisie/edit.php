<?php echo form_open('reponse_saisie/edit/'.$reponse_saisie['id_saisie']); ?>

	<div>
		Id Reponse : 
		<input type="text" name="id_reponse" value="<?php echo ($this->input->post('id_reponse') ? $this->input->post('id_reponse') : $reponse_saisie['id_reponse']); ?>" />
	</div>
	<div>
		Session : 
		<input type="text" name="session" value="<?php echo ($this->input->post('session') ? $this->input->post('session') : $reponse_saisie['session']); ?>" />
	</div>
	<div>
		Id Question : 
		<input type="text" name="id_question" value="<?php echo ($this->input->post('id_question') ? $this->input->post('id_question') : $reponse_saisie['id_question']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>