<?php
require_once("./config/db.class.php");
class students
{
  public $mssv;
  public $name;
  public $mark;
  public $major;

  public function __construct($studentName, $mark, $major)
  {
    $this->name = $studentName;
    $this->mark = $mark;
    $this->major = $major;
  }

  public static function list_students() {
    $db = new Db();
    $sql = "SELECT * FROM studentslist";
    $result = $db->select_to_array($sql);
    return $result;
  }

  public function save(){
        $db = new DB();

        $sql = "INSERT INTO studentslist(name, mark, major) VALUES 
        ('$this->name', '$this->mark','$this->major')";

        $result = $db ->query_execute($sql);
        return $result;
    }

    public function delete($mssv){
        $db = new DB();

        $sql = "DELETE FROM `studentslist` WHERE . $mssv";

        $result = $db ->query_execute($sql);
        return $result;
    }
}
 ?>