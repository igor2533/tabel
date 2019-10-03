<div class="lenty">
<?
$sql = $db->query("SELECT * FROM chasy where id_nach = '$id_Ses' ORDER BY id_chasy DESC LIMIT 10 ");
 $db->close;
 while($resulte = $sql->fetch_assoc()): 
 ?>
<div class="zapis_lenti">
<span><? echo $resulte['date_create'];?> (День-месяц-год) </span><br><span>Выставлены часы работнику:</span><span style="color:green;"><? echo $resulte['famil_rabotnika'];
echo ' ' ; echo $resulte['name_rabotnika']; echo ' '; echo $resulte['otchestvo_rabotnika'];

 ?> </span><br>
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
 </span> <span style=""><? echo $resulte['date_prostav']; ?> (Год-месяц-день) </span>
</div>
<? endwhile ?>

</div>