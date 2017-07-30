<?php get_header(); ?>
 
  <div id="primary" class="site-content">
    <div id="content" role="main">
 
      <?php while ( have_posts() ) : the_post(); ?>
 
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
            <header class="entry-header">
              <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
 
            <div class="entry-content">
              <?php the_content(); ?>
              <?php 
  global $wpdb;
  $mytable = "wp_wmtennis_rosters";
  $rosters = $wpdb->get_results( "
    SELECT * 
    FROM $mytable
");
  ?> 
  
  <table style="width:100%">
  <tr>
    <th width="50%">Name</th>
    <th width="10%">Rating</th>
    <th width="30%">Email</th>
    <th width="20%">Phone</th>
  </tr> 
  <?php foreach ($rosters as $roster) { ?>
  <tr>
    <td><?php echo $roster->Name?></td>
    <td><?php echo $roster->NtrpRating?></td>
    <td><?php echo $roster->Email?></td>
    <td>702-345-6789</td>
    <td><input type="button" value="Edit" onclick="document.getElementById('demo').innerHTML = Date()"/> <td>
  </tr>
  <?php } ?>
  
</table> 

 <div id="response">
 <?php 

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $existingRoster = $wpdb->get_results($wpdb->prepare("
    SELECT *
    FROM $mytable
    WHERE Name = %s", 
    $_POST['PlayerName']
    ));
 if (empty($existingRoster) && !empty($_POST['PlayerName'])) {
    echo 'Adding new player ' . $_POST['PlayerName'];
    $wpdb->insert($mytable, array('ID' => (count($rosters) + 1), 'Name' => $_POST['PlayerName'], 'Email' => $_POST['PlayerEmail'], 'NtrpRating' => $_POST['rating']));
 }
 }

 ?>
 				<h3> Add New Player to Roster</h3> <br>
<form action="<?php the_permalink(); ?>" method="post" name="addplayer">
Name:  <input type="text" name="PlayerName" value="<?php if (!empty($_POST['PlayerName']))  { echo $_POST['PlayerName'];} ?>" required/> <br>
Email: <input type="text" name="PlayerEmail" value="<?php if (!empty($_POST['PlayerEmail']))  { echo $_POST['PlayerEmail'];} ?>" required/> <br>
Phone: <input type="text" name="PlayerPhone"/> <br>
Rating: <Select name="rating"> 
    <option value="3.5">3.5</option>
    <option value="4.0">4.0</option>
    <option value="4.5">4.5</option>
</select>
<br> <br>
<input type="submit" value="Add" onclick="window.location.reload()"/>
</form>
</div>

            </div><!-- .entry-content -->
 
          </article><!-- #post -->
 
      <?php endwhile; // end of the loop. ?>
 
<script type="text/javascript">
function validateForm()
{
/* Validating name field */
var x=document.forms["addplayer"]["PlayerName"].value;
if (x==null || x=="")
 {
 alert("Name must be filled out");
 return false;
 }
/* Validating email field */
var x=document.forms["addplayer"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
 {
 alert("Not a valid e-mail address");
 return false;
 }
}
</script>
    </div><!-- #content -->
  </div><!-- #primary -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>