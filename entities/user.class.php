<?php
require_once("./config/db.class.php");
class Users
{

    //User Properties
    private $idUser;
    private $dob;
    private $fullName;
    private $email;
    private $phone;
    private $website;


    //Constructor and desctructor
    public function __construct($fullName, $dob, $email, $phone, $website)
    {
        $this->fullName = $fullName;
        $this->dob = $dob;
        $this->email = $email;
        $this->phone = $phone;
        $this->website = $website;
    }

    public function __destruct()
    {
        $this->fullName = NULL;
        $this->dob = NULL;
        $this->email = NULL;
        $this->phone = NULL;
        $this->website = NULL;
    }

    public static function list_users() {
    $db = new Db();
    $sql = "SELECT * FROM users";
    $result = $db->select_to_array($sql);
    return $result;
  }

}