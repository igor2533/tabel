<? 


?>



<form method="POST"  action="add_sprav.php">
  

   
   <input name="title" placeholder="название" type="text" >
           <input name="param1" placeholder="парам1" type="text"  >
           <input name="param2" placeholder="парам2" type="text"  >
     <input name="submit_add" type="submit" value="Добавить">
	 
	 
 
	 
	 
      </form>
	  
	  <? 
	  
	  if(isset($_POST['submit_add'])){
		  
		 $title = strip_tags(trim($_POST['title']));
          $param1 = strip_tags(trim($_POST['param1']));		
          $param2 = strip_tags(trim($_POST['param2']));		
	  include('db_red.php');
 $result_add_stavka = mysql_query("INSERT INTO cat_sprav (`title`,`param1`,`param2`) VALUES ('$title','$param1','$param2')",$db);

		  
			 
	  }
	  
	  else { echo 'ошибка';}
	  
	


	  
	  
	  ?>
	