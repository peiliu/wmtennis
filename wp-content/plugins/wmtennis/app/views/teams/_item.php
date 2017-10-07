<td> <?php echo $object->name; ?> </td>
<td> <?php echo $object->address1; ?> </td>
<td> <?php echo $object->city; ?> </td>
<td> <?php echo $object->state; ?> </td> 
<td> 
	<a href="http://wmtennis.com:8000/teams/edit/<?php echo $object->id;?>">edit</a> | 
	<a href="http://wmtennis.com:8000/teams/delete/<?php echo $object->id;?>">remove</a> 
</td>

