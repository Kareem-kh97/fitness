<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'dao/FitnessDao.class.php';
// with require method it requires files within the root folder but with the ../ it goes a folder
require_once '../vendor/autoload.php'; /* ../ we add it as one folder up to include vendor*/

Flight::register('fitnessDao', 'FitnessDao'); // at 38:00

//CRUD operations

Flight::route('GET /people', function(){
Flight::json(Flight::fitnessDao()->get_all());
});

/*
*list all indivisuals fitness
*/
Flight::route('GET /people/@id', function($id){
Flight::json(Flight::fitnessDao()->get_by_id($id));
});

/*
* add to fitness to p
*/
Flight::route('POST /people', function(){ // i deleted $id from the parameter
Flight::json(Flight::fitnessDao()->add(Flight::request()->data->getData()));
});
/*
* update fitness
*/
Flight::route('PUT/people/@id', function($id){
  $data = Flight::request()->data->getData();
  $data['id'] = $id;
Flight::json(Flight::fitnessDao()->update($data));
});
/*
* delete fitness
*/
Flight::route('DELETE/people/@id', function($id){
Flight::fitnessDao()->delete($data);
Flight::json(["message" => "deleted"]);
});
Flight::start();
?>
