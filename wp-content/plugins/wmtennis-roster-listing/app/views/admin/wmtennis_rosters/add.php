<h2>Add Players to Roster</h2>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('name'); ?>
<?php echo $this->form->input('email'); ?>
<?php echo $this->form->select('data['.$this->model_name.'][ntrp_rating]', array('label'=>'NTRP Rating', 'id'=>'ntrp_rating', 'options'=> array('3.5'=>'3.5', '4.0'=>'4.0', '4.5'=>'4.5'))); ?>
<?php echo $this->form->input('address1', array('label' => 'Address 1')); ?>
<?php echo $this->form->input('address2', array('label' => 'Address 2')); ?>
<?php echo $this->form->input('city'); ?>
<?php echo $this->form->input('state', array('style' => 'width: 40px;')); ?>
<?php echo $this->form->input('zip', array('style' => 'width: 80px;')); ?>
<?php echo $this->form->input('description'); ?>
<?php echo $this->form->end('Add'); ?>