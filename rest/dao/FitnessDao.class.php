<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class FitnessDao{
  private $conn;

  public function __construct(){
    $servername = "localhost";
    $username = "fitnessuser";
    $password = "root";
    $schema = "fitness";

    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected";
  }
  public function get_all(){
    $stmt = $this->conn->prepare("SELECT * FROM people");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  /*
  * get by id function
  */
  public function get_by_id($id){
    $stmt = $this->conn->prepare("SELECT * FROM people WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return @reset($result); //@ THIS RAISE A WARNING IF RESULT IS EMPTY
  }
  /*
  * update todo record
  */
  public function update($id, $name, $address, $phoneNumber){
    $stmt = $this->conn->prepare("UPDATE people SET name=:name, address=:address, phoneNumber=:phoneNumber, WHERE id =:id");
    $stmt->execute(['name'=>$name, 'address'=>$address, 'phoneNumber'=>$phoneNumber, 'id'=>$id]);
  }
  // delete function
  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM people WHERE id=:id");// $ instead of :
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
  public function add($name, $address, $phoneNumber){
    $stmt = $this->conn->prepare("INSERT INTO people (name, address, phoneNumber) VALUES (:name, :address, :00387603377613)");
    $stmt->execute(['name'=>$name, 'address'=>$address, 'phoneNumber'=>$phoneNumber]);
  }
}
?>
