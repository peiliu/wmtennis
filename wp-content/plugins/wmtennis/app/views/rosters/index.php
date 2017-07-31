<h2>Rosters</h2>
<p> Rosters Table </p>
<div>
<table>
  <tr>
    <th>Name</th>
    <th>Rating</th>
    <th>Email</th>
    <th>Phone</th>
  </tr>
   
    <?php foreach ($objects as $object): ?>
    <tr>
    
        <?php $this->render_view('_item', array('locals' => array('object' => $object))); ?>
    </tr>  
    <?php endforeach; ?>
  
</table>
</div>
<?php echo $this->pagination(); ?>