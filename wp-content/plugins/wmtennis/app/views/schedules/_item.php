<?php //<td width="15"> ?> 
<?php
/*
if (isset($object->confirmed))
{
    if ($object->confirmed == 1) 
    { 
       echo '<span class="dashicons dashicons-yes" style="color:green"></span>';
    }
    else if ($object->confirmed == -1)
    {
        echo '<span class="dashicons dashicons-no" style="color:red"></span>';
    }
    else 
    {
        echo '<span class="dashicons dashicons-editor-help" style="color:black"></span>';
    }
}
else 
{
    echo '<span class="dashicons dashicons-editor-help" style="color:black;font-size:24px;"></span>';
}
*/
?>
<?php //</td> ?>
<td> <?php echo $object->date; ?> </td>
<td> <?php echo $object->home_team->name; ?> </td>
<td> <?php echo $object->visit_team->name; ?> </td> 
<td> 
<?php if (current_user_can('view_lineup')) {?>
	<a href="http://wmtennis.com:8000/schedules/lineup/<?php echo $object->id;?>">lineup</a>
	<?php } ?>
	<?php if (current_user_can('edit_schedule')) {?>  
	| <a href="http://wmtennis.com:8000/schedules/edit/<?php echo $object->id;?>">edit</a> | 
	<a href="http://wmtennis.com:8000/schedules/delete/<?php echo $object->id;?>">remove</a>
	<?php }?> 
</td>
    