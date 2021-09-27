
       <div class="container">
		<?php echo form_open('question/edit/'.$question['id_question']); ?>

			<div class="form-group">
				<label class="col-2 col-form-label">Question : </label>
				
				<input type="text" class="form-control" name="question" value="<?php echo ($this->input->post('question') ? $this->input->post('question') : $question['question']); ?>" />
			</div>
			
			<button class="btn btn-success">Sauvegarder</button>
			
		<?php echo form_close(); ?>
      </div>


