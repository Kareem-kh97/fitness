//this one talks to the dao and db,
//and we call it via get method a browser call

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("rest/dao/FitnessDao.class.php");

$dao = new FitnessDao();

$op = $_REQUEST['op'];

switch ($op) {
  case 'insert':
   $personID = $_REQUEST['personID'];
   $personName = $_REQUEST['personName'];
   $address = $_REQUEST['address'];
   $phoneNumber = $_REQUEST['phoneNumber'];
   $dao->add($personID, $personName, $address, $address, $phoneNumber);
   break;

  case 'delete':
   $id = $_REQUEST['personID'];
   $dao->delete($personID);
   echo "DELETED $personID";
    break;

  case 'update':
   $personID = $_REQUEST['personID'];
   $personName = $_REQUEST['personName'];
   $address = $_REQUEST['address'];
   $phoneNumber = $_REQUEST['phoneNumber'];
   $dao->update($personID, $personName, $address, $address, $phoneNumber);
   echo "updated $personID";
    break;
    
  case 'get':
  default:
   $results = $dao->get_all();
   break;
}

?>
