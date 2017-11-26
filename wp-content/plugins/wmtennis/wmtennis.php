<?php
/*
Plugin Name: Wmtennis
Plugin URI: 
Description: 
Author: 
Version: 
Author URI: 
*/

define( 'WMTENNIS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WMTENNIS_PLUGIN_URL', plugin_dir_url(__FILE__ ));

/*
register_activation_hook(__FILE__, 'wmtennis_activate');
register_deactivation_hook(__FILE__, 'wmtennis_deactivate');

function wmtennis_activate() {
    global $wp_rewrite;
    require_once dirname(__FILE__).'/wmtennis_loader.php';
    $loader = new WmtennisLoader();
    $loader->activate();
    $wp_rewrite->flush_rules( true );
}

function wmtennis_deactivate() {
    global $wp_rewrite;
    require_once dirname(__FILE__).'/wmtennis_loader.php';
    $loader = new WmtennisLoader();
    $loader->deactivate();
    $wp_rewrite->flush_rules( true ); 
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wmtennis-activator.php
 */
function activate_wmtennis() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wmtennis-activator.php';
	Wmtennis_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wmtennis-deactivator.php
 */
function deactivate_wmtennis() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wmtennis-deactivator.php';
	Wmtennis_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wmtennis' );
register_deactivation_hook( __FILE__, 'deactivate_wmtennis' );

/*
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


add_action( 'wp_ajax_my_action', 'my_action' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action' );
function my_action() {
    global $wpdb; // this is how you get access to the database
    
    require_once dirname(__FILE__).'/app/controllers/schedules_controller.php';
    $scheduleMgr = new SchedulesController();
    $scheduleMgr->init();
    echo $scheduleMgr->get_schedules();
    
    $whatever = intval( $_POST['whatever'] );
    
    $whatever += 10;
    
    //echo $whatever;
    
    wp_die("hello world!"); // this is required to terminate immediately and return a proper response
}
*/

/*
require plugin_dir_path( __FILE__ ) . 'core/mvc_file_includer.php';
function IncludeFile($class_name) {
    $fileIncluder = new MvcFileIncluder();
    $fileIncluder->require_first_app_file_or_core_file('mvc_inflector.php');
    if ( !class_exists( $class_name ) ) {
        if ($fileIncluder->require_first_app_file_or_core_file(MvcInflector::underscore($class_name).'.php') == false) {
            echo '[cannot resolve class ' . $class_name . '] <br/>';
        }
    }
}

spl_autoload_register('IncludeFile');
*/    
/*
function wmtennis_schedule () {
  
    require_once dirname(__FILE__).'/app/controllers/schedules_controller.php';
    $scheduleMgr = new SchedulesController();
    
    //$scheduleMgr->name = 'Schedules';
    $scheduleMgr->action = 'index';
    $scheduleMgr->init();
   
    $params = array ( 'controller' => 'schedules', 'action' => 'index');
    $scheduleMgr->params = $params;
    
    $response = $scheduleMgr->index();
    //echo "Hello from WMTENNIS, current url " . $current_url;
    //echo '</div></div></main></div>';
    $scheduleMgr->render_view($scheduleMgr->views_path.index, $params);
    echo "</main></div>";
    return $response;
    
}
*/
//add_shortcode('wmtennis_schedule', wmtennis_schedule);

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wmtennis.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wmtennis() {    
    $plugin = new Wmtennis();
    /*
    if (!class_exists('SchedulesController'))
    {
        echo "SchedulesController class not exist";
        require_once WMTENNIS_PLUGIN_PATH . 'core/controllers/mvc_controller.php';
        require_once WMTENNIS_PLUGIN_PATH . 'core/controllers/mvc_public_controller.php';
        require_once dirname(__FILE__).'/app/controllers/schedules_controller.php';
        wmtennis_schedule();
    }
    
    */
    
    $plugin->run();
    
}
run_wmtennis();


