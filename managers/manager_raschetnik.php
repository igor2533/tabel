<? include('./links.php');?>
 <div class="add_new">
 
 

 
 
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
 function list_select_rasch () {
  var a = document.getElementById('user_rab_ras');
  var b = lowercase(document.getElementById('input_ras').value); 
  for (i=0; i<a.options.length; i++) {
   if (lowercase(a.options[i].innerHTML).indexOf(b)>-1) {
    a.options[i].selected = true; return; 
   }
  }
 }
</script>
 
 
 
 
<form method="post" style="text-align:center;" action="#manager_raschetnik">
<p style="color:white;font-size:30px; font-weight:bold;">Формирование расчетных листов</p>
 <div style="text-align:center;margin-bottom: 20px;">
 <input class="search_fio" style="width:400px;font-size: 20px;padding: 5px;" id="input_ras" placeholder  = "Введите ФИО работника" onkeyup = "list_select_rasch()">
<select style="display:none;font-size: 20px;padding: 5px;" id="user_rab_ras" size="1" name="rab_id_ras">
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
</select><input type="submit" style="display:none;padding: 5px;font-size: 20px;" name="filtr_ras" value="Найти" /></div>
 
 
 
 
 
 
 
 
 
 
 
 <div class="kategories">
<?
$id_raba_v = $_POST['rab_id_ras'];
if ($level_users == 1 OR $level_users == 3){
	if(isset($_POST['filtr_ras'])){$sql = $db->query("SELECT * FROM rabotniki where id_r = $id_raba_v");}
	
	else{}
	
	
	
	
	}
	else
		{$sql = $db->query("SELECT * FROM rabotniki order by id_r DESC");}



 $db->close;
 while($resulte = $sql->fetch_assoc()): 
 ?>

   
 


<div class="kategory" id="kategory">
<span>id:  </span>
 <span style="color:green;"><? echo $resulte['id_r'];?> </span> <span>ФИО: </span>
 <span  style="color:green;"><? echo $resulte['famil'];?>  <? echo $resulte['name'];?> <? echo $resulte['otchestvo'];?> </span>
 
 <span>Должность: </span>
 <span  style="color:green;"><? echo $resulte['dolj'];?> </span>
 
 <div class="uprav">
 <a onclick="raschet_in_manager_raschetnik<? echo $resulte['id_r'];?>();"href="#">Расчитать</a></div>
 
 
 <script> 
 
 
 function raschet_in_manager_raschetnik<? echo $resulte['id_r'];?>(){
	 
	 location.href = '../othety/raschetni_listok.php?id=<? echo $resulte['id_r'];?>';
 }
 
 </script>
 
 </div>
  <?endwhile?>
 
 </div>
 
 </form>
 
 
