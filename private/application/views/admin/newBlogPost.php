<form action="<?php echo url::current(); ?>" method="post">
	<fieldset>
		<label for="title"><?php echo Kohana::lang('site.admin.blogPost.title'); ?></label>
		<input type="text" name="title" value="<?php echo $this->input->post('title'); ?>" id="title" />
		
		<label for="permalink"><?php echo Kohana::lang('site.admin.blogPost.permalink'); ?></label>
		<input type="text" name="permalink" value="<?php echo $this->input->post('permalink'); ?>" id="permalink" />
		
		<label for="summary"><?php echo Kohana::lang('site.admin.blogPost.summary'); ?></label>
		<textarea id="summary" name="summary" rows="10" cols="40"><?php echo $this->input->post('summary'); ?></textarea>
		
		<label for="body"><?php echo Kohana::lang('site.admin.blogPost.body'); ?></label>
		<textarea id="body" name="body" rows="10" cols="40"><?php echo $this->input->post('body'); ?></textarea>
		
		<button type="submit"><?php echo Kohana::lang('site.admin.blogPost.newButton'); ?></button>
	</fieldset>
</form>

