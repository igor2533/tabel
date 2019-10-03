<? 


?>



<form method="POST"  action="add_element.php">
  

   
    <input name="title" placeholder="Название" type="text" >
    <select name="cat_sprav">
	<option value="" selected>Выберите справочник</option>
	
	<?
	
	include('db.php');

$spisok_sprav = $db->query("SELECT * FROM cat_sprav");
 $db->close;
 while($RSS = $spisok_sprav->fetch_assoc()): 
$RSS_id = $RSS['id'];
$RSS_title = $RSS['title'];
?>
<option value="<? echo $RSS_id;?>"><? echo $RSS_title;?></option>


<?
  endwhile;
 
	?>
	
	
	</select>
	
	
    <input name="param1" placeholder="парам1" type="text"  required>
	<input name="param2" placeholder="парам2" type="text"  required>
	<input name="param3" placeholder="парам3" type="text"  required>
	<input name="param4" placeholder="парам4" type="text"  required>
	<input name="param5" placeholder="парам5" type="text" required>
	<input name="param6" placeholder="парам6" type="text" required>
    <input name="submit_add" type="submit" value="Добавить">
	 
	 
 
	 
	 
      </form>
	  
	  <? 
	  
	  if(isset($_POST['submit_add'])){
		  
		 $title = strip_tags(trim($_POST['title']));
		 $cat_sprav = strip_tags(trim($_POST['cat_sprav']));
          $param1 = strip_tags(trim($_POST['param1']));		
          $param2 = strip_tags(trim($_POST['param2']));		
          $param3 = strip_tags(trim($_POST['param3']));		
          $param4 = strip_tags(trim($_POST['param4']));		
          $param5 = strip_tags(trim($_POST['param5']));		
          $param6 = strip_tags(trim($_POST['param6']));		
	  include('db_red.php');
 $result_add_stavka = mysql_query("INSERT INTO sprav (`title`,`cat_sprav`,`param1`,`param2`,`param3`,`param4`,`param5`,`param6`) VALUES ('$title','$cat_sprav','$param1','$param2','$param3','$param4','$param5','$param6')",$db);

		  
			 
	  }
	  
	  else { echo 'ошибка';}
	  
	


	  
	  
	  ?>
	