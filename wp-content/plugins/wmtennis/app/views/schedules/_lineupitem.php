<td> <?php echo $object->position; ?> </td>
<td> <?php echo date_format(new DateTime($object->time), 'g:i A'); ?> </td>
<td> 
<?php 
echo $object->player->name;

if ($object->player_confirmed)
{
    echo '<span class="dashicons dashicons-yes" style="color:green;font-size:24px;"></span>';
}
else if (!$object->player_confirmed)
{
    echo '<span class="dashicons dashicons-no" style="color:red;font-size:24px;"> </span>';
}
else
{
    echo '<span class="dashicons dashicons-warning" style="color:yellow;font-size:24px;"></span>';
}

?> 
</td>
<td> 
<?php 
echo $object->player2->name;
if (isset($object->player2))
{
    if ($object->player2_confirmed)
    {
        echo '<span class="dashicons dashicons-yes" style="color:green;font-size:24px;"></span>';
    }
    else if (!$object->player2_confirmed)
    {
        echo '<span class="dashicons dashicons-no" style="color:red;font-size:24px;"> </span>';
    }
    else
    {
        echo '<span class="dashicons dashicons-warning" style="color:yellow;font-size:24px;"></span>';
    }
    
}
?> 
</td>
<?php if (current_user_can('confirm_match')) {?>
<td> <input type="submit" value="confirm"> </td>
<?php } ?>