<? include('./links.php');?>
 <div class="add_new">
 
 <a href="../tabel/adds/add_users.php">Добавить пользователя</a>
 
 
 </div>

 <div class="kategories" style="font-size: 15px;">
<?
$sql = $db->query("SELECT * FROM users ");
 $db->close;
 while($resulte = $sql->fetch_assoc()): 
 ?>

 
 


<div class="kategory" id="kategory">
<span>id:  </span>
 <span style="color:green;"><? echo $resulte['id'];?> </span> <span>Логин: </span>
 <span  style="color:green;"><? echo $resulte['login'];?> </span>


 
  <span>ФИО: </span>
 <span  style="color:green;"><? echo $resulte['fio'];?> </span>
 
 
 <div class="uprav">
  <a onclick="preview_in_manager_users<? echo $resulte['id'];?>();"href="#">Просмотр</a>
 <a onclick="update_in_manager_users<? echo $resulte['id'];?>();"href="#">Изменить</a> <a onclick="delete_in_manager_users<? echo $resulte['id'];?>();" href="#<? echo $resulte['id']; ?>">x</a></div>
 
 
 <script> 
 function delete_in_manager_users<? echo $resulte['id'];?>(){
 if (confirm("Удалить?")) {
 location.href= 'http://modul.by/tabel/delete/delete_in_manager_users.php?id_c=<? echo $resulte['id']; ?>';
} else {
  alert("Отменено")
}

 }
 
 
 function update_in_manager_users<? echo $resulte['id'];?>(){
	 
	 location.href = 'http://modul.by/tabel/update/update_users.php?id=<? echo $resulte['id'];?>';
 }
 
  function preview_in_manager_users<? echo $resulte['id'];?>(){
	 
	 location.href = '?id=<? echo $resulte['id'];?>#preview_users';
 }
 
 
 
 </script>
 
 </div>
  <?endwhile?>
 
 </div>
 
 
 
 
