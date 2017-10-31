<h2>Schedules</h2>

<div>
<table class="tablepress">
 <thead>
  <tr>
 <?php //   <th class="column-1" width=100px>Available</th> ?> 
    <th class="column-2">Date</th>
    <th class="column-3">Home Team</th>
    <th class="column-4">Visit Team</th>
    <th class="column-5"></th>
  </tr>
  </thead>
  <tbody>
<?php foreach ($objects as $object): ?>
<tr>
    <?php $this->render_view('_item', array('locals' => array('object' => $object))); ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<?php
 $display_name = um_user('role');
 echo $display_name; // prints the user's display name
 ?>
 
<?php echo $this->pagination(); ?>