<h2><?php echo $object->__name; ?></h2>

<?php
echo '<div>'.$object->date.'</div>';
echo '<div>'.$object->home_team->name.'</div>';
echo '<div>'.$object->visit_team->name.'</div>';
?>
<p>
    <?php echo $this->html->link('&#8592; All Schedules', array('controller' => 'schedules')); ?>
</p>