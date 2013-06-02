<?php
$page = @$_REQUEST['page'];
if(!$page) $page = 1;
$pages = ceil($results/results_per_page);

<div class="data_pagination">
  <a href="<?php echo $page-1?>">Prev</a>
  <a href="?page=1">1</a>
  <?php foreach(
  1   2   3   4   5   ...   10   Next</div>
