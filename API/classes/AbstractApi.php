<?php
  require($_SERVER['DOCUMENT_ROOT'].'/WDA/db/DatabaseHandler.php');
  /**
   * Class that handles the interaction between the API and the Database, Abstracted so that
   * the Concrete class has no idea how the Database works
   */
  abstract class AbstractApi {

    /**
     * @property The Database Object
     */
    private $db = null;

    public function __construct() {
      $this->db = new DatabaseHandler("tickets");
    }

    public function __destruct() {
      if (isset($this->db)) $this->db->__destruct();
    }

    /**
     * Create a non-staff user and add them to the databaseName
     *
     * @param $firstName string - The user's first name
     * @param $lastName string - The user's last name
     * @param $email string - The user's email name
     *
     * @return bool - true is user was created, false if user was not created
     */
    public function createUserDB($firstName, $lastName, $email) {

      $result = $this->db->createUser(
        $firstName,
        $lastName,
        $email,
        FALSE
      );
      return $result;
    }

    /**
     * Create a staff user and add them to the database
     *
     * @param $firstName string - The user's first name
     * @param $lastName string - The user's last name
     * @param $email string - The user's email name
     *
     * @return bool - true is user was created, false if user was not created
     */
    public function createStaffDB($firstName, $lastName, $email) {

      $result = $this->db->createUser(
        $firstName,
        $lastName,
        $email,
        TRUE
      );
      return $result;
    }

    /**
     * Get a userID by supplying the user's email from the current database instance
     *
     * @param $email string - the users email address
     * @return int|null - Will return the User's ID, else will return null if user does not exist
     */
    public function getUserIdByEmail($email) {

      $user = $this->db->getUserByEmail($email);
      return isset($user)
        ? $user['user_id']
        : null;
    }

    /**
     * Get a user information by supplying the user's ID from the current database instance
     *
     * @param $id string - the users id
     * @return object|null - Will return the User information, else will return null if user does not exist
     */
    public function getUserInfoById($id) {
      $user = $this->db->getUser($id);
      return isset($user)
          ? $user
          : null;
    }

    /**
     * Create a new ticket for the user into the database
     *
     * @param $userId int - the user's ID
     * @param $osType string - the Operating System the user is on
     * @param $primayIssue string- The issue the user is having with the IT Systeem
     * @param $additionalNotes - additional notes for the ticket
     *
     * @return bool
     */
    public function createTicket($userId, $subject, $osType, $primaryIssue, $additionalNotes) {

      $result = $this->db->createTicket(
          $osType,
          $subject,
          $primaryIssue,
          $additionalNotes,
          $userId
        );

        return $result;
    }

    /**
     * Create a new ticket for the user into the database
     *
     * @param $ticketId int
     * @param $comment string
     * @param $userId int
     *
     * @return ticketId
     */
    public function createComment( $ticketId, $comment, $userId) {
      $result = $this->db->addComment($ticketId, $comment, $userId);
      return $result;
    }

    /**
     * Create a new ticket for the user into the database
     *
     * @param $ticketId int
     * @return array of comments
     */
    public function getCommentsFromTicket($ticketId) {
      $result = $this->db->getAllCommentsForTicket($ticketId);
      return $result;
    }

    /**
     * Get ticket information by Id
     *
     * @param $ticketId string
     * @return object for ticket information
     */
    public function getTicketInfo($ticketId) {
      $result = $this->db->getTicketById($ticketId);
      return $result;
    }

    /**
     * Update an existing ticket with the passed in information
     *
     * @param $ticketId string
     * @param $subject string
     * @param $osType string
     * @param $primaryIssue string
     * @param $additionalNotes string
     * @param $status string
     * @param $submitterId string
     *
     * @return false | true if succeded/failed
     */
    public function updateTicketDB($ticketId, $subject, $osType, $primaryIssue, $additionalNotes, $status, $submitterId){
      $ticket = $this->db->getTicketById($ticketId);
      if($ticket === null) {
        return false;
      }
      $result = $this->db->updateTicket($ticketId,
                                        $subject,
                                        $osType,
                                        $primaryIssue,
                                        $additionalNotes,
                                        $status,
                                        $submitterId);

      return $result;
    }

    /**
     * Change ticket status by Id
     *
     * @param $ticketId string
     * @return false | true if succeded/failed
     */
    public function closeTicketDB($ticketId){
      $ticket = $this->db->getTicketById($ticketId);
      if($ticket === null) {
        return false;
      }
      $result = $this->db->updateTicket($ticketId,
                                        $ticket['subject'],
                                        $ticket["os_type"],
                                        $ticket["primary_issue"],
                                        $ticket["additional_notes"],
                                        "Resolved",
                                        $ticket["submitter_id"]);

      return $result;
    }

    /**
     * Get all ticket
     *
     * @return array of objects which has ticket information
     */
    public function getAllTicketsInSystem(){
      $result = $this->db->getAllTicketsInSystem();
      return $result;
    }

  }
?>
