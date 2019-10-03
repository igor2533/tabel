<? include('./links.php');?>
 <div class="add_new">
 
 <a href="../adds/add_levels.php">Добавить уровень доступа</a>
 
 
 </div>

 <div class="kategories">
<?
$sql = $db->query("SELECT * FROM levels");
 $db->close;
 while($resulte = $sql->fetch_assoc()): 
 ?>

 
 


<div class="kategory" id="kategory">
<span>Уровень доступа:  </span>
 <span style="color:green;"><? echo $resulte['level'];?> </span> <span>Название: </span>
 <span  style="color:green;"><? echo $resulte['nazv'];?> </span>
 
 
 <div class="uprav">
 <a onclick="update_in_manager_levels<? echo $resulte['id'];?>();"href="#">Изменить</a> <a onclick="delete_in_manager_levels<? echo $resulte['id'];?>();" href="#<? echo $resulte['nazv']; ?>">x</a></div>
 
 
 <script> 
 function delete_in_manager_levels<? echo $resulte['id'];?>(){
 if (confirm("Удалить?")) {
 location.href= '../delete/delete_in_manager_levels.php?id_c=<? echo $resulte['id']; ?>';
} else {
  alert("Отменено")
}

 }
 
 
 function update_in_manager_levels<? echo $resulte['id'];?>(){
	 
	 location.href = '../update/update_levels.php?id=<? echo $resulte['id'];?>';
 }
 
 </script>
 
 </div>
  <?endwhile?>
 
 </div>
 
 
 
 
