<? include_once('db.php'); include('links.php'); ?>

<form method="POST" style="height: 350px;
    overflow-y: scroll;" action="#tabel_search">
   
   <div class="poiskov">
  
    <select size="1" name="monday_">
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
   
   
       <select size="1" name="year_s">
    
    <option value="" selected disabled>Год</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
   </select>
   
      <select size="1" name="dolj_s">
    <option disabled value="" selected>Должность</option>
    <?
	$sql = $db->query("SELECT * FROM dolj ORDER BY id_dolj DESC");
 $db->close;
 while($resulte = $sql->fetch_assoc()): ?>
	<option value="<? echo $resulte['id_dolj'];?>" ><? echo $resulte['nazv']?></option>
	<?  endwhile?>
	
    
   </select>
   
   
     <select size="1" name="fio_s">
	   <option value="" selected disabled>ФИО</option>
       <?
	$sql_raby = $db->query("SELECT * FROM rabotniki where id_nach = $id_Ses ORDER BY id_r DESC");
 $db->close;
 while($resulte_raby = $sql_raby->fetch_assoc()): ?>
	<option value="<?  echo $resulte_raby['id_r'];?>" ><? echo $resulte_raby['famil']; echo ' '; echo $resulte_raby['name']; echo ' '; echo $resulte_raby['otchestvo'];?></option>
	<?  endwhile?>
	
    
   </select>
   
   
   
   <input type="submit" name="poisk_tabel" value="Применить фильтр">
    </div>
   </br>
   
   <div class="tabel_e" style="height: 400px; overflow-y:scroll;">
   
   <table style="    background: rgb(255, 255, 255);">
    <tr>
        <td class="tdd">id операции</td>
        <td class="tdd">Должность</td>
        <td class="tdd">Имя</td>
        <td class="tdd">Фамилия</td>
        <td class="tdd">Отчество</td>
        <td class="tdd" style="width: 10px;">кол-во часов</td>
        <td class="tdd">Дата проставления часов</td>
    </tr>
	
	
<?  $sql = $db->query("SELECT * FROM chasy where id_nach = '$id_Ses' ORDER BY id_chasy DESC");
 $db->close;
 while($result = $sql->fetch_assoc()):
$ida_dolj = $result['doljnost'];
 ?>
	
    <tr>
        <td class="tdd"><? echo $result['id_chasy'];?></td>
        <td class="tdd"><? 
		
		
		$sqll = $db->query("SELECT * FROM dolj where id_dolj = '$ida_dolj'");
 $db->close;
 while($resultu = $sqll->fetch_assoc()): 
 $nazvy = $resultu['nazv'];
	
	echo $nazvy;
	
				
		?></td>
        <td class="tdd"><? echo $result['name_rabotnika'];?></td>
        <td class="tdd"><? echo $result['famil_rabotnika'];?></td>
        <td class="tdd"><? echo $result['otchestvo_rabotnika'];?></td>
        <td class="tdd" style="width: 10px;"><? echo $result['chasov'];?></td>
        <td class="tdd"><? echo $result['date_prostav'];?> (Г-М-Д)</td>
    </tr>
	<?
	endwhile;
	endwhile;  ?>
</table>
   
   

   </div>
   
   
   
   
   <div class="reload_tabel" style="text-align:center">
<a href="javascript:document.location.reload();">Обновить табель</a>  </div> 
  
  </form>

  
 
