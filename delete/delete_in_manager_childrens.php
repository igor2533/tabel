<?php     
		
		
include_once('../db.php');
$rebenok_id = $_GET['id_c'];
$sql_reb_id = $db->query("select * from childrens where id = '$rebenok_id'");
 $db->close;
 while($result_reb_id = $sql_reb_id->fetch_assoc()): 
 $rabochego_id = $result_reb_id['id_rab'];
 endwhile;
$sql_rab_id = $db->query("select * from configs where id = '$rabochego_id'");
 $db->close;
 while($result_rab_id = $sql_rab_id->fetch_assoc()): 
 $nalich_detei = $result_rab_id['deti'];

 endwhile;
 $otnimaem_odnogo =  $nalich_detei - 1;
 include_once('../db_red.php');
 	$result_delete_child_in_rab = mysql_query("UPDATE configs SET `deti` = '$otnimaem_odnogo' WHERE id = '$rabochego_id'",$db);
 $db->close;
		
/*Делаем запрос к БД*/
	include_once('../db_red.php');
 $result_delete_Cat = mysql_query("DELETE FROM `childrens` WHERE id = '$rebenok_id'",$db);
		

		                                                    
	echo "<script> location.href='../main_tabel.php#manager_childrens'; </script>";
  

   ?>  