<? include('./links.php');?>
 <div class="add_new">
 
 <a href="../adds/add_rabotnik_admin.php">Добавить сотрудника</a>
 
 
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
 function list_select_rabot () {
  var a = document.getElementById('user_rab_r');
  var b = lowercase(document.getElementById('input_rab_r').value); 
  for (i=0; i<a.options.length; i++) {
   if (lowercase(a.options[i].innerHTML).indexOf(b)>-1) {
    a.options[i].selected = true; return; 
   }
  }
 }
</script>
 
  


 
 



 <form method="post" id="rabotniki_s" action="#manager_rabotnik">
 <div style="text-align:center;margin-bottom: 20px;">
 <input class="search_fio" style="width: 400px;font-size: 20px;padding: 5px;" id="input_rab_r" placeholder  = "Введите ФИО работника" onkeyup = "list_select_rabot()">
<select style="display:none;font-size: 20px;padding: 5px;" id="user_rab_r" size="1" name="user_rab_r">
<?
include('../db.php');

$sql_rabotniki_sel = $db->query("SELECT * FROM rabotniki ORDER BY famil ASC");
 $db->close;
 while($result_rabotniki_sel = $sql_rabotniki_sel->fetch_assoc()): 
$rabotnik_id_sel =$result_rabotniki_sel['id_r'];
$rabotnik_name_sel =$result_rabotniki_sel['name'];
$rabotnik_famil_sel =$result_rabotniki_sel['famil'];
$rabotnik_otchestvo_sel =$result_rabotniki_sel['otchestvo'];
 ?>
 <option value="<? echo $rabotnik_id_sel; ?>"><? echo $rabotnik_famil_sel.' '.$rabotnik_name_sel.' '.$rabotnik_otchestvo_sel;  ?></option>
 <?  endwhile;
 ?>
</select><input type="submit"  style=" display:none;padding: 5px;font-size: 20px;" name="filtr_r" value="Найти" autofocus></input></div>
 
 
 <div class="kategories" style="max-height: 200px;">
<?

$raba_ida = $_POST['user_rab_r'];
if(isset($_POST['filtr_r'])){
$sql_rabotniki = $db->query("SELECT * FROM rabotniki where id_r = '$raba_ida'");}
else{
	$sql_rabotniki = $db->query("SELECT * FROM rabotniki order by id_r DESC LIMIT 0");
}
 $db->close;
 while($resulte = $sql_rabotniki->fetch_assoc()): 
 ?>

 
 


<div class="kategory"  id="kategory">
<span>id:  </span>
 <span style="color:green;"><? echo $resulte['id_r'];?> </span> <span>ФИО: </span>
 <span  style="color:green;"><? echo $resulte['famil'];?>  <? echo $resulte['name'];?> <? echo $resulte['otchestvo'];?> </span>
 
 <span>Должность: </span>
 <span  style="color:green;"><? echo $resulte['dolj'];?> </span>
 
 <div class="uprav">
 <a onclick="update_in_manager_rabotnik<? echo $resulte['id_r'];?>();"href="#">Изменить</a> <a onclick="delete_in_manager_rabotnik<? echo $resulte['id_r'];?>();" href="#<? echo $resulte['id_r']; ?>">x</a></div>
 
 
 <script> 
 function delete_in_manager_rabotnik<? echo $resulte['id_r'];?>(){
 if (confirm("Удалить?")) {
 location.href= '../delete/delete_in_manager_rabotnik.php?id_c=<? echo $resulte['id_r']; ?>';
} else {
  alert("Отменено")
}

 }
 
 
 function update_in_manager_rabotnik<? echo $resulte['id_r'];?>(){
	 
	 location.href = '../update/update_rabotnik.php?id=<? echo $resulte['id_r'];?>';
 }
 
 </script>
 
 </div>
  <?endwhile?>
 
 </div>
 
 </form>
 

