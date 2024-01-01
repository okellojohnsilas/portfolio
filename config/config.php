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
//   $dbconn = new mysqli('localhost','root','','oj49');
  
  // Application name
  $app_name="JBN";
  
  /* Check connection */ 
  // if ($dbconn->connect_error) {
  //     die("Connection failed: " . $dbconn->connect_error);
  // }
?>