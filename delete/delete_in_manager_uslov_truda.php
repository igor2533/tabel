<?php     
		
		  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_delete_Cat = mysql_query("DELETE FROM `uslov_truda` WHERE id_uslov_truda = ".$_GET['id_c']."",$db);
		
	echo "<script> location.href='../main_tabel.php#manager_uslov_truda'; </script>"
  

   ?>  