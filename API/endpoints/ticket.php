<?php

  require('../classes/HandleRequest.php');
 //create a request Handler
  $requestHandler = new HandleRequest();

  //get the part of the url after .../ticket
  $endpoint = isset($_GET['endpoint'])? $_GET['endpoint'] : '';

  //if the url pointer to /ticket/new, create a new ticket
  $response = null;
  switch($endpoint) {
    case "/new" :
      $result = $requestHandler->createNewTicket();
      $response = ($result == FALSE)
        ? array( "success" => $result )
        : array( "success" => TRUE, "ticketId" => $result );
      break;
    case "/close" :
      $result = $requestHandler->closeTicket();
      $response = array( "success" => $result );
      break;
    case "/view" :
      $result = $requestHandler->viewTicketAndComments();
      $response = (isset($result['ticketInfo']) && $result['ticketInfo'] != FALSE)
        ? array( "success" => TRUE, "ticket" => $result['ticketInfo'] )
        : array( "success" => FALSE );
      break;
    case "/ticketUser" :
      $result = $requestHandler->viewTicketAndUser();
      $response = ((isset($result['ticketInfo']) && $result['ticketInfo'] != FALSE)
                    && isset($result['userInfo']) && $result['userInfo']
                  ) ? array( "success" => TRUE, "ticket" => $result['ticketInfo'], "user" => $result['userInfo'])
                    : array( "success" => FALSE );
      break;
    case "/update" :
      $result = $requestHandler->updateTicket();
      $response = array("success" => $result);
      break;
    case "/viewAll" :
      $result = $requestHandler->viewAllTickets();
      $response = isset($result)
                  ? array("success" => TRUE, "tickets" => $result)
                  : array("success" => FALSE);
      break;
  };

  //don't send anything if the user didn't hit a valid endpoint
  if(isset($response)){
    echo json_encode($response);
  } else {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    // Write a notfound page and include it here
    // include("notFound.php");

  }
?>
