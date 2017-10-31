<div class="post-item clearfix post-314 post type-post status-publish format-standard hentry category-uncategorized">
<form action="" method="post">
<h3><u> <?php echo $object->home_team->name; ?> vs <?php echo $object->visit_team->name; ?> @ <?php echo date("M d, Y", strtotime($object->date));?></u></h3>
<p>
Match Address: <?php echo $object->home_team->address1 . ', '. $object->home_team->city . ' ' . $object->home_team->state ;?>  
</p>
<table class="tablepress">
<thead>
	<tr> 
		<th class="column-1"> Position </th>
		<th class="column-2"> Time </th> 
		<th class="column-3"> Player </th> 
		<th class="column-4"> Player </th>
		<?php // <th class="column-5">  </th> ?>
	</tr> 
</thead>
<tbody>
<?php foreach ($object->match_confirmations as $lineup_object): ?>
<tr>
    <?php $this->render_view('_lineupitem', array('locals' => array('object' => $lineup_object))); ?>
</tr>
<?php endforeach; ?>


<?php if (current_user_can('edit_lineup')){?>
<tr>
	<td> 
	<input type="hidden" name="data[MatchConfirmation][schedule_id]" value=<?php echo $object->id; ?>>
	<select name="data[MatchConfirmation][position]">
		<option value=1> 1S </option>
		<option value=2> 2S </option>
		<option value=3> 1D </option>
		<option value=4> 2D </option>
		<option value=5> 3D </option>
	</select> 
	</td>
	<td> 
	<select name="data[MatchConfirmation][time]">
	
	<?php
	$matchTime =  new DateTime('07:00:00');
	$endTime = new DateTime('22:00:00');
	while ($matchTime < $endTime)
	{
	?>
		<option value=<?php echo $matchTime->format('H:i:s')?> > <?php echo date_format($matchTime, 'g:i A');?> </option>
	<?php 	 
	    $matchTime->add(new DateInterval('PT30M'));
	}
	?> 
	</select>

	</td>
	<td> 
	<select name="data[MatchConfirmation][player_id]">
	<?php foreach ($rosters as $rosterObj): ?>
		<option value=<?php echo $rosterObj->id; ?>> <?php echo $rosterObj->name; ?> </option>
	<?php endforeach; ?>
	</select>
	</td>
	<td>  
	<select name="data[MatchConfirmation][player2_id]">
	<?php foreach ($rosters as $rosterObj): ?>
		<option value=<?php echo $rosterObj->id; ?>> <?php echo $rosterObj->name; ?> </option>
	<?php endforeach; ?>
	</select>
	</td>
	<td> <input type="submit" value="Add lineup"> </td>
</tr>
<?php } ?>
</tbody>
</table>
<?php //if (current_user_can('confirm_match')) { ?>
   
  Confirmation: <input type="radio" name="rb_confirmation" value="1"> Confirmed 
  <input type="radio" name="rb_confirmation" value="-1"> Unavailable
  <input type="submit" value="Submit"> 

</form>



<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    if (isset($_POST['rb_confirmation'])) {
        $this->confirm_match($object->match_id, get_current_user_id(), $_POST['rb_confirmation']);
    }
    $this->add_lineup();
}
?>