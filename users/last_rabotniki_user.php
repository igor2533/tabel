<? include('session.php')?>
<? include('links.php'); ?>
<? include('db.php'); ?>




<?
$sql = $db->query("SELECT * FROM rabotniki where id_nach = '$id_Ses' order by id_r desc");
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
<p>Должность: <span style="color:green;"><? echo $resultey['nazv']; ?></span> <br>ФИО: <span style="color:green;"> <?  echo '';  echo $resulte['famil']; echo ' ' ;  echo $resulte['name'];
echo ' ' ; echo $resulte['otchestvo'];
  ?></span></p></div>
<? 
endwhile;
endwhile;?>


	   



