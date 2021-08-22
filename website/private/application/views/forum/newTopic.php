<?=form::open()?>
<?=form::input('forum.title', 'title', $this->input->post('title'))?>
<?=form::textarea('forum.body', 'body', $this->input->post('body'))?>
<?=form::submit('forum.new')?>
<?=form::close()?>