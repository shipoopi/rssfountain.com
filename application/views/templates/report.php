<?php $this->load->view('templates/report_top', array('data'=>$report_data));?>
<?php $this->load->view('templates/table', array('data'=>$report_data, 'labels'=>$labels));?>
<?php $this->load->view('templates/report_bottom', array('data'=>$report_data))?>
