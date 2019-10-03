<? include('../session.php');?>

  <? if (($level_users==1 OR $level_users==3)){ ?>



<html class="add_update">
<?php  
$rebenok_id = $_GET['id']; 
include('../links.php');  
  include_once('../db.php');
  $id=$_GET['id'];
  
 $sql = $db->query("SELECT * FROM childrens WHERE `id` = '$rebenok_id'");
  $db->close; 
while($result = $sql->fetch_assoc()):

  $viplata = $result['aliments'];

	
?>
<a class="back" href="../main_tabel.php#manager_childrens">Назад </a>
	<form method="post" class="form_up_add" action="update_childrens.php?id=<?php echo $rebenok_id;?>">

	<?
	if($viplata == 1){
		$viplata_nazv = 'Да';
	}
		if($viplata == 0){
		$viplata_nazv = 'Нет';
	}
	
	?>
	
	
<input disabled value="<? echo 'Выбрано ' .$viplata_nazv;?>" />
	
	  <select name="aliments" size="1"> 
   <option selected disabled >Выплата алиментов</option>
  <option value="0">Нет</option>  
  <option value="1">Да</option>  
   </select>
	
	


<input type="submit" name="update_dolj" value="Изменить" />

</form>
					
	 
  <?php  endwhile;   ?>
 
  <?php
   $aliments = strip_tags(trim($_POST['aliments']));
 
 $id=$_GET['id'];
 
 if(isset($_POST['update_dolj']))
 {
 
  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_update_razryad = mysql_query("UPDATE childrens SET `aliments`= '$aliments'  WHERE id = '$rebenok_id'",$db);
   
 echo "<script> location.href = '../main_tabel.php#manager_childrens'; </script>";
  }

   }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }
  
  
  
   ?>  
   </html>