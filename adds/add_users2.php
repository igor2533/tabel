<?php include('../session.php');include('../links.php'); include('../db.php'); ?>


<html class="add_update">
<a class="back" href="../main_tabel.php#manager_users">Назад </a>


<form method="POST" class="form_o" action="#add_nach">
   <select name="dolj" size="1" name="tabel_q" hidden>
    <option disabled>Должность</option>
	
   </select></br>
   
   
   <input size="1" name="level_id" value="2" hidden>
 </br>
   
   <input name="login" type="login" placeholder="Введите логин" required></br>
   <input name="date_today" style="display:none;" value="<?php echo date('d-m-Y');?>" required>
     
	 
	 
	 <input name="pass" type="password" placeholder="Введите пароль" required></br>
   <input name="fio" placeholder="Введите ФИО" hidden></br>
 
   
   
         <select name="podrazd" size="1" name="tabel_q" hidden>
   </select></br>
     <input name="submit_nach" type="submit" value="Добавить">
      </form>
	  </html>
	  
	  <? 
	  if(isset($_POST['submit_nach'])){
		  
		  
		  
		  
		  
		  
		  
		  
		 $dolj = strip_tags(trim($_POST['dolj']));
     $fio = strip_tags(trim($_POST['fio']));
     $pass = strip_tags(trim($_POST['pass']));
	include('../secret.php');
	$password_zawita = md5($pass.$secret);
       $login = strip_tags(trim($_POST['login']));
	   
	   
	   $sql_proverka_login = $db->query("SELECT * FROM users where login = '$login'");
 $db->close;
 while($result_proverka_login = $sql_proverka_login->fetch_assoc()):
	   $result_proverka = $result_proverka_login['login'];
	   endwhile;
	   
	   if($result_proverka == $login){
		   
		  echo  "<script>alert('Такой логин существует!!!');</script>"; 
	   }
	   
	else{
	   
	   
    $podrazd = strip_tags(trim($_POST['podrazd']));
	  $date_today = strip_tags(trim($_POST['date_today']));
	  	  $level_id = strip_tags(trim($_POST['level_id']));
		
	
 $sql=$db->query("INSERT INTO `users`(`login`, `pass`, `level_id`, 
		 `date_register`,`podrazd`, `date_auth`, `fio`,`dolj`) VALUES ('$login','$password_zawita', '$level_id','$date_today','$podrazd','0','$fio','$dolj')");
 $db->close;
echo  "<script>location.href='../main_tabel.php#manager_users'; </script>";   

	}
	  }
	  










 ?>
	  
	  
	  