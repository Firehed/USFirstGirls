<?=form::open()?>
<?=form::input('admin.blog.title', 'title', $this->input->post('title'))?>
<?=form::input('admin.blog.permalink', 'permalink', $this->input->post('permalink'))?>
<?=form::textarea('admin.blog.summary', 'summary', $this->input->post('summary'))?>
<?=form::textarea('admin.blog.body', 'body', $this->input->post('body'))?>
<?=form::submit('admin.blog.newButton')?>
<?=form::close()?>
