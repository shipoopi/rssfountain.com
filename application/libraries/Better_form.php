<?php
  /*
   Provides some improvements to the CI form library.
   It adds automatic labels and reduces the amount of 
   code needed in forms by just doing what would
   commonly be needed in a form.

   Load the form helper library before loading this.
   Also, you can use a mix of functions from both
   libraries if you need to be more exact in some cases.
  */


class Better_form{
  //Not really a class, but a collection of 
  //functions. The class is just here to 
  //meet the requirements of a library
  }

function f_open($path, $name, $label=NULL){
  global $current_form, $current_form_label;
  $out = '';
  $current_form = $name;
  if(!$label)
    $label = pretty($name);
  $current_form_label = $label;
  $id_part = 'id="form_'.$name.'"';
  $out.= str_replace('<form', '<form '.$id_part, form_open($path));
  $out.= f_hidden('form_submitted', $name);
  $out.=form_fieldset($label);
  return $out;
}

function f_close(){
  $out = form_fieldset_close();
  $out.= '</form>';
  return $out;
}
function f_hidden($params, $value=NULL){
  if($value==NULL)
      return form_hidden($params);
  return form_hidden($params, $value);
}


function f_dropdown($params, $options, $value=NULL){
  if(!is_array($params)){
    $params = array('name'=>$params);
  }
  $input = form_dropdown($params['name'], $options, $value, data_properties_str($params));
  $params['input'] = $input;
  return f_field('select', $params);
}

//returns a string of data properties that should be in the input tag
function data_properties_str($params){
  $props = '';
  foreach($params as $param=>$value){
    if(is_substr('data-', $param)){
      $prop = $param.'="'.$value.'" ';
      $props.=$prop;
    }
  }  
  return $props;
}

function f_checkbox($name, $label, $checked=FALSE){
  $input = form_checkbox($name, 1);
  return f_field('checkbox', array('name'=>$name, 'label'=>$label, 'input'=>$input));
}

function f_email($params, $value=NULL){
  $type = str_replace('f_', '', __FUNCTION__);
  return str_replace('type="text"', 'type="email"', 
		     f_field('input', $params, $value));
}

function f_input($params, $value=NULL){
  $type = str_replace('f_', '', __FUNCTION__);
  return f_field($type, $params, $value);
}
function f_password($params, $value=NULL){
  $type = str_replace('f_', '', __FUNCTION__);
  return f_field($type, $params, $value);
}

function f_submit($label=NULL){
  global $current_form_label;
  if($label==NULL)
    $label = $current_form_label;
  return form_submit(ugly($label), $label);
}

function f_field($type, $params, $value=NULL){
  if(is_array($params)){
    $name = $params['name'];    
    if(!empty($params['label']))
      $label = $params['label'];
  }else{
    $name = $params;
  }
  if(empty($label))
    $label = pretty($name);
  $out = form_label($label, $name);
  $fun = 'form_'.$type;

  if($value == NULL){
    if(!empty($_POST[$name]))
      $value = $_POST[$name];
  }

  if( (empty($params['input'])) || (!is_array($params)) ) {
    if($value!=NULL)
      $out.=$fun($params, $value);
    else
      $out.=$fun($params);
  }else{
    $out.=$params['input'];
  }
  $out = '<p>'.$out.'</p>';
  return $out;
}

