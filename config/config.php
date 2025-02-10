<?php 
  /* Start Session */ 
  session_start();
  
  /* Base Url */ 
  function base_url(){
    $config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http');
    $config['base_url'] .= '://'.$_SERVER['HTTP_HOST'];
    $config['base_url'] .= '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/';
    return $config['base_url'];
	}
  
  /* Database connection */ 
  // For Localhost
  // $dbconn = new mysqli('localhost','root','','oj49');
  // For Hpanel
  // $dbconn = new mysqli('localhost', 'u855455374_okello_1', '~9TfBZuW]49', 'u855455374_jbn');
  // Application name
  $app_name="OKELLO JOHN SILAS";
?>