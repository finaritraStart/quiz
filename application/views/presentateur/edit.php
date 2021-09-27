<?php echo form_open('presentateur/edit/'.$presentateur['id']); ?>

	<div>
		Password : 
		<input type="password" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $presentateur['password']); ?>" />
	</div>
	<div>
		Username : 
		<input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $presentateur['username']); ?>" />
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>