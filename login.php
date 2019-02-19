<?php
// 'user' object
class User{
  // database connection and table name
    private $conn;
    private $table_name = "users";

     // object properties
    public $id;
    public $Username;
    public $Password;
    public $email;

      // constructor
    public function __construct($db){
        $this->conn = $db;
        // create new user record
function create(){
 $query = "INSERT INTO
                " . $this->table_name . "
            SET
                Username = :Username,
                Password = :Password,
                email = :email";

                   // prepare the query
    $stmt = $this->conn->prepare($query);

     // sanitize
    $this->Username=htmlspecialchars(strip_tags($this->Username));
    $this->Password=htmlspecialchars(strip_tags($this->Password));
    $this->email=htmlspecialchars(strip_tags($this->email));

    // bind the values
    $stmt->bindParam(':Username', $this->Username);
    $stmt->bindParam(':Password', $this->Password);
    $stmt->bindParam(':email', $this->email);

    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }else{
        $this->showError($stmt);
        return false;
    }
}
}
}