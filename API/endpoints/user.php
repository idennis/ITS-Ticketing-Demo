<?php

  require('../classes/HandleRequest.php');
  //create a request Handler
  $requestHandler = new HandleRequest();

  //get the part of the url after .../user
  $endpoint = isset($_GET['endpoint'])? $_GET['endpoint'] : '';

  $response = null;
  switch($endpoint) {
    case "/new" :
      $result = $requestHandler->createUser();
      $response = array( "success" => $result );
      break;
  };

  //don't send anything if the user didn't hit a valid endpoint
  if(isset($response)){
    echo json_encode($response);
  }
?>
