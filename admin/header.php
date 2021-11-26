<?php 
  include '../config/session.php';
  Session::init();
 ?>
 <?php 
   include_once '../config/database.php';
   include_once '../helpers/format.php';
   spl_autoload_register(function($className){
   	   include_once "../classes/".$className.".php";
   });
   $db = new Database();
   $fm = new Format();
   $user= new user();
   $store = new store();
   $contact = new contact();
   $model = new model();
   $car = new car();
   $post = new post();  
   $appointment = new appointment();
   $comment = new comment();
   $service = new service();
   // $product = new product();
   // $category = new category();
   // $bankaccount = new bankaccount();
   // $order = new order();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>