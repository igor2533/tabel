 <div class="lenty">
<?
$sql = $db->query("SELECT * FROM chasy ORDER BY id_chasy DESC LIMIT 10 ");
 $db->close;
 while($resulte = $sql->fetch_assoc()): 
 ?>
 
 

<div class="zapis_lenti">
<span><? echo $resulte['date_create'];?> </span><span>
Пользователь: <a style="color:red;text-decoration:none;" href="?id=<? echo $resulte['id_nach']; ?>#preview_users" style="color:green">
  
   <?
   $is_user_lenta = $resulte['id_nach'];
$sql_user = $db->query("SELECT * FROM users where id = '$is_user_lenta'");
 $db->close;
 while($resultey_user = $sql_user->fetch_assoc()): 
 $login_usersa = $resultey_user['login'];
echo $login_usersa;
 endwhile;
 ?>
 </a>Работник: </span><span style="color:green;"><? echo $resulte['famil_rabotnika'];
echo ' ' ; echo $resulte['name_rabotnika']; echo ' '; echo $resulte['otchestvo_rabotnika'];

 ?> </span>
 <span>Должность: </span><span>
 <? 
 $resultik = $resulte['doljnost'];
	$sqll = $db->query("SELECT * FROM spravochniki where id = '$resultik'");
 $db->close;
 while($resultu = $sqll->fetch_assoc()): 
 $nazvy = $resultu['nazv'];
	endwhile;
	echo $nazvy;
 ?> </span><br>
 
 <span>Выставлено: </span> <span style="color:green;"><? echo $resulte['chasov']; ?> </span> <span> часа(ов) за
 </span> <span style=""><? echo $resulte['date_prostav']; ?> </span>
</div>
<? endwhile ?>

</div>