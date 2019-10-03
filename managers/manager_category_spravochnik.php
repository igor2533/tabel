<? include('./links.php');?>
 <div class="add_new">
 
 <a href="../adds/add_category_spravochnik.php">Добавить новый справочник</a>
 
 
 </div>

 <div class="kategories">
<?
$sql = $db->query("SELECT * FROM category_spravochnik");
 $db->close;
 while($resulte = $sql->fetch_assoc()): 
 ?>

 
 


<div class="kategory" id="kategory">
<span>id:  </span>
 <span style="color:green;"><? echo $resulte['id'];?> </span> <span>Название: </span>
 <span  style="color:green;"><? echo $resulte['nazv'];?> </span>
 
 
 
 <div class="uprav">
  <a onclick="prewiew_in_manager_category_spravochnik<? echo $resulte['id'];?>();"href="#">Просмотр</a> 
 <a onclick="update_in_manager_category_spravochnik<? echo $resulte['id'];?>();"href="#">Изменить</a> <a onclick="delete_in_manager_category_spravochnik<? echo $resulte['id'];?>();" href="#">x</a></div>
 
 
 <script> 
 function delete_in_manager_category_spravochnik<? echo $resulte['id'];?>(){
 if (confirm("Удалить?")) {
 location.href= '../delete/delete_in_manager_category_spravochnik.php?id_c=<? echo $resulte['id']; ?>';
} else {
  alert("Отменено")
}

 }
 

 function update_in_manager_category_spravochnik<? echo $resulte['id'];?>(){
	 
	 location.href = '../update/update_category_spravochnik.php?id=<? echo $resulte['id'];?>';
 }
 
 function prewiew_in_manager_category_spravochnik<? echo $resulte['id'];?>(){
	 
	 location.href = '../main_tabel.php?id=<? echo $resulte['id'];?>#prewiew_in_manager_category_spravochnik';
 }
 
 </script>
 
 </div>
  <?endwhile?>
 
 </div>
 
 
 
 
