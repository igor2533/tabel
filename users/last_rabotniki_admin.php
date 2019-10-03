<? include('session.php')?>
<? include('links.php'); ?>
<? include('db.php'); ?>




<?
$sql = $db->query("SELECT * FROM rabotniki order by id_r desc limit 5");
 $db->close;
 while($resulte = $sql->fetch_assoc()): 
$dolj_id_s =$resulte['dolj'];
 ?>

 <?
$sqll = $db->query("SELECT * FROM spravochniki where id = '$dolj_id_s'");
 $db->close;
 while($resultey = $sqll->fetch_assoc()): 
 ?>
 
 <div class="zapis_lenti">
<? echo $resulte['date_auth'];?></span>
 Пользователь: <a href="?id=<? echo $resulte['id_nach']; ?>#preview_users" style="color:green">
  
   <?
   $is_user_lenta = $resulte['id_nach'];
$sql_user = $db->query("SELECT * FROM users where id = '$is_user_lenta'");
 $db->close;
 while($resultey_user = $sql_user->fetch_assoc()): 
 $login_usersa = $resultey_user['login'];
echo $login_usersa;
 endwhile;
 ?>
 
 
  
  
  
  </a> добавил нового сотрудника: 
  Должность: <span style="color:green;"><? echo $resultey['nazv']; ?></span> ФИО: <span style="color:green;"> <?  echo '';  echo $resulte['famil']; echo ' ' ;  echo $resulte['name'];
echo ' ' ; echo $resulte['otchestvo'];
  ?></span>
  
  </div>
<? 
endwhile;
endwhile;?>


	   



