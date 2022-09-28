<?php
require_once("./config/db.class.php");
class Jobs
{

    //Jobs properties
    private $idJob;
    private $jobTitle;
    private $companyName;
    private $techStack;
    private $description;
    private $startDate;
    private $endDate;

    //Constructor and desctructor
    public function __construct(
        $jobTitle,
        $companyName,
        $description,
        $startDate,
        $endDate,
        $techStack
    ) {
        $this->jobTitle = $jobTitle;
        $this->companyName = $companyName;
        $this->techStack = $techStack;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }


    public function __destruct()
    {
        $this->jobTitle = NULL;
        $this->companyName = NULL;
        $this->techStack = NULL;
        $this->description = NULL;
        $this->startDate = NULL;
        $this->endDate = NULL;
    }

    //Get all list job
    public static function list_jobs()
    {
        $db = new DB();
        $sql = "SELECT * FROM jobs";
        $result = $db->select_to_array($sql);
        return $result;
    }

    //Add new job
    public function save()
    {
        $db = new DB();
        $idUser = "1";

        $sql = "INSERT INTO jobs(title, companyName, description, startDate, endDate, idUser , idStack) VALUES 
        ('$this->jobTitle', '$this->companyName','$this->description', '$this->startDate', '$this->endDate', $idUser, '$this->techStack' )";

        $result = $db->query_execute($sql);
        return $result;
    }

    public static function getOne($id)
    {
        $db = new DB();
        $id = intval($id);

        $sql = "SELECT `ID`, `title`, `companyName`, `description`, `startDate`, `endDate`, `idStack`, `idUser` FROM `jobs` WHERE ID ='" . $id . "'";

        $result = $db->query_execute($sql);
        return $result;
    }

    public static function update($id, $title, $companyName, $description, $startDate, $endDate, $idStack){
        $db = new DB();
        $id = intval($id);
        $idUser = "1";

        $sql = "UPDATE `jobs` SET `title`='".$title."',`companyName`='".$companyName."',`description`='".$description."
        ',`startDate`='".$startDate."',`endDate`='".$endDate."',`idUser`='".$idUser."',`idStack`='".$idStack."' WHERE ID ='".$id."'";
    
        $result = $db->query_execute($sql);
        return $result;
    }

    //Delete a job
    public static function delete($id)
    {
        $db = new DB();
        $id = intval($id);
        $sql = "DELETE FROM `jobs` WHERE ID ='" . $id . "'";

        $result = $db->query_execute($sql);
        return $result;
    }
}
