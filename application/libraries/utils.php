<?php
class Utils{
  }


function pretty_indent_json($json) {

    $result      = '';
    $pos         = 0;
    $strLen      = strlen($json);
    $indentStr   = '  ';
    $newLine     = "\n";
    $prevChar    = '';
    $outOfQuotes = true;

    for ($i=0; $i<=$strLen; $i++) {

        // Grab the next character in the string.
        $char = substr($json, $i, 1);

        // Are we inside a quoted string?
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;

        // If this character is the end of an element,
        // output a new line and indent the next line.
        } else if(($char == '}' || $char == ']') && $outOfQuotes) {
            $result .= $newLine;
            $pos --;
            for ($j=0; $j<$pos; $j++) {
                $result .= $indentStr;
            }
        }

        // Add the character to the result string.
        $result .= $char;

        // If the last character was the beginning of an element,
        // output a new line and indent the next line.
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $result .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos ++;
            }

            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }

        $prevChar = $char;
    }

    return $result;

}

function keys_to_key_value($arr){
  if(!$arr){
    echo 'error in keys_to_key_value';
    return array();
  }
  foreach($arr as $key=>$value){
    $arr[$key] = $key;
  }
  return $arr;
}

function values_to_key_value($arr){
  $out = array();
  foreach($arr as $key=>$value){
     $out[$value] = $value;
  }
  return $out;
}


function img($path){
  $file_path = getcwd().'/images/'.$path;
  if(!file_exists($file_path)){
    file_put_contents('missing_images.txt', $path."\n", FILE_APPEND);
    exec('sort -u missing_images.txt > tmp.txt;');
    exec('cp tmp.txt missing_images.txt ');
    return '';
  }
  return '<img src="images/'.$path.'" />';
}

function a($label, $href, $echo = TRUE){
  $out = '<a href="'.$href.'">'.$label.'</a>';
  if($echo)
    echo $out;
  return $out;
}

//placeholder for translation function
function t($text, $echo = TRUE){
  if($echo)
    echo s($text);
  else
    return s($text);
}


function ugly($text){
  return strtolower(str_replace(' ', '_', $text));
}

function rand_round($val){
  $rand = mt_rand()/mt_getrandmax();
  $decimal = $val - floor($val);
  if($decimal < $rand)
    return floor($val);
  return ceil($val);
}

function println($str){
  echo $str."\n";
}


function table($data, $params=array()){
  $out = '';
  $out.=table_start($params);
  $first_loop = true;

  foreach($data as $row){
    if($first_loop){
	$out.=th($row, $params); 
    } 
    $first_loop = false;
    $out.=tr($row, $params);
  }
  $out.=table_end($params);

  return $out;
}

function table_start($params=array()){
  return '<table>';
}

function table_end($params=array()){
  return '</table>';
}


function th($data, $params){
  $remap_headers = array();
  if(!empty($params['remap_headers']))
    $remap_headers = $params['remap_headers'];
  $out = '<tr>';
  foreach($data as $field=>$value){
    if(is_skip_field($field, $params))
      continue;
    if(isset($remap_headers[$field])){
      $field = $remap_headers[$field];
    }
    if(ends_with($field, '_id')){
      continue;
    }
    $out .= '<th>'.pretty($field).'</th>';
  }
  $out.='</tr>';
  return $out;
}


function ends_with($whole, $end)
{
  if(strlen($end)>strlen($whole))
    return false;
  return (strpos($whole, $end, strlen($whole) - strlen($end)) !== false);
}

function is_skip_field($field, $params=array()){
  if((!empty($params['skip_fields']))&&(in_array($field, $params['skip_fields'])))
    return true;
  if(ends_with($field, '_id'))
    return true;
  if(is_numeric($field))
    return true;
  return false;
}

function tr($data, $params=array()){
  $out = '<tr>';
  foreach($data as $field=>$value){
    if(is_skip_field($field, $params))
      continue;
    $value = s($value);
    $fun = 'format_'.$field;
    if(!empty($params['id'])){
      $f = 'format_'.$params['id'].'_'.$field;
      if(function_exists($f)){
	$fun = $f;
      }
    }
    if(function_exists($fun)){
      $value = $fun($value, $data);
    }else{
      /*
      if(is_substr('_time', $field))
	$value = format_time($value, $data);
      */
    }
    if(is_numeric($value))
      $value = $value + 0;
    $out .= '<td>'.$value.'</td>';
  }
  $out.='</tr>';
  return $out;
}

//make text safe for html display (for user entered values)
function s($str){
  return htmlspecialchars($str);
}

//returns an array where the keys match the values
function k_array($arr){
  $out = array();
  foreach($arr as $val){
    $out[$val] = $val;
  }
  return $out;
}


function counting_array($start, $end){
  $out = array();
  for($i = $start; $i<=$end; $i++){
    $key = (string) $i;
    $out[$key] = $i;
  }
  return $out;
}


function error($err, $collection = 'errors'){
  global ${$collection};
  if((empty(${$collection}))||(!is_array(${$collection}))){
    ${$collection} = array();
  }
  array_push(${$collection}, $err);
  return false;
 }

function array_clone($arr) {
  foreach($arr as $key => $value) {
      if(is_array($value)) 
	$newArray[$key] = array_copy($value);
      elseif(is_object($value)) 
	$newArray[$key] = clone $value;
      else 
	$newArray[$key] = $value;
  }
  return $newArray;
}

function notice($notice){
  error($notice, 'notices');
  return true;
}




function pr($data){
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}

function pretty($str){
  return ucwords(str_replace('_', ' ' , str_replace('___', ' - ', $str)));
}

function random_string($min_length = 10, $max_length=0) {

  if(!$max_length){
    $max_length = $min_length;
  }
  $length = rand($min_length, $max_length);

  $characters = '   0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $randomString;
}

function key_filter($haystack, $needles){
  foreach($haystack as $key=>$value){
    if(!in_array($key, $needles)){
      unset($haystack[$key]);
    }
  }
  return $haystack;
}

function hash_password($username, $password){
  $username = strtolower($username);
  $salt = '$2a$07$'.substr(md5($username), 0, 5);
  return crypt($password, $salt);//bcrypt hashing awesomeness!
}


function get_url($url, $post=''){
  if(!is_substr('http', $url)){
    if(!(first($url)=='/'))
      $url = '/'.$url;
    $url = 'http://'.$_SERVER["HTTP_HOST"].$url;
  }
  if(is_array($post)){
    $post_elements = $post;
    $post = '';
    $amp = '';
    foreach($post_elements as $var=>$val){
      $post.=$amp.urlencode($var).'='.urlencode($val);
      $amp = '&';
    }
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  if($post!=''){
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  }

  $output = curl_exec($ch);

  curl_close($ch);
  return $output;
}

function is_substr($needle, $haystack){
  if($needle){
    $pos = strpos($haystack, $needle);
  }
  if ($pos === false) {
    return false;
  } else {
    return true;
  }
}

function redirect($path){
  $base = str_replace('index.php', '', $_SERVER["SCRIPT_NAME"]);
  header('Location: '.$base.$path);
}
//safe echo string
function p($str){
  echo nl2br(htmlspecialchars($str));
}