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
<div class="container">
	<?php echo form_open('question/add'); ?>
	 <div class="form-group">

		<div>
			Question : 
			<input type="text" class="form-control" name="question" value="<?php echo $this->input->post('question'); ?>" />
		</div><br>
		
		<button class="btn btn-success">Sauvegarder</button>
      </div>
	<?php echo form_close(); ?>

</div>