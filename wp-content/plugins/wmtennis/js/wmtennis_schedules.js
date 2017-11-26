	jQuery(document).ready(function($) {
		
		 $("#bCancel").click(function() {
		        $(this).parent().parent().parent().hide();
		    });

		 $("#cancel").click(function() {
		        $(this).parent().parent().hide();
		    });
		 
		$('#wmtennis_schedule').DataTable( {
			"ajax": { 
				url : ajax_object.ajax_url,
				data : {
					"action" : "schedule_action"
				},
				dataSrc: ""				
			},
			 "columnDefs": [
		            {
		                "targets": [ 0 ],
		                "visible": false		   
		            }
		        ],
		    "fnRowCallback": function (nRow, aData, iDisplayIndex) {
		    	$(nRow).addClass('row');
		    },
			rowId: 'Id',
			"searching": false,
		    "ordering": false,
		    "paging":   false,
		    "info":     false,
			"columns": [
				{ "data": "Id" },
				{ "data": "Date" },
                { "data": "Time" },
                { "data": "Home Team" },
                { "data": "Visit Team" }                		            
	        ]
	    } );
		
		
		function GetScheduleLineup(id) {
			
			var action = {
					'action': 'lineup_action',
					'lineup_id': id
				};
			var results;
			$.post( ajax_object.ajax_url, action, function(response) {
				//alert('Got this from the server: ' + response);
				var dataSet = $.parseJSON(response);
				$('#wmtennis_lineup').DataTable( {
					"searching": false,
				    "ordering": false,
				    "paging":   false,
				    "info":     false,
				       data: dataSet,
				       "bDestroy": true,
				       "autoWidth" : false,
				       "columns": [
				            { "data": "Position", "width" : "20%" },
				            { "data": "Time", "width" : "20%" },
				            { "data": "Player", "width" : "30%" },
				            { "data": "Player2", "width" : "30%" }
				        ]
				    } );
				results = response;
				return results;
			});
			
			
			
		}
		
		function SetHomeAddress(id) {
			
			var action = {
					'action': 'home_address_action',
					'schedule_id': id
				};
			var results;
			$.post( ajax_object.ajax_url, action, function(response) {
				$('#home_address').text(response);
			});						
		}
		var stable = $('#wmtennis_schedule').DataTable();
		 
		$('#wmtennis_schedule').on( 'click', 'tr', function () {
			var id = stable.row( this ).id();
			var results = GetScheduleLineup(id);
			$('#home_team').text($('td:eq(2)', this).html());
			$('#visit_team').text($('td:eq(3)', this).html());
			$('#datetime').text($('td:eq(0)', this).html());
			SetHomeAddress(id);
			//$('div.popup_div').css("display", "block");
			//$('#wmtennis_lineup').addClass('tablepress');
			//$.post( ajax_object.ajax_url, action, function(response) {
			//	alert('Got this from the server: ' + response);
			//	var dataSet = $.parseJSON(response);
				
			//$('#wmtennis_lineup').DataTable( {
			//       data: results,
			//       columns: [
			//            { title: "Position" },
			//            { title: "Time" },
			//            { title: "Player" },
			//            { title: "Player2" }
			//        ]
			//    } );
			$('div.popupbg_div').css("display", "block");
			$('#wmtennis_lineup').addClass('tablepress');
			    
				
			//});
			
		    //alert( 'Clicked row id '+id );
		    //alert( table.cell( this ).data() );
		} );
		
		$( stable.table().body() )
	    .addClass( 'row-hover' );
		/*
		table.on( 'select', function ( e, dt, type, indexes ) {
		    if ( type === 'row' ) {
		        var data = table.rows( indexes ).data().pluck( 'id' );
		 
		        // do something with the ID of the selected items
		    }
		} );
		*/
		/*
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post( ajax_object.ajax_url, action, function(response) {
			alert('Got this from the server: ' + response);
			var dataSet = $.parseJSON(response);
			
			$('#wmtennis_schedule').DataTable( {
		        data: dataSet,
		        columns: [
		            { title: "Time" },
		            { title: "Home Team" },
		            { title: "Visit Team" }		            
		        ]
		    } );
		    
			
		});
		*/
		
	});
