//this one talks to the db

<?php

class {
// in the constructre create connection to the database
  private $conn;
  /*
  *constructor of dao class
  */
  public function_construct(){
    $servername = "localhost"; // our server is our localhost
    $username = "fitnessuser";
    $password = "root";
    $schema = "people";

    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }

  /*
  * update todo record
  */
  public function update($personID, $personName, $address, $phoneNumber){
    $stmt = $this->conn->("UPDATE todos SET personName=:'$personName', address=:'$address', phoneNumber=:'$phoneNumber', WHERE personID = $personID");
    $stmt->execute();
  }

  public function delete($personID){
    $stmt = $this->conn->prepare("DELETE FROM people WHERE personID=:personID");
    $stmt->bindParam(':personID', $personID);
    $stmt->execute();
  }
  public function add($personName, $address, $phoneNumber){
    $stmt = $this->conn->("INSERT INTO people (personName, address, phoneNumber) VALUES ('$personName', 'address', '00387603377613')");
    $stmt->execute();
  }
}

?>
