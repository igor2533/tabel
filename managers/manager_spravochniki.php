<? include('./links.php');?>
 <div class="add_new">
 
 <a href="../adds/add_spravochnik.php">Добавить справочник</a>
 
 
 </div>

 <div class="kategories">
<?
$sql = $db->query("SELECT * FROM spravochniki");
 $db->close;
 while($resulte = $sql->fetch_assoc()): 
 ?>

 
 


<div class="kategory" id="kategory">
<span>id:  </span>
 <span style="color:green;"><? echo $resulte['id_stavka'];?> </span> <span>Название: </span>
 <span  style="color:green;"><? echo $resulte['nazv_stavk'];?> </span>
 
 <span> Значение BYN: </span>
 <span  style="color:green;"><? echo $resulte['koeff'];?> </span>
 
 <div class="uprav">
 <a onclick="update_in_manager_stavka<? echo $resulte['id_stavka'];?>();"href="#">Изменить</a> <a onclick="delete_in_manager_stavka<? echo $resulte['id_stavka'];?>();" href="#<? echo $resulte['id_category_rab']; ?>">x</a></div>
 
 
 <script> 
 function delete_in_manager_stavka<? echo $resulte['id_stavka'];?>(){
 if (confirm("Удалить?")) {
 location.href= '../delete/delete_in_manager_stavka.php?id_c=<? echo $resulte['id_stavka']; ?>';
} else {
  alert("Отменено")
}

 }
 
 
 function update_in_manager_stavka<? echo $resulte['id_stavka'];?>(){
	 
	 location.href = '../update/update_stavka.php?id=<? echo $resulte['id_stavka'];?>';
 }
 
 </script>
 
 </div>
  <?endwhile?>
 
 </div>
 
 
 
 
