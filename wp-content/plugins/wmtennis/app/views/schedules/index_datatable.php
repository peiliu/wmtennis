<div class="page-content">
<h2>Schedules</h2>

<div>
<table id="wmtennis-<?php echo $this->model_name?>" class="display">
 <thead>
  <tr>
    <th></th>
    <th>Date</th>
    <th>Home Team</th>
    <th>Visit Team</th>
  </tr>
  </thead>
</table>
</div>
<div class="results">hello</div>
</div>
<?php echo $this->pagination(); ?>

<script type="text/javascript">
jQuery(document).ready(function($){
	var table = $('#wmtennis-<?php echo $this->model_name?>').DataTable({
        "data": testdata.data,
        select:"single",
        "columns": [
            {
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": '',
                "render": function () {
                    return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                },
                width:"15px"
            },
            { "data": "date" },
            { "data": "home team" },
            { "data": "visit team" }
        ],
        "ordering": false, 
        "paging": false,
        "info": false,
        "searching": false
    });

    // Add event listener for opening and closing details
    $('#wmtennis-<?php echo $this->model_name?> tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var tdi = tr.find("i.fa");
        var row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            tdi.first().removeClass('fa-minus-square');
            tdi.first().addClass('fa-plus-square');
        }
        else {
            // Open this row
            row.child(format(row.index())).show();
            tr.addClass('shown');
            tdi.first().removeClass('fa-plus-square');
            tdi.first().addClass('fa-minus-square');
        }
    });

    table.on("user-select", function (e, dt, type, cell, originalEvent) {
        if ($(cell.node()).hasClass("details-control")) {
            e.preventDefault();
        }
    });
});

function format(d){
	<?php $models = MvcModelRegistry::get_model('MatchConfirmation'); ?>
    // `d` is the original data object for the row
    document.querySelector('.results').innerHTML = d;
    var outstr =  '<table class="display" cellpadding="0" cellspacing="0">' +
        '<tr>' +
           '<th scope="col" class="manage-column">Position</th>' +
           '<th scope="col" class="manage-column"">Time</th>' +
           '<th scope="col" class="manage-column"">Name</th>' +
           '</tr>';
     
    <?php  foreach ($objects as $object) {
            $matchObjects = $models->find(array('conditions' => array($models->name . '.match_id' => $object->match_id))); ?>
    if (d == <?php echo $object->match_id - 1; ?>) {
            <?php foreach ($matchObjects as $matchObject) {
            $rowspan = (($matchObject->player2) && !empty($matchObject->player2)) ? 2 : 1;?> 
            
        outstr += '<tr> <td rowspan="<?php echo $rowspan ?>"> <?php echo $matchObject->position; ?> </td>'; 
        outstr += '<td rowspan="<?php echo $rowspan ?>"> <?php echo $matchObject->time; ?> </td>';
        outstr += '<td>  <?php echo $matchObject->player->name; ?>  </td>'; 
        <?php if ($rowspan > 1) { ?>
        	outstr += '<tr> <td> <?php echo $matchObject->player2->name ?> </td></tr>';
        <?php 
			}
		?>
		outstr +='</tr>'; 
			
     <?php } ?> 
     } 
     <?php } ?>   
    
   outstr +='</table>';
   return outstr;  
}
<?php $this->GenerateJsonScheduleData();?>
</script>


