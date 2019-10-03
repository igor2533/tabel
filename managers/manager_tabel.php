<? include('./links.php');?>
 <div class="add_new">
 
 <a href="#manager_tabel">Добавить часы</a>
 
 
 </div>
 
    <script type="text/javascript">
 function lowercase (val) {
  var upper="QWERTYUIOPASDFGHJKLZXCVBNMЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁ";
  var lower="qwertyuiopasdfghjklzxcvbnmйцукенгшщзхъфывапролджэячсмитьбюё";  
  var c,t,s='';
  for (var i=0; i<val.length; i++) {
   c=val.substring(i,i+1);
   t=upper.indexOf(''+c);
   if (t>-1) c=lower.substring(t,t+1); 
   s+=c;
  }
  return s;
 }
 function list_select_tab () {
  var a = document.getElementById('user_tab_r');
  var b = lowercase(document.getElementById('input_tab_r').value); 
  for (i=0; i<a.options.length; i++) {
   if (lowercase(a.options[i].innerHTML).indexOf(b)>-1) {
    a.options[i].selected = true; return; 
   }
  }
 }
</script>
 
 
 <form method="POST" style="height: 350px;overflow-y: scroll;" action="#manager_tabel">
   
   <div class="poiskov">
   <input style="" name="day_s" value="" type="number" min="1" max="31" placeholder="День"/>
    <select style="" size="1" name="monday_s">
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
   
   
       <select style="" size="1" name="year_s">
    
    <option value="" selected disabled>Год</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
   </select>
   
   <select style="" size="1" name="dolj_s" required>
	   <option value="<? 
	   if(isset($_POST['poisk_tabel'])){
	   echo $_POST['dolj_s'];} else {echo '';}?>" selected >
	   <?
	    if(isset($_POST['poisk_tabel'])){
	 	   $sql_sel_dolj = $db->query("SELECT * FROM spravochniki where id = ".$_POST['dolj_s']." ");
 $db->close;
 while($resulte_sel_dolj = $sql_sel_dolj->fetch_assoc()):
 $name_dolj_sel = $resulte_sel_dolj['nazv'];
 endwhile;
	  
	   echo $name_dolj_sel;}
	   else { 
	   	   echo 'Должность';}
	   
	   ?>
	   	   
	  </option>
       <?
	   if(isset($_POST['poisk_tabel'])){
	   $sql_dolj_sel_l = $db->query("SELECT * FROM spravochniki where id!= ".$_POST['dolj_s']." ORDER BY id DESC");}
	   else {
		     $sql_dolj_sel_l = $db->query("SELECT * FROM spravochniki WHERE category = 18 ORDER BY id DESC");
	   }
 $db->close;
 while($resulte_dolj_sel_l = $sql_dolj_sel_l->fetch_assoc()): ?>
	<option value="<? echo $resulte_dolj_sel_l['id_dolj'];?>" ><? echo $resulte_dolj_sel_l['nazv']?></option>
	<?  endwhile;?>
	
    
   </select>
   
   
   <!-- fio -->
   <input style="" id="input_tab_r" placeholder  = "Введите ФИО работника" onkeyup = "list_select_tab()">
     <select style="" size="1" name="fio_s" id="user_tab_r" required >
	   <option value="<?if(isset($_POST['poisk_tabel'])){
echo $_POST['fio_s'];} else {echo '';}?>" selected>
	   <?
	    if(isset($_POST['poisk_tabel'])){
	 	   $sql_sel_fio = $db->query("SELECT * FROM rabotniki where id_r = ".$_POST['fio_s']." ");
 $db->close;
 while($resulte_sel_fio = $sql_sel_fio->fetch_assoc()):
 $name_fio = $resulte_sel_fio['name'];
 $famil_fio = $resulte_sel_fio['famil'];
 $otchestvo_fio = $resulte_sel_fio['otchestvo'];
 $fio_s_s = $famil_fio.' '.$name_fio.' '.$otchestvo_fio; 
 endwhile;
	  
	   echo $fio_s_s;}
	   else { 
	   	   echo 'ФИО';}
	   
	   ?>
	   	   
	  </option>
       <?
	   if(isset($_POST['poisk_tabel'])){
	   $sql = $db->query("SELECT * FROM rabotniki where id_r != ".$_POST['fio_s']." ORDER BY id_r DESC");}
	   else {
		     $sql = $db->query("SELECT * FROM rabotniki ORDER BY id_r DESC");
	   }
 $db->close;
 while($resulte = $sql->fetch_assoc()): ?>
	<option value="<? echo $resulte['id_r'];?>" ><? echo $resulte['famil'].' '.$resulte['name'].' '.$result['otchestvo'];?></option>
	<?  endwhile;?>
	
    
   </select>
   
   
   
   
   
   

   
   
   
   
   
   <input style="" type="submit" name="poisk_tabel" value="Применить фильтр">
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
        <td class="tdd" style="width: 10px;">кол-во часов рабочего дня</td>
		<td class="tdd" style="width: 10px;">кол-во часов ночных</td>
	        <td class="tdd">Дата проставления часов</td>
		 <td class="tdd">Пользователь</td>
		 	 <td class="tdd">Управление</td>
    </tr>
	
	
<?  


  if(isset($_POST['poisk_tabel']))
 {  
$year_s = strtoupper($_POST['year_s']);
$month_s = strtoupper($_POST['monday_s']);
$day_s = strtoupper($_POST['day_s']);
$dolj_s = strtoupper($_POST['dolj_s']);
$rab_ida = strtoupper($_POST['fio_s']);

 $sql = $db->query("SELECT *  FROM chasy
 WHERE date_prostav LIKE '%$year_s%' AND date_prostav LIKE '%$month_s%' AND date_prostav LIKE '%$day_s%' AND
doljnost LIKE '%$dolj_s%' AND id_rabotnika LIKE '%$rab_ida%'"); 
}

  else{ 
  $sql = $db->query("SELECT *  FROM chasy order by id_chasy desc LIMIT 2");
  } 
 
 $db->close;
 while($result = $sql->fetch_assoc()):
$ida_dolj = $result['doljnost'];
 ?>
	
    <tr>
        <td class="tdd"><? echo $result['id_chasy'];?></td>
        <td class="tdd"><? 
		
		
		$sqll = $db->query("SELECT * FROM spravochniki where id = '$ida_dolj'");
 $db->close;
 while($resultu = $sqll->fetch_assoc()): 
 $nazvy = $resultu['nazv'];
	
	echo $nazvy;
	
				
		?></td>
        <td class="tdd"><? echo $result['name_rabotnika'];?></td>
        <td class="tdd"><? echo $result['famil_rabotnika'];?></td>
        <td class="tdd"><? echo $result['otchestvo_rabotnika'];?></td>
        <td class="tdd"><? echo $result['chasov'];?></td>
		 <td class="tdd"><? echo $result['nochnie'];?></td>
	        <td class="tdd"><? echo $result['date_prostav'];?> (Г-М-Д)</td>
		 <td class="tdd"><? 
		 
		 
		 $id_nachalnik = $result['id_nach'];
		$sqll_nach = $db->query("SELECT * FROM users where id = ' $id_nachalnik'");
 $db->close;
 while($resultu_nach = $sqll_nach->fetch_assoc()): 
		 $name_nachalnika = $resultu_nach['login'];
		 endwhile;
		 
		 
		 
		 ?><a href="?id=<? echo $id_nachalnik;?>#preview_users"> <? echo $name_nachalnika;?></a> </td>
	 <td class="tdd">	<a onclick="update_in_manager_tabel<? echo $result['id_chasy'];?>();"href="#">Изменить</a>
		<a onclick="delete_in_manager_tabel<? echo $result['id_chasy'];?>();" href="#<? echo $result['id_chasy']; ?>">x</a></td>
    </tr>
	
	 <script> 
 function delete_in_manager_tabel<? echo $result['id_chasy'];?>(){
 if (confirm("Удалить?")) {
 location.href= '../delete/delete_in_manager_chasy.php?id_c=<? echo $result['id_chasy']; ?>';
} else {
  alert("Отменено")
}

 }
 
 
 function update_in_manager_tabel<? echo $result['id_chasy'];?>(){
	 
	 location.href = '../update/update_tabel.php?id=<? echo $result['id_chasy'];?>';
 }
 
 </script>
	
	
	
	<?
	endwhile;
 endwhile;  ?>
</table>
   
   

   </div>
   
   
   
   
   <div class="reload_tabel" style="text-align:center">
<a href="javascript:document.location.reload();">Обновить табель</a>  </div> 
  
  </form>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

 
 
 
