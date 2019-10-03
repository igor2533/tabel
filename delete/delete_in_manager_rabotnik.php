<?php  include('../session.php'); 
$id_c=$_GET['id_c'];
  include('../db.php');
 $sql = $db->query("SELECT * FROM rabotniki WHERE `id_r` = '$id_c'");
  $db->close; 
while($result = $sql->fetch_assoc()):
$id_nachalnika = $result['id_nach'];
endwhile;

if ($id_Ses==$id_nachalnika OR $level_users==1 OR $level_users==3){ 
		  
		  
/*Делаем запрос к БД*/
 include_once('../db_red.php');
 $result_delete_Cat = mysql_query("DELETE FROM `rabotniki` WHERE id_r = ".$_GET['id_c']."",$db);
		
	echo "<script> location.href='../main_tabel.php#manager_rabotnik'; </script>";
}





else {
	echo "<script> location.href='error_rab.php'; </script>";
}
 
   ?>  