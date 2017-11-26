<h2>Schedules</h2>

<div class="table-container">
<table id="wmtennis_schedule" class="tablepress">
 <thead>
  <tr>
 <?php //   <th class="column-1" width=100px>Available</th> ?>
 	<th class="column-2">Id</th> 
    <th class="column-2">Date</th>
    <th class="column-2">Time</th>
    <th class="column-3">Home Team</th>
    <th class="column-4">Visit Team</th>
  </tr>
  </thead>
</table>
</div>


<?php if(is_user_logged_in()) { ?>
<div class="popupbg_div">
    <div id="lineup_area">
        <img src="<?php echo WMTENNIS_PLUGIN_URL;?>/assets/win_cancel.png" class="img" id="cancel"/>
        <h3 class="matchdetails"><span id="home_team"></span> vs <span id="visit_team"></span> @ <span id="datetime"></span></h3>
        <p>
        Match Address: <span id="home_address"> </span>  
        </p>	
        <table id="wmtennis_lineup">
         <thead>
          <tr>
         	<th class="column-2">Position</th> 
            <th class="column-2">Time</th>
            <th class="column-2">Player1</th>
            <th class="column-3">Player2</th>
          </tr>
          </thead>
        </table>
        <div id='confirmarea'>
            <button id="bConfirm">Confirm</button>
            <button id="bUnavailable">Unavailable</button>
        </div>
    </div>
</div>
<?php }?>