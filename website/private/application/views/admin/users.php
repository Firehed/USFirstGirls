<?=form::open()?>
<?=form::input('admin.user.searchfield', 'search', $this->input->post('search'))?>
<?=form::submit('admin.user.searchbutton')?>
<?=form::close()?>
