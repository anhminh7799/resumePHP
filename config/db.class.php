<?php

class Db
{

    protected static $connection;

    public function connect(){
        if(!isset(self::$connection)){
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"],$config["password"],$config["databasename"]);
            //echo "Connected to database";
        	}

        if(self::$connection == false){
            //echo "Connection failed";
            return false;
        	}

        return self::$connection;
    }

    public function query_execute($queryString){
        $connection = $this-> connect();
	    $connection-> set_charset("utf8");
        //query("SET NAME utf8");
        $result = $connection-> query($queryString);
        //$connection->close();
        return $result;
    }

    public function select_to_array($queryString){
        $rows = array();
        $result = $this-> query_execute($queryString);

        if($result == false) return false;

        while($item = $result->fetch_assoc()){
            $rows[] = $item;

        }

        return $rows;
    }
}

?>
