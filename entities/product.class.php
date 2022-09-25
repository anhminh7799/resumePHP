<?php
require_once("./config/db.class.php");

class Product{
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture){
        $this-> productName = $pro_name;
        $this-> cateID = $cate_id;
        $this-> price = $price;
        $this-> quantity = $quantity;
        $this-> description = $desc;
        $this-> picture = $picture;
    }

    // public function save(){
    //     $db = new DB();

    //     $sql = "INSERT INTO Product(ProductName, CateID, Price, Quantity, Description, Picture) VALUES 
    //     ('$this->productName', '$this->cateID','$this->price','$this->quantity','$this->description','$this->picture')";

    //     $result = $db ->query_execute($sql);
    //     return $result;
    // }

    public static function list_product(){
        $db = new DB();
        //mysql_query("set name 'utf8'");
        $sql = "SELECT * FROM product";
        $result = $db->select_to_array($sql);	
        return $result;
    }

    public function save(){
        $file_temp = $this->picture['tmp_name'];
        $user_file = $this-> picture['name'];
        $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
        $filepath = "./images/".$timestamp.$user_file;
        if(move_uploaded_file($file_temp,$filepath)==false){
            return false;
        }

        $db = new DB();
        $sql = "INSERT INTO Product(ProductName, CateID, Price, Quantity, Description, Picture) VALUES
        ('$this->productName','$this->cateID','$this->price','$this->quantity','$this->description','$filepath')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_product_by_cateid($cateid){

        $db = new DB();
        $sql = "SELECT * FROM product WHERE CateID='$cateid'";
        $result = $db->select_to_array($sql);
        return $result;
    }
}

?>