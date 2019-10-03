<? include('../session.php');?>
<? include('../links.php'); include('../db.php'); ?>

<? if (($level_users==1)){ ?>


<html class="add_update">
<a class="back" href="../main_tabel.php#manager_category_spravochnik">Назад </a>
<form method="POST" class="form_up_add" action="add_category_spravochnik.php">
  

   
   <input name="name_cat" type="text" placeholder="Введите название справочника" required>
              <input name="submit_category" type="submit" value="Добавить">
	 
	 
 
	 
	 
      </form>
	  
	  <? 
	  
	  if(isset($_POST['submit_category'])){
		  
		 
		  
		 $nazv = strip_tags(trim($_POST['name_cat']));
        	
	  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_add_stavka = mysql_query("INSERT INTO category_spravochnik (`nazv`) VALUES ('$nazv')",$db);
 //$result = mysql_query("INSERT INTO doljnosty (`nameDolj`) VALUES('$name_dolj')",$db);
 
 
	echo "<script>location.href='../main_tabel.php#manager_category_spravochnik'; </script>";   
		  
			 
	  }
	  
	  }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }

	  
	  
	  ?>
	  </html>