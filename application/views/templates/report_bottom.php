    </div>
    <div class="below_data_results_container">
      <?php if(@$show_pagenation):?>

      <?endif;?>
      <div class="data_export_btn">
	<form method="get">
	  <input type="hidden" name="date_end" value="<?php echo @$_REQUEST['date_end']?>">
	  <input type="hidden" name="date_start" value="<?php echo @$_REQUEST['date_start']?>">
	  <input type="submit" name="export" class="submit" value="Export CSV">
	  <input type="submit" name="export" class="submit" value="Export JSON">
	</form>
      </div>
    </div>
