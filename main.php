<? include('session.php')?>
<? include('links.php'); ?>


<?php     
       if (empty($_SESSION['login']) or empty($_SESSION['id'])){ 
          echo 'Эта страница доступна только авторизированным пользователям'; 		   
       } 
       else{ 
       
  include('main_tabel.php');
	   
       } 
       ?>

