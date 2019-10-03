<? include('../session.php');?>

<? if (($level_users==1)){ ?>


<html class="add_update">
<?php   
include('../links.php');  
  include_once('../db.php');
  $id=$_GET['id'];
  
 $sql = $db->query("SELECT * FROM spravochniki WHERE `id` = '$id'");
  $db->close; 
while($result = $sql->fetch_assoc()):

  $nazv = $result['nazv'];
  $koeff = $result['koeff'];

	
?>
<a class="back" href="../main_tabel.php#manager_category_spravochnik">Назад </a>
	<form method="post" class="form_up_add" action="update_elem_sprav.php?id=<?php echo $id;?>">



Название элемента  <input value = "<?php echo $nazv;?>" type="text" name="nazv" required />
Коэффициент  <input value = "<?php echo $koeff;?>" type="text" name="podr" required />
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
 $result_update_dolj = mysql_query("UPDATE spravochniki SET `nazv`='$nazv_update',`koeff`= '$podr_update'  WHERE id = '$id'",$db);
   
 echo "<script> location.href = '../main_tabel.php#manager_category_spravochnik'; </script>";
  }

  	       }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }
	  
  
  
  
   ?>  
   </html>