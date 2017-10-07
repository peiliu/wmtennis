<h2>Edit Teams</h2>

<?php echo $this->form->create($model->name, array('public'=>'true')); ?>
<?php echo $this->form->input('name'); ?>
<?php echo $this->form->input('address1'); ?>
<?php echo $this->form->input('city'); ?>
<?php echo $this->form->input('state'); ?>
<?php echo $this->form->end('Update'); ?>
