<?php 
/*
Plugin Name: My Plugin
Plugin URI: http://www.example.com/myplugin
Description: This is a really great plugin that extends WordPress.
Version: 1.0.0
Author: Pei Liu
Author URI: http://www.wmtennis.com:8000
*/

function displayShortCodeAtts($atts) {
    //return strtoupper($title);
    //$myphpinf = phpinfo();
    extract(shortcode_atts(array("mytitle2" => '', "mytitle3" =>''), $atts));
    
    return $mytitle2 . " ".$mytitle3;
}

/*
add_filter('the_title', 'capitalizeTitle');
*/
/**
 * Adds a custom field that prompts the user for their favorite
 * color.
 * @return void
 */
/*
function drawCustomField() {
    echo '<p><label>Favorite Color:<br />';
    echo '<input autocomplete="off" class="input" name="fav_color" ';
    echo ' id="fav_color" size="25"';
    echo ' value="' . $_POST['fav_color'] . '" type="text" tabindex="32" />';
    echo '</label><br /></p>';
}
*/
/* now add the action */
/*
add_action('register_form', 'drawCustomField');
*/

add_shortcode('myfirstplugin','displayShortCodeAtts');
