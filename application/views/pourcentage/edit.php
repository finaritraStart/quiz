<?php echo form_open('pourcentage/edit/'.$pourcentage['id_pourcentage']); ?>

	<div>
		Id Question : 
		<input type="text" name="id_question" value="<?php echo ($this->input->post('id_question') ? $this->input->post('id_question') : $pourcentage['id_question']); ?>" />
	</div>
	<div>
		Question : 
		<input type="text" name="question" value="<?php echo ($this->input->post('question') ? $this->input->post('question') : $pourcentage['question']); ?>" />
	</div>
	<div>
		Participant : 
		<input type="text" name="participant" value="<?php echo ($this->input->post('participant') ? $this->input->post('participant') : $pourcentage['participant']); ?>" />
	</div>
	<div>
		Juste : 
		<input type="text" name="juste" value="<?php echo ($this->input->post('juste') ? $this->input->post('juste') : $pourcentage['juste']); ?>" />
	</div>
	<div>
		Faux : 
		<input type="text" name="faux" value="<?php echo ($this->input->post('faux') ? $this->input->post('faux') : $pourcentage['faux']); ?>" />
	</div>
	<div>
		Resultat : 
		<input type="text" name="resultat" value="<?php echo ($this->input->post('resultat') ? $this->input->post('resultat') : $pourcentage['resultat']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>