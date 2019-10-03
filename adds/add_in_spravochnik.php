<? include('../session.php');?>
<? include('../links.php'); include('../db.php'); ?>

<? if (($level_users==1 OR $level_users==3)){
  $cat = $_GET['cat'];
	?>


<html class="add_update">
<a class="back" href="../main_tabel.php?id=<? echo $GET_['cat'];?>#prewiew_spravochnik">Назад </a>
<form method="POST" class="form_up_add" action="add_in_spravochnik.php?cat=<? echo $cat?>">
  

   
   <input name="name_nazv" type="text" placeholder="Название" required>
           <input name="koeff" type="text" placeholder="Введите значение в %" required>
     <input name="submit_in_spravochnik" type="submit" value="Добавить">
	 
	 
 
	 
	 
      </form>
	  
	  <? 
	  
	  if(isset($_POST['submit_in_spravochnik'])){
		  
		 
		  
		 $nazv = strip_tags(trim($_POST['name_nazv']));
          $koeff = strip_tags(trim($_POST['koeff']));		
	  include_once('../db_red.php');
	
/*Делаем запрос к БД*/
 $result_add_in_spravochnik = mysql_query("INSERT INTO spravochniki (`category`,`nazv`,`koeff`) VALUES ('$cat','$nazv','$koeff')",$db);
 //$result = mysql_query("INSERT INTO doljnosty (`nameDolj`) VALUES('$name_dolj')",$db);
 
 
	echo "<script>location.href='../main_tabel.php?cat=$cat#prewiew_spravochnik'; </script>";   
		  
			 
	  }
	  
	  }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }

	  
	  
	  ?>
	  </html>