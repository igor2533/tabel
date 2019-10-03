<?php

include('session.php');


   if (empty($_SESSION['login']) or empty($_SESSION['id'])){ 
           
		   echo "<script> location.href='error.php'; </script>";
		   
		   
       } 
       else{ 


 $db = mysql_connect('localhost','host1024_tabele','hh4*77hjHHHu78');

	   mysql_select_db('host1024_wpp', $db);}

?>