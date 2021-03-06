<?php
class Song{
 

    // database connection and table name
    private $conn;
    private $table_name = "songs";
 
    // object properties
    public $sid;
    public $sname;
    public $slength;
    public $sgenre;
    public $sdecription;
    public $sfile;
    public $simg;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create product
function create(){

 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                uname=:uname, fbuid=:fbuid, token=:token, created=:created";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->uname=htmlspecialchars(strip_tags($this->uname));
    $this->fbuid=htmlspecialchars(strip_tags($this->fbuid));
    $this->token=htmlspecialchars(strip_tags($this->token));
    $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $stmt->bindParam(":uname", $this->uname);
    $stmt->bindParam(":fbuid", $this->fbuid);
    $stmt->bindParam(":token", $this->token);
    $stmt->bindParam(":created", $this->created);
 
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
// read songs
function read(){
 
    // select all query
    $query = "SELECT * FROM " . $this->table_name . "";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

}



?>