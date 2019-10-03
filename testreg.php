<?php 
      session_start();
	  header("Content-Type: text/html; charset=utf-8");
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
      if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} } 
    
if (empty($login) or empty($password)) 
      { 
      exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!"); 
      } 
      
      $login = stripslashes($login); 
      $login = htmlspecialchars($login); 
//$password = stripslashes($password); 
      //$password = htmlspecialchars($password); 

      $login = trim($login); 
      //$password = trim($password);
	 	  $password=$_POST['password'];
	   $secret = "iouioguighiugfiu";
	   $password_zawita = md5($password.$secret);

      include ("bd.php");
       // Результат хэширования
$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db); 
      $myrow = mysql_fetch_array($result); 
      if (empty($password_zawita)) 
      { 
     
      exit ("Извините, введённый вами login или пароль неверный."); 
      } 
      else { 
     
	 	

	
 

		 
		 
		 
	  
	 
	 
	 
	 
      if ($myrow['pass']==$password_zawita) { 
      
      $_SESSION['login']=$myrow['login'];   
      $_SESSION['id']=$myrow['id'];
	
	  $id_Ses = $_SESSION['id'];
	  $date_auth = date('d-m-Y');
	  $time_auth = date('H:i:s');
	      $_SESSION['level_id']=$myrow['level_id'];
		 
        $inserta = mysql_query("UPDATE `users` SET `date_auth`='$date_auth',`time_auth_last`='$time_auth' WHERE id = '$id_Ses'",$db); 
	  
	   echo("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=main_tabel.php'></head></html>");
       
        exit();
       } 
   else { 

      exit ("Извините, введённый вами login или пароль неверный."); 
      } 
      } 
      ?>
	  