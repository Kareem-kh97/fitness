<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("rest/dao/FitnessDao.class.php");

$dao = new FitnessDao();

$op = $_REQUEST['op'];

switch ($op) {
  case 'insert':
   $id = $_REQUEST['id'];
   $name = $_REQUEST['name'];
   $address = $_REQUEST['address'];
   $phoneNumber = $_REQUEST['phoneNumber'];
   $dao->add($id, $name, $address, $address, $phoneNumber);
   break;

  case 'delete':
   $id = $_REQUEST['id'];
   $dao->delete($id);
   echo "DELETED $id";
    break;

  case 'update':
   $id = $_REQUEST['id'];
   $name = $_REQUEST['name'];
   $address = $_REQUEST['address'];
   $phoneNumber = $_REQUEST['phoneNumber'];
   $dao->update($id, $name, $address, $address, $phoneNumber);
   echo "updated $id";
    break;

  case 'get':
  default:
   $results = $dao->get_all();
   break;
}

?>
