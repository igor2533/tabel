<? include('./links.php');?>
 <div class="add_new">
 
 <a href="../adds/add_in_spravochnik.php?cat=<?echo $_GET['id'];?>">Добавить</a>
 
 
 </div>

 
 <p style="    text-align: center;
    font-size: 25px;
    font-weight: bold;
    color: wheat;">
<? 

$sql_nazv_kategor = $db->query("SELECT * FROM category_spravochnik where id = ".$_GET['id']."");
 $db->close;
 while($resulte_nazv_kategor = $sql_nazv_kategor->fetch_assoc()): 
$category_spravochnik_text = $resulte_nazv_kategor['nazv'];
endwhile;

echo $category_spravochnik_text;

 ?></p>
 
 <div class="kategories">
<?
$sql_f_in_sprav = $db->query("SELECT * FROM spravochniki where category = ".$_GET['id']."");
 $db->close;
 while($resulte_f_in_sprav = $sql_f_in_sprav->fetch_assoc()): 
 $id_z = $resulte_f_in_sprav['id'];
  $coeff_z = $resulte_f_in_sprav['koeff'];
   $nazv_z = $resulte_f_in_sprav['nazv'];
   $categoryw_z = $resulte_f_in_sprav['category']->nazv;
    
 ?>

 
 

<div class="kategory" id="kategory">
<span>id:  </span>
 <span style="color:green;"><? echo $id_z;?> </span> <span>Наз-е эл-та: </span>
 <span  style="color:green;"><? echo $nazv_z;?> </span>
 
 <span>Значение: </span>
 <span  style="color:green;"><? echo $coeff_z;?> </span>
 
 <div class="uprav">
 <a onclick="update_in_manager_elem_sprav<? echo $id_z;?>();"href="#">Изменить</a> <a onclick="delete_in_manager_elem_sprav<? echo $id_z;?>();" href="#">x</a></div>
 
 
 <script> 
 function delete_in_manager_elem_sprav<? echo $id_z;?>(){
 if (confirm("Удалить?")) {
 location.href= '../delete/delete_in_manager_elem_sprav.php?id_c=<? echo $id_z; ?>';
} else {
  alert("Отменено")
}

 }
 
 
 function update_in_manager_elem_sprav<? echo $id_z;?>(){
	 
	 location.href = '../update/update_elem_sprav.php?id=<? echo $id_z;?>';
 }
 
 </script>
 
 </div>
  <?endwhile?>
 

<div class="close_div">
 <a style="    background: #2196F3;" href="#manager_category_spravochnik">Назад</a></div> 
 
 </div>
 
 
 
 
