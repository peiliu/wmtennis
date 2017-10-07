<h2><?php echo $object->__name; ?></h2>

<?php
    echo '<div>'.$object->name.'</div>';
    echo '<div>'.$object->email.'</div>';
    echo '<div>'.$object->ntrp_rating.'</div>';
?>
<p>
    <?php echo $this->html->link('&#8592; All Rosters', array('controller' => 'rosters')); ?>
</p>