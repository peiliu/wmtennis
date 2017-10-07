<?php
/**
 * Datatable helper that uses the DataTable javascript.  see https://datatables.net/
 *
 * @package wmtennis
 * @subpackage Helpers
 * @author Pei Liu
 * @since 1.0.0
 */

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

class DataTableHelper {

    var $tablename;
    function __construct($tablename) {
        $this->tablename = $tablename;
    }
	/**
	 * Enqueue the DataTables JavaScript library and its dependencies.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_datatables() {
	    wp_deregister_script( 'jquery' );
	    wp_register_script(   'jquery', '//code.jquery.com/jquery-1.12.4.js');
	    wp_enqueue_script(‘jquery’);
	    //$js_url = '//code.jquery.com/jquery-1.12.4.js';
	   // wp_enqueue_script( 'jquery-datatables', $js_url, null, true );
	    $css_url = '//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css';
	    wp_enqueue_style( 'wmtennis-datatable-style', $css_url);
	    $js_url = '//cdn.datatables.net/1.10.15/js/jquery.dataTables.js';
		// wp_enqueue_script( 'wmtennis-datatables', $js_url, array( 'jquery-core' ) );
	    wp_enqueue_script( 'wmtennis-datatables', $js_url, array('jquery'));
	}
	
	public function JsStart () {
	    echo '<script type="text/javascript">';
	}
	
	public function JsEnd () {
	    echo '</script>';
	}
	
	public function JsDocReadyStart() {
	    echo <<<JST
jQuery(document).ready(function($){
JST;
	}
	    
	public function JsDocReadyEnd() {
	    echo <<<JSE
});
JSE;
	}
	   
	
	/**
	 * Add JS code for invocation of DataTables JS library.
	 *
	 * @since 1.0.0
	 * 
	 * $html_id: table html element id
	 * $table_options: options accepted by datatable
	 *     order, orderClasses, stripeClasses, pagingType, etc
	 *
	 * @todo 
	 * localization
	 * options
	 *     
	 */
	public function DataTableInit( $table_options = '') {
	    if ( empty( $this->tablename ) ) {
	        // There are no tables with activated DataTables on the page that is currently rendered.
	        return;
	    }
	    
	    
	    // Generate the specific JS commands, depending on chosen features on the "Edit" screen and the Shortcode parameters.
	    $commands = array();
	    
	    
	    //$parameters = array();
	    $parameters .= '{';
	    foreach($table_options as $option_key => $option_value) {
	        $parameters .= $option_key . ': '. $option_value.', ';
	    }
	    //$parameters = implode( ',', $table_options );
	    //$parameters = ( ! empty( $parameters ) ) ? '{' . $parameters . '}' : '';
	    $parameters .= '}';
	    
	    $command = "$('#{$this->tablename }').dataTable({$parameters});";
	       	    
	    // DataTables language/translation handling.
	    $datatables_strings = '';
	    	    
	    // Echo DataTables strings and JS calls.
//	    echo <<<JS
//<script type="text/javascript">
//jQuery(document).ready(function($){
//{$datatables_strings}{$command}
//});
//</script>
//JS;
        echo <<<JS
{$datatables_strings}{$command}
JS;
	}
}

?>