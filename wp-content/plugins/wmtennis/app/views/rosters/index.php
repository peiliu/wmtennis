
<h2>Rosters</h2>
<p> Rosters Table </p>
<div>
<table class="tablepress">
  <thead>
  <tr>
    <th class="column-1">Name</th>
    <th class="column-2">Rating</th>
    <th class="column-3">Email</th>
    <th class="column-4">Phone</th>
  </tr>
  </thead>
  <tbody class="row-hover"> 
    <?php foreach ($objects as $object): ?>
    <tr>
    
        <?php $this->render_view('_item', array('locals' => array('object' => $object))); ?>
    </tr>  
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<div id="myform">
    <form action="" method="post">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" required>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required>
        <label for="message">Your Message</label>
        <textarea name="message" id="message"></textarea>
        <input type="hidden" name="action" value="contact_form">
        <input type="submit" value="Send My Message">
    </form>
</div>

<?php do_shortcode('[table id=6 /]');?>

<?php if (isset($_POST['fullname'])) { echo $_POST['fullname']; }?>
<?php echo $this->pagination(); ?>