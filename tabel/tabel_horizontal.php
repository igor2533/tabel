<? include_once('../db.php'); include('../links.php'); include('../session.php'); ?>

<? if($level_users ==1 OR $level_users ==3)
{
}	
if($level_users == 2)
{
$sql_proverk_lv = $db->query("SELECT * FROM rabotniki where id_r = ".$_GET['id']."");
 $db->close;
 while($result_proverk_lv = $sql_proverk_lv->fetch_assoc()): 
	$id_nachaln= $result_proverk_lv['id_nach'];
	endwhile;
	
	if($id_Ses != $id_nachaln){
		echo '<script>location.href="../error.php";</script>';
	}
}
?>
<style> 
.tdd{    padding: 2px!important;    border: solid 1px #fffa90!important;}
</style>
<html class="add_update">
<a class="back" href="../main_tabel.php#manager_tabel_horizontal">Назад</a>

<form method="POST" class="form_up_add" style="margin-top:30px;" action="tabel_horizontal.php?id=<?
$id = $_GET['id'];

 echo $id?>">
   
   <div class="poiskov">
  
    <select size="1" style="background: rgba(0, 0, 0, 0.65);
    color: white;" name="monday_" required>
        <option value="" selected disabled>Месяц</option>
    <option value="-01-">Январь</option>
    <option value="-02-">Февраль</option>
    <option value="-03-">Март</option>
	<option value="-04-">Апрель</option>
    <option value="-05-">Май</option>
    <option value="-06-">Июнь</option>
   <option value="-07-">Июль</option>
    <option value="-08-">Август</option>
    <option value="-09-">Сентябрь</option>
	<option value="-10-">Октябрь</option>
    <option value="-11-">Ноябрь</option>
    <option value="-12-">Декабрь</option>
   </select>
   
   
       <select style="background: rgba(0, 0, 0, 0.65);
    color: white;" size="1" name="year_s" required>
    
    <option value="" selected disabled>Год</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
   </select>
   
      
   <input style="background: rgba(0, 0, 0, 0.65);
    color: white;" type="submit" name="poisk_tabel" value="Применить фильтр">
    </div>
   </br>
   
   <div class="tabel_e" style="">
   
   <table style="    background: rgba(0, 0, 0, 0.65);
    color: wheat;
    font-weight: bold;
    font-size: 17px;">
    <tr> 
	<td>(0)-Вск,(6)-Cб,(1)-Пн</td>
	</tr>	
	<tr>
	<td>Число месяца </br> День недели </td>
<? 
$months = $_POST['monday_'];
$year = $_POST['year_s'];
 $sql = $db->query("SELECT * FROM chasy where date_prostav LIKE '%$months%' AND id_rabotnika LIKE  '$id' AND date_prostav LIKE '%$year%' ORDER BY day ASC");
 $db->close;
 while($result = $sql->fetch_assoc()):
 $data_prostavi = $result['date_prostav'];
$date_ready = substr_replace($data_prostavi, null, 0, 12);
$date_dni_ned = substr_replace($data_prostavi, null,4, 12);


 ?>
	    
      
        	
	   <td class="tdd"><? echo $date_ready; echo '</br>'.$date_dni_ned; ?></td>
	
	<?
	
	endwhile; 

	?>
	</tr>
	
	
	
	
		<tr>
		<td>Часы рабочего дня</td>
<? 

$sql = $db->query("SELECT * FROM chasy where date_prostav LIKE '%$months%' AND id_rabotnika LIKE  '$id' AND date_prostav LIKE '%$year%' ORDER BY day ASC");
 $db->close;
 while($result = $sql->fetch_assoc()):
 
 ?>
	    
        <td class="tdd"><? echo $result['chasov'];?></td>
        	
	 	
	<?
	
	endwhile;  ?>
	
	
	<?//Считаем сколько рабочик часов вышло по факту
	
	  $sql = $db->query("SELECT SUM(chasov) FROM chasy WHERE id_rabotnika = '$id' AND date_prostav LIKE '%$months%' AND date_prostav LIKE '%$year%'");
 $db->close;
 while($resulte = $sql->fetch_assoc()):
$chasov_vsego = $resulte['SUM(chasov)'];
endwhile;?>
	
	<td class="tdd">
	<?  echo 'Всего часов: '.$chasov_vsego;?>
	
	</td>
	
	
	</tr>
	
	
			<td>Часы ночные</td>
<? 

 $sql = $db->query("SELECT * FROM chasy where date_prostav LIKE '%$months%' AND id_rabotnika LIKE  '$id' AND date_prostav LIKE '%$year%' ORDER BY day ASC");
 $db->close;
 while($result = $sql->fetch_assoc()):
 
 ?>
	    
        <td class="tdd"><? echo $result['nochnie'];?></td>
        	
	 	
	<?
	
	endwhile;  ?>
		<?//Считаем сколько рабочик часов вышло по факту
	  $sql = $db->query("SELECT SUM(nochnie) FROM chasy WHERE id_rabotnika = '$id' AND date_prostav LIKE '%$months%' AND date_prostav LIKE '%$year%'");
 $db->close;
 while($resulte = $sql->fetch_assoc()):
$chasov_vsego_n = $resulte['SUM(nochnie)'];
endwhile;?>
	
	<td class="tdd">
	<?  echo 'Всего часов: '.$chasov_vsego_n;?>
	
	</td>
	
	
	</tr>
	
	
	
	
	
	
	
	
	
</table>
   
   

   </div>
   
      

  </form>

  </html>
 
