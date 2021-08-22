<?=form::open()?>
<?=form::input('admin.blog.title', 'title', $this->input->post('title', $post->title))?>
<?=form::textarea('admin.blog.summary', 'summary', $this->input->post('summary', $post->summary))?>
<?=form::textarea('admin.blog.body', 'body', $this->input->post('body', $post->markdown))?>
<?=form::submit('admin.blog.saveButton')?>
<?=form::close()?>
