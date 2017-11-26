<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       wmtennis.com:8000
 * @since      1.0.0
 *
 * @package    Wmtennis
 * @subpackage Wmtennis/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wmtennis
 * @subpackage Wmtennis/includes
 * @author     Pei <pei_liu@hotmail.com>
 */
class Wmtennis {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wmtennis_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wmtennis';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wmtennis_Loader. Orchestrates the hooks of the plugin.
	 * - Wmtennis_i18n. Defines internationalization functionality.
	 * - Wmtennis_Admin. Defines all hooks for the admin area.
	 * - Wmtennis_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wmtennis-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wmtennis-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wmtennis-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wmtennis-public.php';

		/**
		 * The class responsible for handling short codes.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wmtennis-shortcodes.php';
		
		/**
		 * The class responsible for handling ajax request
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wmtennis-ajax-handlers.php';
		
		/**
		 * load all the mvc dependent core files
		 */
		$this->load_core();
		$this->load_models();
		$this->load_controllers();
		$this->loader = new Wmtennis_Loader();
		
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wmtennis_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Wmtennis_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Wmtennis_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		//$plugin_public = new Wmtennis_Public( $this->get_plugin_name(), $this->get_version() );

		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		//$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	    //$scheduleMgr = new SchedulesController();
	    //$scheduleMgr->get_schedules();
	    
	    //add_shortcode('wmtennis_schedule', wmtennis_schedule);
	    
	    add_action( 'wp_ajax_lineup_action', 'lineup_action' );
	    add_action( 'wp_ajax_nopriv_lineup_action', 'lineup_action' );
	    
	    add_action( 'wp_ajax_confirm_action', 'confirm_action' );
	    add_action( 'wp_ajax_nopriv_confirm_action', 'confirm_action' );
	    
	    /*
	    $scheduleMgr->action = 'index';
	    $scheduleMgr->init();
	    
	    $params = array ( 'controller' => 'schedules', 'action' => 'index');
	    $scheduleMgr->params = $params;
	    
	    $response = $scheduleMgr->index();
	    //echo "Hello from WMTENNIS, current url " . $current_url;
	    //echo '</div></div></main></div>';
	    $scheduleMgr->render_view($scheduleMgr->views_path.index, $params);
        */
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wmtennis_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
	
	/**
	 * Load all necessary mvc core files
	 */
	protected function load_core() {
	    $this->core_path = WMTENNIS_PLUGIN_PATH.'core/';
	    $files = array(
	        'mvc_error',
	        'mvc_configuration',
	        //'mvc_directory',
	        //'mvc_dispatcher',
	        //'mvc_file',
	        'mvc_file_includer',
	        'mvc_model_registry',
	        'mvc_object_registry',
	        'mvc_controller_registry',
	        //'mvc_settings_registry',
	        //'mvc_plugin_loader',
	        //'mvc_templater',
	        'mvc_inflector',
	        'mvc_router',
	        //'mvc_settings',
	        'controllers/mvc_controller',
	        //'controllers/mvc_admin_controller',
	        'controllers/mvc_public_controller',
	        //'functions/functions',
	        'models/mvc_database_adapter',
	        'models/mvc_database',
	        'models/mvc_data_validation_error',
	        'models/mvc_data_validator',
	        'models/mvc_model_object',
	        'models/mvc_model',
	        //'models/wp_models/mvc_comment',
	        //'models/wp_models/mvc_comment_meta',
	        //'models/wp_models/mvc_post_adapter',
	        //'models/wp_models/mvc_post',
	        //'models/wp_models/mvc_post_meta',
	        //'models/wp_models/mvc_user',
	        //'models/wp_models/mvc_user_meta',
	        'helpers/mvc_helper',
	        'helpers/mvc_form_tags_helper',
	        'helpers/mvc_form_helper',
	        'helpers/mvc_html_helper'
	        //'shells/mvc_shell',
	        //'shells/mvc_shell_dispatcher'
	    );
	    
	    foreach ($files as $file) {
	        $newfile = $this->core_path.$file.'.php';
	        if(is_file($newfile)) {
	           require_once $this->core_path.$file.'.php';
	        }
	    }
	    
	}
	
	/**
	 * Load all the mvc models in the models directory
	 */
	protected function load_models() {
	    
	    $models = array();
	    
	    $this->file_includer = new MvcFileIncluder();
	    $this->plugin_app_paths = array( WMTENNIS_PLUGIN_PATH.'app/');
	    foreach ($this->plugin_app_paths as $plugin_app_path) {
	        
	        $model_filenames = $this->file_includer->require_php_files_in_directory($plugin_app_path.'models/');
	        
	        foreach ($model_filenames as $filename) {
	            $models[] = MvcInflector::class_name_from_filename($filename);
	        }
	        
	    }
	    
	    $this->model_names = array();
	    
	    foreach ($models as $model) {
	        $this->model_names[] = $model;
	        $model_class = MvcInflector::camelize($model);
	        $model_instance = new $model_class();
	        MvcModelRegistry::add_model($model, $model_instance);
	    }
	    
	}
	/**
	 * Load all the mvc controllers in the controllers directory
	 */
	protected function load_controllers() {
	    $controllers = array();
	    
	    $this->file_includer = new MvcFileIncluder();
	    $this->plugin_app_paths = array( WMTENNIS_PLUGIN_PATH.'app/');
	    foreach ($this->plugin_app_paths as $plugin_app_path) {
	        
	        $controller_filenames = $this->file_includer->require_php_files_in_directory($plugin_app_path.'controllers/');
	        
	        foreach ($controller_filenames as $filename) {
	            $controllers[] = MvcInflector::class_name_from_filename($filename);
	        }
	        
	    }
	    
	    $this->controller_filenames = array();
	    
	    foreach ($controllers as $controller) {
	        $this->controller_filenames[] = $controller;
	        $controller_class = MvcInflector::camelize($controller);
	        $controller_instance = new $controller_class();
	        MvcControllerRegistry::add_controller($controller, $controller_instance);
	    }
	}

}
?>
