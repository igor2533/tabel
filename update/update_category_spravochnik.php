<? include('../session.php');?>

  <? if (($level_users==1)){ ?>

<html class="add_update">
<?php 
include('../links.php');    
  include_once('../db.php');
  $id=$_GET['id'];
  
 $sql = $db->query("SELECT * FROM category_spravochnik WHERE `id` = '$id'");
  $db->close; 
while($result = $sql->fetch_assoc()):

  $name_cat = $result['nazv'];
  $name_sel_seta = $result['setting_sel'];

	
?>
<a class="back" href="../main_tabel.php#manager_category_spravochnik">Назад </a>
	<form method="post" class="form_up_add" action="update_category_spravochnik.php?id=<?php echo $id;?>">



Название справочника <input value = "<?php echo $name_cat;?>" type="text" name="name_cat" required />
Для анкеты работника <select name="name_sel" required> 
 <?
 if($name_sel_seta == 0){
  $nazv_sel = "Выбрано нет";
  $nazv_ne_sel = "Выбрано да";
  $numb_ne_sel = "1";
 }

 if($name_sel_seta == 1){
$nazv_sel = "Выбрано да";
 $nazv_ne_sel = "Выбрано нет";
  $numb_ne_sel = "0";

 } ?>

 <option value="<? echo $name_sel_seta;?>" selected><? echo $nazv_sel;?></option>
 <option value="<?echo $numb_ne_sel;?>"><? echo $nazv_ne_sel;?> </option>
</select>


<input type="submit" name="update_cat" value="Изменить" />

</form>
					
	 
  <?php  endwhile;   ?>
  
  <?php
   $name_cat_update = strip_tags(trim($_POST['name_cat']));
   $name_sel_update = strip_tags(trim($_POST['name_sel']));
 $id=$_GET['id'];
 
 if(isset($_POST['update_cat']))
 {
 
  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_update_Cat = mysql_query("UPDATE category_spravochnik SET `nazv`='$name_cat_update', `setting_sel`= $name_sel_update WHERE id = '$id'",$db);
   
 echo "<script> location.href = '../main_tabel.php#manager_category_spravochnik'; </script>";
  }
  
   }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }
  
  

   ?> 
</html>   