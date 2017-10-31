<td> <?php echo $object->position; ?> </td>
<td> <?php echo date_format(new DateTime($object->time), 'g:i A'); ?> </td>
<td> 
<?php 
//echo $object->player->name;
$player1 = get_userdata($object->player_id);
if ($player1) {
    echo $player1->first_name . ' ' . $player1->last_name;

    if ($object->player_confirmed == 1)
    {
        echo '<span class="um-tip um-tip-w" title="Confirmed">';
        echo '<span class="dashicons dashicons-yes" style="color:green;font-size:24px;"></span>';
    }
    else if ($object->player_confirmed == -1)
    {
        echo '<span class="um-tip um-tip-w" title="Unavailable">';
        echo '<span class="dashicons dashicons-no" style="color:red;font-size:24px;"> </span>';
    }
    else
    {
        echo '<span class="um-tip um-tip-w" title="Not Responded">';
        echo '<span class="dashicons dashicons-editor-help" style="color:black;font-size:24px;"></span>';
    }
    echo '</span>';
}
?> 
</td>
<td> 
<?php 
$player2 = get_userdata($object->player2_id);
if ($player2) {
    echo $player2->first_name . ' ' . $player2->last_name;

    
    if ($object->player2_confirmed == 1)
    {
        echo '<span class="um-tip um-tip-w" title="Confirmed">';
        echo '<span class="dashicons dashicons-yes" style="color:green;font-size:24px;"></span>';
    }
    else if ($object->player2_confirmed == -1)
    {
        echo '<span class="um-tip um-tip-w" title="Unavailable">';
        echo '<span class="dashicons dashicons-no" style="color:red;font-size:24px;"> </span>';
    }
    else
    {
        echo '<span class="um-tip um-tip-w" title="Not Responded">';
        echo '<span class="dashicons dashicons-editor-help" style="color:black;font-size:24px;"></span>';
    }
    echo '</span>';
    
}
?> 
</td>
