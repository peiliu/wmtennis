<div class="post-item clearfix post-314 post type-post status-publish format-standard hentry category-uncategorized">
<h2>Teams</h2>
<form action="" method="post">
<table class="tablepress">
<thead>
	<tr> 
		<th class="column-1"> Name </th>
		<th class="column-2"> Address </th> 
		<th class="column-3"> City </th> 
		<th class="column-4"> State </th>
		<th class="column-4">  </th>
	</tr> 
</thead>
<tbody>
<?php foreach ($objects as $object): ?>
<tr>
    <?php $this->render_view('_item', array('locals' => array('object' => $object))); ?>
</tr>
<?php endforeach; ?>

<tr>
	<td> <input type="text" name="data[Team][name]"> </td>
	<td> <input type="text" name="data[Team][address1]"> </td>
	<td> <input type="text" name="data[Team][city]"> </td>
	<td> <input type="text" name="data[Team][state]"> </td>
	<td> <input type="submit" value="Add Team"> </td>
</tr>
</tbody>
</table>
</form>

</div>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $this->add();
}
?>
<?php $this->display_flash(); ?>
<?php echo $this->pagination(); ?>