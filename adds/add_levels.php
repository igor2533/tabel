<? include('../session.php');?>
<? include('../links.php'); include('../db.php'); ?>

<? if (($level_users==1)){ ?>


<html class="add_update">
<a class="back" href="../main_tabel.php#manager_levels">Назад </a>
<form method="POST" class="form_up_add" action="add_levels.php">
  

   
   <input name="name_cat" type="text" placeholder="Введите название уровня доступа" required>
           <input name="id_podrazd" type="text" placeholder="Введите уровень доступа" required>
     <input name="submit_category" type="submit" value="Добавить">
	 
	 
 
	 
	 
      </form>
	  
	  <? 
	  
	  if(isset($_POST['submit_category'])){
		  
		 
		  
		 $nazv = strip_tags(trim($_POST['name_cat']));
          $koeff = strip_tags(trim($_POST['id_podrazd']));		
	  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_add_stavka = mysql_query("INSERT INTO levels (`nazv`,`level`) VALUES ('$nazv','$koeff')",$db);
 //$result = mysql_query("INSERT INTO doljnosty (`nameDolj`) VALUES('$name_dolj')",$db);
 
 
	echo "<script>location.href='../main_tabel.php#manager_levels'; </script>";   
		  
			 
	  }
	  
	  }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }

	  
	  
	  ?>
	  </html>