    <div class="container_date_selector">
      <form name="date_select" method="get">
      <div class ="date_selector">Select Your Data Range</div>
      <div class ="date_selector_start">Start Date <input type="text" id="datepickerStart" name="date_start" value="<?php echo @$_REQUEST['date_start']?>" /></div>
      <div class ="date_selector_end">End Date <input type="text" id="datepickerEnd" name="date_end" value="<?php echo @$_REQUEST['date_end']?>"/></div>

      <div class="text_search">Text <input type="textsearch" id="textsearch" name="textsearch" value="<?php echo @$_REQUEST['textsearch']?>"/></div>
      

      <input type="submit" class="date_submit" value="Search">
      </form>
    </div>
    <?php if(isset($allow_filter_date)):?>
    <div class="data_range_results">
      <div class="data_range_l">Date Range 01/01/13 - 01/31/13</div>
      <div class="data_results_r">Showing Results 1 - 25 out of 250</div>
    </div>
    <?php endif;?>
    <div class="container_report">
