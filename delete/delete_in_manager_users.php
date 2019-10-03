<?php     
include('../session.php');		
		
 if (($level_users==1)){ 
		
		
		
		
		  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_delete_Cat = mysql_query("DELETE FROM `users` WHERE id = ".$_GET['id_c']."",$db);
		
	echo "<script> location.href='../main_tabel.php#manager_users'; </script>";
 }
 
 else{
	 echo "<script> location.href='error_user.php'; </script>";
	 
 }

   ?>  