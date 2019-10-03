<? include('../session.php');?>

<? if (($level_users==1)){ ?>


<html class="add_update">
<?php   
include('../links.php');  
  include_once('../db.php');
  $id=$_GET['id'];
  
 $sql = $db->query("SELECT * FROM levels WHERE `id` = '$id'");
  $db->close; 
while($result = $sql->fetch_assoc()):

  $nazv = $result['nazv'];
  $koeff = $result['level'];

	
?>
<a class="back" href="../main_tabel.php#manager_levels">Назад </a>
	<form method="post" class="form_up_add" action="update_levels.php?id=<?php echo $id;?>">



Название уровня доступа  <input value = "<?php echo $nazv;?>" type="text" name="nazv" required />
Уровень доступа  <input value = "<?php echo $koeff;?>" type="text" name="podr" required />
<input type="submit" name="update_dolj" value="Изменить" />

</form>
					
	 
  <?php  endwhile;   ?>
 
  <?php
   $nazv_update = strip_tags(trim($_POST['nazv']));
    $podr_update = strip_tags(trim($_POST['podr']));
 $id=$_GET['id'];
 
 if(isset($_POST['update_dolj']))
 {
 
  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_update_dolj = mysql_query("UPDATE levels SET `nazv`='$nazv_update',`level`= '$podr_update'  WHERE id = '$id'",$db);
   
 echo "<script> location.href = '../main_tabel.php#manager_levels'; </script>";
  }

  	       }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }
	  
  
  
  
   ?>  
   </html>