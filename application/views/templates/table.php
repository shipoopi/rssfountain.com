<?php
if(!isset($data))
  echo 'data not set';
if(!$data)
  echo 'no data';

if((!isset($labels))||(count($labels)==0)){
   $labels = array_map('pretty', keys_to_key_value($data[0]));
}
if(!isset($skipped_fields))
  $skipped_fields = array();
$column = 0;
$data_hide = '';

if(!isset($major_fields))
   $major_fields = array();
$expand = '';
foreach($labels as $field=>$label){
   if(count($major_fields)>=4){
     $expand = 'data-class="expand"';
     break;
   }
   $major_fields[] = $field;
}
?>

<p>Record Count: <?php echo count($data)?></p>
<table class="footable"  data-filter="#filter">
  <thead>
    <tr>
    <?php foreach($labels as $field=>$label):?>
    <?php if(in_array($field, $skipped_fields)) continue;?>
      <?php $data_hide=''?>
      <?php if(!in_array($field, $major_fields)) $data_hide='phone,tablet';?>
      <th <?php echo $expand?> data-hide="<?php echo $data_hide?>"><?php echo $label?></th>
      <?php $expand = '';?>
    <?php endforeach;?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $record):?>
    <tr>
      <?php foreach($labels as $field=>$label):?>
        <?php if(in_array($field, $skipped_fields)) continue;?>
      <td>
	<?php echo htmlentities($record[$field])?>
      </td>
      <?php endforeach;?>
    </tr>
  <?php endforeach;?>    
  </tbody>
</table>
