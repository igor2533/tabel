<?php

session_start(); 
  
       if (empty($_SESSION['login']) or empty($_SESSION['id'])){ 
           
		   echo "<script> location.href='error.php'; </script>";
		   
		   
       } 
       else{    $db = new mysqli('localhost','root','','montanja');} 
    




?>