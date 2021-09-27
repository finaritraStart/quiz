<?php echo form_open('pourcentage/add'); ?>

	<div>
		Id Question : 
		<input type="text" name="id_question" value="<?php echo $this->input->post('id_question'); ?>" />
	</div>
	<div>
		Question : 
		<input type="text" name="question" value="<?php echo $this->input->post('question'); ?>" />
	</div>
	<div>
		Participant : 
		<input type="text" name="participant" value="<?php echo $this->input->post('participant'); ?>" />
	</div>
	<div>
		Juste : 
		<input type="text" name="juste" value="<?php echo $this->input->post('juste'); ?>" />
	</div>
	<div>
		Faux : 
		<input type="text" name="faux" value="<?php echo $this->input->post('faux'); ?>" />
	</div>
	<div>
		Resultat : 
		<input type="text" name="resultat" value="<?php echo $this->input->post('resultat'); ?>" />
	</div>
	
	<button type="submit">Save</button>

<?php echo form_close(); ?>