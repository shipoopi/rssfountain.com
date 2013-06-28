        <!-- Navigation Menu -->
        <div class="nav_menu">
          <ul id="nav">
          <li>
              <a href="#" class="nav1">Users</a>
          </li>
          <li>
              <a href="#" class="nav2">Reports</a>
<?php
   /* Get the list of reports for the header menu */
    global $reports_loaded;
    if(!isset($reports_loaded))
      require_once('application/controllers/reports.php');
    foreach(get_class_methods('Reports') as $m){
      if(is_substr('report_', $m))
       $reports[$m] = pretty(str_replace('report_' ,'', $m));
   }
?>
              <ul>
		<?php foreach($reports as $m=>$disp):?>
		  <li><a href="reports/<?php echo $m?>"><?php echo $disp?></a></li>
		<?php endforeach;?>
              </ul>
          </li>
          </ul>
        </div>
        <!-- End Navigation Menu -->
