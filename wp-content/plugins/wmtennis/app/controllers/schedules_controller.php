<?php

//require_once dirname(__FILE__).'/wmtennis_loader.php';

spl_autoload_register(function ($class_name) {
    //var_dump($class_name);
    if ( !class_exists( $class ) ) {
        $class_file = WMTENNIS_PLUGIN_PATH . 'classes/' . $class_name . '.php';
        
        if ( is_file( $class_file ) ) {
            
            require_once $class_file;
        }
    }
});


class SchedulesController extends MvcPublicController {
    var $tableHelper;
        
    function __construct() {
        parent::__CONSTRUCT();
        $this->tableHelper = new DataTableHelper('wmtennis-'.$this->model_name);
        //Add DataTables invocation calls.
        //add_action( 'wp_print_footer_scripts', array( $this, 'add_datatable_calls2' ), 11 ); // after inclusion of files
        $this->tableHelper->enqueue_datatables();
        $this->set_rosters();
    }
    
    protected function set_rosters() {
        
        $this->load_model('Roster');
        $rosters = $this->Roster->find(array('selects' => array('id', 'name')));
        $this->set('rosters', $rosters);
        
    }
    
    public function lineup() {
        if (!isset($this->form))
        {
            $this->load_helper('Form');
        }
        //$this->get_post_param_data();
        $this->set_object();
    }
    
    public function add_lineup()
    {
        // Get the data from $_POST
        if (!empty($_POST))
        {
            // placing the post into param's data
            foreach ($_POST as $key => $value)
            {
                $this->params[$key] = $value;
            }
        }
        
        $this->load_model('MatchConfirmation');
        
        // $this->MatchConfirmation->
        if (!empty($this->params['data'][$this->MatchConfirmation->name])) 
        {
            $object = $this->params['data'][$this->MatchConfirmation->name];
            if (empty($object['id'])) 
            {
                $this->MatchConfirmation->create($this->params['data']);
                $this->refresh();
            }
                
        }
        
    }
    
    public function create_or_save() {
        if (!empty($this->params['data'][$this->model->name])) {
            $object = $this->params['data'][$this->model->name];
            if (empty($object['id'])) {
                if($this->model->create($this->params['data'])) {
                    $id = $this->model->insert_id;
                    $url = MvcRouter::public_url(array('controller' => $this->name, 'action' => 'index'));
                    //$this->flash('notice', __('Successfully created!', 'wpmvc'));
                    $this->redirect($url);
                } else {
                    $this->flash('error', $this->model->validation_error_html);
                    $this->set_object();
                }
            } else {
                if ($this->model->save($this->params['data'])) {
                    $this->flash('notice', __('Successfully saved!', 'wpvmc'));
                    $this->refresh();
                } else {
                    $this->flash('error', $this->model->validation_error_html);
                }
            }
        }
    }
    
    public function add_datatable_calls2() {
        $this->tableHelper->JsStart();
        $this->GenerateDocReady();
        $this->GenerateJsonScheduleData();
        $this->GenerateJsonScheduleChildData();
        $this->tableHelper->JsEnd();
    }
    public function add_datatable_calls() {
        // find the model table id
        //print_r( $GLOBALS['wp_actions'] );
        $params = array(
            "paging" => "false",
            "ordering" => "false",
            "info" => "true",
            "searching" => "true",
            "autoWidth" => "true",
            "data" => "data",
            
        );
        $this->tableHelper->JsStart();
        
        //$this->GenerateDocReady();
        
        $this->GenerateJson();
        $this->tableHelper->JsDocReadyStart();
        $this->tableHelper->DataTableInit($params);
        //$this->tableHelper->AddEvent('click', 'td', 'callfunc' );
        $this->tableHelper->JsDocReadyEnd();
        $this->tableHelper->JsEnd();
    }
   
    
    public function GenerateJsonScheduleData()
    {
        $objects = $this->view_vars['objects'];
        $jsonData = 'var testdata = { 
            "data" : [';
        foreach ($objects as $object) {
            $jsonData .= '{';
            $jsonData .= '"date" : ' . '"' . $object->date .  '",';
            $jsonData .= '"home team" : '  . '"' . $object->home_team->name .  '",';
            $jsonData .= '"visit team" : ' . '"' . $object->visit_team->name. '"' ;
            $jsonData .= '},
';
        }
        $jsonData .= ']};';
        echo $jsonData;
    }
       
    public function GenerateJsonScheduleChildData()
    {
        $models = MvcModelRegistry::get_model('MatchConfirmation');
        
        $objects = $this->view_vars['objects'];
        $jsonData = 'var childdata = { "data" : [';
        foreach ($objects as $object) {
            $matchObject = $models->find_by_id($object->match_id);
            $jsonData .= '{';
            $jsonData .= '"time" : ' . '"' . $matchObject->time .  '",';
            $jsonData .= '"position" : '  . '"' . $matchObject->position .  '",';
            $jsonData .= '"player1" : ' . '"' . $matchObject->player->name  . '",';
            if (isset($matchObject->player2) && !empty($matchObject->player2)) {
               $jsonData .= '"player1" : ' . '"' . $matchObject->player2->name . '"';
            }
            $jsonData .= '},';
        }
        $jsonData .= ']};';
        echo $jsonData;
    }
    
    
    public function GenerateDocReady() {
        echo <<<DOCREADY
          $(document).ready(function () {
         var table = $('#wmtennis-Schedule').DataTable({
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
             "order": [[1, 'asc']]
         });

         // Add event listener for opening and closing details
         $('#wmtennis-Schedule tbody').on('click', 'td.details-control', function () {
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
                 row.child(format(childdata.data[row.index()])).show();
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
        
         // `d` is the original data object for the row
         var outstr =  '<table cellpadding="5" cellspacing="0" border="0">' +
               
             '<tr>' +
                 '<td width="50px">Time:</td>' +
                 '<td>' + d.time + '</td>' +
             '</tr>' +
             '<tr>' +
                 '<td width="50px">' + d.position + ':</td>' +
                 '<td>' + d.player1;
         if (d.player2) {
            outstr += '&emsp;/&emsp;' + d.player2 + '</td>'
         }
         outstr += '</tr>';    
         outstr +='</table>';
        return outstr;  
    }
DOCREADY;
        
        /*
var testdata = {
    "data": [
    {
    "date": "2011/04/25",
    "home team": "System Architect",
    "visit team": "$320,800",
    "start_date": "2011/04/25",
    "office": "Edinburgh",
    "extn": "5421"
    },
    {
    "date": "Garrett Winters",
    "home team": "Accountant",
    "visit team": "$170,750",
    "start_date": "2011/07/25",
    "office": "Tokyo",
    "extn": "8422"
    },
    {
    "date": "Ashton Cox",
    "home team": "Junior Technical Author",
    "visit team": "$86,000",
    "start_date": "2009/01/12",
    "office": "San Francisco",
    "extn": "1562"
    },
    ]
    };

        
var childdata = {
    "data": [
    {
    "time": "15:00",
    "position": "1S",
    "player1": "Doug"
    },
    {
    "time": "15:00",
    "position": "2S",
    "player1": "Pei"
    },
    {
    "time": "15:00",
    "position": "1D",
    "player1": "Doug",
    "player2": "Pei"
    },
    ]
    };
*/
    }
        
    public function GenerateDocReady2() {
        echo <<<DOCREADY
          $(document).ready(function () {
         var table = $('#example').DataTable({
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
                 { "data": "name" },
                 { "data": "position" },
                 { "data": "office" },
                 { "data": "salary" }
             ],
             "order": [[1, 'asc']]
         });
         
         // Add event listener for opening and closing details
         $('#example tbody').on('click', 'td.details-control', function () {
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
                 row.child(format(row.data())).show();
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
    
         // `d` is the original data object for the row
         return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
             '<tr>' +
                 '<td>Full name:</td>' +
                 '<td>' + d.name + '</td>' +
             '</tr>' +
             '<tr>' +
                 '<td>Extension number:</td>' +
                 '<td>' + d.extn + '</td>' +
             '</tr>' +
             '<tr>' +
                 '<td>Extra info:</td>' +
                 '<td>And any further details here (images etc)...</td>' +
             '</tr>' +
         '</table>';
    }
    
var testdata = {
    "data": [
    {
    "name": "Tiger Nixon",
    "position": "System Architect",
    "salary": "$320,800",
    "start_date": "2011/04/25",
    "office": "Edinburgh",
    "extn": "5421"
    },
    {
    "name": "Garrett Winters",
    "position": "Accountant",
    "salary": "$170,750",
    "start_date": "2011/07/25",
    "office": "Tokyo",
    "extn": "8422"
    },
    {
    "name": "Ashton Cox",
    "position": "Junior Technical Author",
    "salary": "$86,000",
    "start_date": "2009/01/12",
    "office": "San Francisco",
    "extn": "1562"
    },
    {
    "name": "Cedric Kelly",
    "position": "Senior Javascript Developer",
    "salary": "$433,060",
    "start_date": "2012/03/29",
    "office": "Edinburgh",
    "extn": "6224"
    },
    {
    "name": "Airi Satou",
    "position": "Accountant",
    "salary": "$162,700",
    "start_date": "2008/11/28",
    "office": "Tokyo",
    "extn": "5407"
    },
    {
    "name": "Brielle Williamson",
    "position": "Integration Specialist",
    "salary": "$372,000",
    "start_date": "2012/12/02",
    "office": "New York",
    "extn": "4804"
    },
    {
    "name": "Herrod Chandler",
    "position": "Sales Assistant",
    "salary": "$137,500",
    "start_date": "2012/08/06",
    "office": "San Francisco",
    "extn": "9608"
    },
    {
    "name": "Rhona Davidson",
    "position": "Integration Specialist",
    "salary": "$327,900",
    "start_date": "2010/10/14",
    "office": "Tokyo",
    "extn": "6200"
    },
    {
    "name": "Colleen Hurst",
    "position": "Javascript Developer",
    "salary": "$205,500",
    "start_date": "2009/09/15",
    "office": "San Francisco",
    "extn": "2360"
    },
    {
    "name": "Donna Snider",
    "position": "Customer Support",
    "salary": "$112,000",
    "start_date": "2011/01/25",
    "office": "New York",
    "extn": "4226"
    }
    ]
    };
DOCREADY;
    }
    
    public function GenerateJson()
    {
        $objects = $this->view_vars['objects'];
        $jsonData = 'var data = [';
        foreach ($objects as $object) {
            $jsonData .= '[';
            $jsonData .= '"'. $object->date . '"' .  ',';
            $jsonData .= '"'. $object->home_team->name . '"' .  ',';
            $jsonData .= '"'. $object->visit_team->name . '"';
            
            $jsonData .= '],';
        }
        $jsonData .= '];';
        echo $jsonData;
    }
    public function BuildConfirmationList() {
        echo <<<CFL
             var tr = $(this).closest('tr');
             var tdi = tr.find("i.fa");
             var row = table.row(tr);

             if (row.child.isShown()) {
                 // This row is already open - close it
                 row.child.hide();
                 //tr.removeClass('shown');
                 //tdi.first().removeClass('fa-minus-square');
                 //tdi.first().addClass('fa-plus-square');
             }
             else {
                 // Open this row
                 row.child(format(row.data())).show();
                 //tr.addClass('shown');
                 //tdi.first().removeClass('fa-plus-square');
                 //tdi.first().addClass('fa-minus-square');
             }
         });

         table.on("user-select", function (e, dt, type, cell, originalEvent) {
             if ($(cell.node()).hasClass("details-control")) {
                 e.preventDefault();
             }
         
CFL;
    }
}

?>