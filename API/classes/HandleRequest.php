<?php
  require($_SERVER['DOCUMENT_ROOT'] . '/WDA/API/classes/AbstractApi.php');
  /**
   * Concrete Class implementation of AbstractApi, this HandleRequest class
   * is made to handle JSON POST requests and will process and use a raw JSON
   * AJAX call
   */
  class HandleRequest extends AbstractApi{

    /**
     * @property array - The parsed JSON request
     */
    private $jsonRequest = null;

    public function __construct() {
      parent::__construct();
      $this->jsonRequest = json_decode(file_get_contents('php://input'), TRUE);
    }

    public function __destruct() {
      parent::__destruct();
    }

    /**
     * function that grabs user data from the Request JSON and creates the
     * user in the database
     *
     * @return boolean
     */
    public function createUser() {
    //grab the user data from the JSON
    $user = $this->jsonRequest["user"];

    //create the user
    return parent::createUserDB($user["firstName"], $user["lastName"], $user["email"]);
    }

    /**
     * Create a new ticket for the user
     *
     * @return bool
     */
    public function createNewTicket() {

      //grab the user and the ticket data from the JSON
      $user = $this->jsonRequest["user"];
      $ticket = $this->jsonRequest["ticket"];

      //if the user or the ticket data is not set, return false
      if( !isset($user) || !isset($ticket) ) return false;
      //check to see if the user is already in the databaseName
      $userId = parent::getUserIdByEmail($user['email']);
      if(!isset($userId)) {
        //if the user does not exist, create the user
        $couldCreateUser = parent::createUserDB($user["firstName"], $user["lastName"], $user["email"]);
        //if we could not create the user, return false
        if(!$couldCreateUser) return false;

        //grab the userID
        $userId = parent::getUserIdByEmail($user['email']);

        //if we still cannot get the user ID, return false
        if(!isset($userId)) return false;
      }

      //create the ticket
      $aditionalNotes = isset($ticket['additionalNotes']) ? $ticket['additionalNotes'] : "";
      $couldCreateTicket = parent::createTicket($userId,
                                    $ticket['subject'],
                                    $ticket['osType'],
                                    $ticket['primaryIssue'],
                                    $aditionalNotes);

      return $couldCreateTicket;
    }

    /**
     * Create a new comment
     *
     * @return bool
     * @note we can remove the create user later
     */
    public function createNewComment() {
      $user = $this->jsonRequest["user"];
      $comment = $this->jsonRequest["comment"];

      //if the user or the ticket data is not set, return false
      if( !isset($user) || !isset($comment) )return false;

      $userId = parent::getUserIdByEmail($user['email']);

      if(!isset($userId)) {

        $couldCreateUser = parent::createUserDB($user["firstName"], $user["lastName"], $user["email"]);

        if(!$couldCreateUser) return false;

        $userId = parent::getUserIdByEmail($user['email']);

        if(!isset($userId)) return false;
      }
      $ticketId = intval($comment['ticketId']);
      if(is_nan($ticketId)) {
        return false;
      }

      $couldCreateNewComment = parent::createComment($ticketId, $comment["comment"], $userId);
      return $couldCreateNewComment;
    }

    /**
     * Create a new comment under the dummy staff account
     *
     * @return bool
     * @note we can remove the create user later
     */
     public function createNewStaffComment() {
       $comment = $this->jsonRequest["comment"];

       //if the user or the ticket data is not set, return false
       if( !isset($comment) )return false;

       $userId = parent::getUserIdByEmail("staff@wda.its.com");

       if(!isset($userId)) {

         $couldCreateUser = parent::createStaffDB("Dummy", "Staff", "staff@wda.its.com");

         if(!$couldCreateUser) return false;

         $userId = parent::getUserIdByEmail("staff@wda.its.com");

         if(!isset($userId)) return false;
       }
       $ticketId = intval($comment['ticketId']);
       if(is_nan($ticketId)) {
         return false;
       }

       $couldCreateNewComment = parent::createComment($ticketId, $comment["comment"], $userId);
       return $couldCreateNewComment;
     }

    /**
     * View the tickets and their comments
     *
     * @return false if ticket number isnt found, else returns array with information
     */
    public function viewTicketAndComments() {
      $ticket = $this->jsonRequest["ticketId"];

      $ticketInfo = parent::getTicketInfo($ticket);
      if($ticketInfo === -1) {
        return false;
      }
      $commentList = parent::getCommentsFromTicket($ticket);

      $resultArray = array("ticketInfo" =>$ticketInfo, "commentList"=>$commentList);
      return $resultArray;
    }

  /**
   * View the tickets and the submitter information
   *
   * @return false if ticket number or user isn't found, else returns array with information
   */
    public function viewTicketAndUser() {
        $ticket = $this->jsonRequest["ticketId"];

        $ticketInfo = parent::getTicketInfo($ticket);

        if($ticketInfo === -1) {
            return false;
        }

        $userInfo = parent::getUserInfoById($ticketInfo['submitter_id']);

        if($userInfo === NULL) {
            return false;
        }

        $userAndTicketInfo = array("ticketInfo" => $ticketInfo, "userInfo" => $userInfo);
        return $userAndTicketInfo;
    }

    /**
     * Update the target ticket with the following information
     */
     public function updateTicket() {

       $ticket = $this->jsonRequest["ticket"];

       //make sure we got the ticket id
       if(!isset($ticket['ticketId'])) return false;

       //check to see we have all of the needed fields to update the ticket,
       //if not, then just fill those fields with what the ticket already has
       $oldTicket = parent::getTicketInfo($ticket['ticketId']);

       if(!isset($ticket['subject'])) $ticket['subject'] = $oldTicket['subject'];
       if(!isset($ticket['osType'])) $ticket['osType'] = $oldTicket['os_type'];
       if(!isset($ticket['primaryIssue'])) $ticket['primaryIssue'] = $oldTicket['primary_issue'];
       if(!isset($ticket['additionalNotes'])) $ticket['additionalNotes'] = $oldTicket['additional_notes'];
       if(!isset($ticket['status'])) $ticket['status'] = $oldTicket['status'];
       if(!isset($ticket['submitterId'])) $ticket['submitterId'] = $oldTicket['submitter_id'];

       return parent::updateTicketDB($ticket['ticketId'],
                                      $ticket['subject'],
                                      $ticket['osType'],
                                      $ticket['primaryIssue'],
                                      $ticket['additionalNotes'],
                                      $ticket['status'],
                                      $ticket['submitterId']);
     }

    /**
     * View the all tickets and the submitter information
     */
    public function viewAllTickets() {
        return parent::getAllTicketsInSystem();
    }

    /**
     * Close ticket
     *
     * @return false if ticket number isnt found
     */
    public function closeTicket(){
      $ticket = $this->jsonRequest["ticketId"];
      $result = parent::closeTicketDB($ticket);
      return $result;
    }
  }
?>
