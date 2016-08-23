<?php

/* Format of the request for
  /new
  {
    "user":{
        "firstName":"John",
        "lastName":"Doe",
        "email":"poo@ko.com"
    },
    "ticket":{
        "osType": "Mac",
        "primaryIssue": "Issue here",
        "additionalNotes": "Addition notes here"
    }
  }

  /view && /close
  {
    "ticketId": 1
  }

 */

  require($_SERVER['DOCUMENT_ROOT'].'/WDA/API/classes/HandleRequest.php')
  echo json_encode($response);
  //create a request Handl
  $requestHandler = new HandleRequest();

  //get the part of the url after .../ticket
  $endpoint = isset($_GET['endpoint'])? $_GET['endpoint'] : '';

  //if the url pointer to /ticket/new, create a new ticket
  $result = null;
  switch($endpoint) {
    case "/new" :
      $result = $requestHandler->createNewTicket();
      break;
    case "/view" :
      $result = $requestHandler->viewTicketAndComments();
      break;
    case "/close" :
      $result = $requestHandler->closeTicket();
      break;
  };

  //return the result of the ticket creation
  $response = array( "success" => $result );

  //don't send anything if the user didn't hit a valid endpoint
  if(isset($result)) echo json_encode($response);

?>
