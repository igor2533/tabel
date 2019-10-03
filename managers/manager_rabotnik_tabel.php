<? include('./links.php');?>
 <div class="add_new">
 
 <a href="../adds/add_rabotnik.php">Добавить сотрудника</a>
 
 
 </div>

 <div class="kategories">
<?
$sql = $db->query("SELECT * FROM rabotniki where id_nach = $id_Ses");
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
	 
	 location.href = '../update/update_rabotnik_tabel.php?id=<? echo $resulte['id_r'];?>';
 }
 
 </script>
 
 </div>
  <?endwhile?>
 
 </div>
 
 
 
 
