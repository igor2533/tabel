<? include('./links.php');?>
 <div class="add_new">
 
 <a href="../adds/add_childrens.php">Добавить нового ребенка</a>
 
 
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
 function list_select_child () {
  var a = document.getElementById('user_rab_ch');
  var b = lowercase(document.getElementById('input_ch_ch').value); 
  for (i=0; i<a.options.length; i++) {
   if (lowercase(a.options[i].innerHTML).indexOf(b)>-1) {
    a.options[i].selected = true; return; 
   }
  }
 }
</script>
 
<form method="post" action="#manager_childrens">
 <div style="text-align:center;margin-bottom: 20px;">
 <input style="font-size: 20px;padding: 5px;" id="input_ch_ch" placeholder  = "Введите ФИО ребенка" onkeyup = "list_select_child()">
<select style="font-size: 20px;padding: 5px;" id="user_rab_ch" size="1" name="child_id">
<?
include('../db.php');

$sql_childrens_sel = $db->query("SELECT * FROM childrens ORDER BY fio_children DESC");
 $db->close;
 while($result_childrens_sel = $sql_childrens_sel->fetch_assoc()): 
$childrens_id_sel =$result_childrens_sel['id'];
$childrens_famil_sel =$result_childrens_sel['fio_children'];
 ?>
 <option value="<? echo $childrens_id_sel; ?>"><? echo $childrens_famil_sel;  ?></option>
 <?  endwhile;
 ?>
</select><input type="submit" style="display:none;padding: 5px;font-size: 20px;" name="filtr_ch" value="Найти" /></div>
 
 
 
 <div class="kategories">
<?
if(isset($_POST['filtr_ch'])){
	$children_id = $_POST['child_id'];
$sql = $db->query("SELECT * FROM childrens where id = $children_id ");}
else{
$sql = $db->query("SELECT * FROM childrens order by id LIMIT 0");	
}
 $db->close;
 while($resulte = $sql->fetch_assoc()): 
 $id_rabotnika = $resulte['id_rab'];
 ?>

 
 


<div class="kategory" id="kategory" style="font-size: 17px;">
<span>id:  </span>
 <span style="color:green;"><? echo $resulte['id'];?> </span> <span>ФИО родителя: </span>
 <span  style="color:green;"><? 
 $sql_rabotnika = $db->query("SELECT * FROM rabotniki where id_r = $id_rabotnika");
 $db->close;
 while($resulte_rabotnika = $sql_rabotnika->fetch_assoc()): 
 $famil_rab = $resulte_rabotnika['famil'];
  $name_rab = $resulte_rabotnika['name'];
    $otchestvo_rab = $resulte_rabotnika['otchestvo'];
 endwhile;
 
 
 echo $famil_rab.' '.$name_rab.' '.$otchestvo_rab;?> </span>
 
 <span>ФИО ребенка: </span>
 <span  style="color:green;"><? echo $resulte['fio_children'];?> </span>
 
 <div class="uprav">
 <a onclick="update_in_manager_childrens<? echo $resulte['id'];?>();"href="#">Изменить</a> <a onclick="delete_in_manager_childrens<? echo $resulte['id'];?>();" href="#">x</a></div>
 
 
 <script> 
 function delete_in_manager_childrens<? echo $resulte['id'];?>(){
 if (confirm("Удалить?")) {
 location.href= '../delete/delete_in_manager_childrens.php?id_c=<? echo $resulte['id']; ?>';
} else {
  alert("Отменено")
}

 }
 
 
 function update_in_manager_childrens<? echo $resulte['id'];?>(){
	 
	 location.href = '../update/update_childrens.php?id=<? echo $resulte['id'];?>';
 }
 
 </script>
 
 </div>
  <?endwhile?>
 
 </div>
 
 </form>
 
 
