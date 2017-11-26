	jQuery(document).ready(function($) {

		//jQuery.ajax({
	    //      type:'POST',
	    //      data:{
	    //        action:'my_action',
	    //        id:'testValue'
	    //      },
	    //      url: "http://wmtennis.com:8000/wp-admin/admin-ajax.php",
	    //      success: function(value) {
	    //        jQuery(this).html(value);
	    //      }
	    //    });
        
		//alert('Got this!' + ajax_object.ajax_url);
		var data = {
			'action': 'schedule_action',
			'whatever': 1234
		};

		
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post( ajax_object.ajax_url, data, function(response) {
			alert('Got this from the server: ' + response);
		});
	});
