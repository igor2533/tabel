<? include('session.php')?>
<? include('links.php'); ?>

<html>
 
 
 <?php     
       if (empty($_SESSION['login']) or empty($_SESSION['id'])){ 
         include('login_admin.php'); 		   
       } 
       else{ 
       
  echo"<script>location.href='main_tabel.php'; </script>";
	   
       } 
       ?>
 
 
 
 
 
 


</html>