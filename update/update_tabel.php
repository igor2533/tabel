<? include('../session.php');?>

<? if (($level_users==1 OR $level_users==3)){ ?>



<html class="add_update">
<?php   
include('../links.php');  
  include_once('../db.php');
  $id=$_GET['id'];
  
 $sql = $db->query("SELECT * FROM chasy WHERE `id_chasy` = '$id'");
  $db->close; 
while($result = $sql->fetch_assoc()):

  $chasy = $result['chasov'];
  $chasy_noch = $result['nochnie'];
   $chasy_sverh = $result['sverhurochn'];

	
?>
<a class="back" href="../main_tabel.php#manager_tabel">Назад </a>
	<form method="post" class="form_up_add" action="update_tabel.php?id=<?php echo $id;?>">




Выставлено рабочих <span style="color:white;"><? echo $chasy;?> </span> часа(ов)
<select size="1" name="chasy">
    <option disabled>Чаcы</option>
      <option value="8">8</option>
	<option value="0">Н</option>
	 <option value="8">Б</option>
	<option value="7">7</option>
	 <option value="6">6</option>
	<option value="5">5</option>
	 <option value="4">4</option>
	<option value="3">3</option>
	 <option value="2">2</option>
	<option value="1">1</option>
	 <option value="0">0</option>
	   </select></br>
	   
	Выставлено ночных <span style="color:white;"><? echo $chasy_noch;?> </span> часа(ов)
<select size="1" name="chasy_noch">
    <option disabled>Чаcы</option>
      <option value="8">8</option>
	<option value="0">Н</option>
	 <option value="8">Б</option>
	<option value="7">7</option>
	 <option value="6">6</option>
	<option value="5">5</option>
	 <option value="4">4</option>
	<option value="3">3</option>
	 <option value="2">2</option>
	<option value="1">1</option>
	 <option value="0">0</option>
	   </select></br>   
	   
	   Выставлено сверхурочных <span style="color:white;"><? echo $chasy_sverh;?> </span> часа(ов)
<select size="1" name="chasy_sverh">
    <option disabled>Чаcы</option>
      <option value="8">8</option>
	<option value="0">Н</option>
	 <option value="8">Б</option>
	<option value="7">7</option>
	 <option value="6">6</option>
	<option value="5">5</option>
	 <option value="4">4</option>
	<option value="3">3</option>
	 <option value="2">2</option>
	<option value="1">1</option>
	 <option value="0">0</option>
	   </select></br>
	   
	   
<input type="submit" name="update_dolj" value="Изменить" />

</form>
					
	 
  <?php  endwhile;   ?>
 
  <?php
   $chasy_s = strip_tags(trim($_POST['chasy']));
   $chasy_noch = strip_tags(trim($_POST['chasy_noch']));
   $chasy_sverh = strip_tags(trim($_POST['chasy_sverh']));
  $id=$_GET['id'];
 
 if(isset($_POST['update_dolj']))
 {
 
  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_update_razryad = mysql_query("UPDATE chasy SET `nochnie`='$chasy_noch',`sverhurochn`='$chasy_sverh',`chasov`= '$chasy_s'  WHERE id_chasy = '$id'",$db);
   
 echo "<script> location.href = '../main_tabel.php#manager_tabel'; </script>";
  }
  
  }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }
	  
  
  

   ?>  
   </html>