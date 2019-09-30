<?php session_start();
require_once("./funtion.php");
?>
<?php 
   $ida=$_SESSION["login"][0][0];
   $sql = "UPDATE account SET isOnline='0' WHERE id=$ida";
   update($sql);
   unset($_SESSION["login"]);
   header ("Location: home.php");
 ?> 