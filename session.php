<?php     
          //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!     
   session_start();    
      if(isset($_GET['exit'])) { 
session_destroy();     
#redirect 
header('Location: index.php'); 
header("Content-Type: text/html; charset=utf-8");
exit; 
} 
   
$id_Ses = $_SESSION['id'];
$podrazde= $_SESSION['podrazd'];
$level_users = $_SESSION['level_id'];
  $login_in_system = $_SESSION['login'];
  

   ?>  