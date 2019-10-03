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
 function list_select_tabel_hor () {
  var a = document.getElementById('user_tabel_horizontal');
  var b = lowercase(document.getElementById('input_tabel_horizontal').value); 
  for (i=0; i<a.options.length; i++) {
   if (lowercase(a.options[i].innerHTML).indexOf(b)>-1) {
    a.options[i].selected = true; return; 
   }
  }
 }
</script>
 
<form method="post" action="#manager_tabel_horizontal">
 <div style="text-align:center;margin-bottom: 20px;">
 <input class="search_fio" style="width:400px;font-size: 20px;padding: 5px;" id="input_tabel_horizontal" placeholder  = "Введите ФИО работника" onkeyup = "list_select_tabel_hor()">
<select style="display:none;font-size: 20px;padding: 5px;" id="user_tabel_horizontal" size="1" name="rab_id_ras">
<?
include('../db.php');
if($level_users == 1 OR $level_users == 3){
$sql_rabotniki_sel = $db->query("SELECT * FROM rabotniki ORDER BY famil ASC");}
if($level_users == 2){
	$sql_rabotniki_sel = $db->query("SELECT * FROM rabotniki where id_nach = $id_Ses ORDER BY famil ASC");
}
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
</select><input type="submit" style="display:none;padding: 5px;font-size: 20px;" name="filtr_tabel_hor" value="Найти" /></div>
 
 
 
 
 
 
 
 
 
 
 
 <div class="kategories">
<?
$id_raba_v = $_POST['rab_id_ras'];

	
	
	if($level_users == 2 ){
		
		if(isset($_POST['filtr_tabel_hor'])){
		
		
		$sql = $db->query("SELECT * FROM rabotniki where id_r = $id_raba_v ");}
		
	else{$sql = $db->query("SELECT * FROM rabotniki order by id_r DESC LIMIT 0");}
		
		
	}
	
	
	else{
	
	if(isset($_POST['filtr_tabel_hor']))
	{$sql = $db->query("SELECT * FROM rabotniki where id_r = $id_raba_v");}
	
	
	else{$sql = $db->query("SELECT * FROM rabotniki order by id_r DESC LIMIT 0");}
	
	
	}
	
	




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
 <a onclick="manager_tabel_horizontal<? echo $resulte['id_r'];?>();"href="#">Просмотр табеля</a></div>
 
 
 <script> 
 
 
 function manager_tabel_horizontal<? echo $resulte['id_r'];?>(){
	 
	 location.href = '../tabel/tabel_horizontal.php?id=<? echo $resulte['id_r'];?>';
 }
 
 </script>
 
 </div>
  <?endwhile?>
 
 </div>
 
 </form>
 
 
