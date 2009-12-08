<form action="<?php echo url::current(); ?>" method="post">
	<fieldset>
		<label for="title"><?php echo Kohana::lang('site.admin.blogPost.title'); ?></label>
		<input type="text" name="title" value="<?php echo $this->input->post('title', $post->title); ?>" id="title" />
		
		<label for="summary"><?php echo Kohana::lang('site.admin.blogPost.summary'); ?></label>
		<textarea id="summary" name="summary" rows="10" cols="40"><?php echo $this->input->post('summary', $post->summary); ?></textarea>
		
		<label for="body"><?php echo Kohana::lang('site.admin.blogPost.body'); ?></label>
		<textarea id="body" name="body" rows="10" cols="40"><?php echo $this->input->post('body', $post->markdown); ?></textarea>
		
		<button type="submit"><?php echo Kohana::lang('site.admin.blogPost.saveButton'); ?></button>
	</fieldset>
</form>
