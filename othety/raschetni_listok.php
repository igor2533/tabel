<? include('../session.php'); include('../links.php'); $id = $_GET['id'];include('../db.php');?>



<!-- условие проверки на наличие администратора -->
<?
$id_usersa = $id_Ses;
$id=$_GET['id'];
  
 $sql = $db->query("SELECT * FROM rabotniki WHERE `id_r` = '$id'");
  $db->close; 
while($result = $sql->fetch_assoc()):
$id_nachalnika = $result['id_nach'];
endwhile;

if ($id_Ses==$id_nachalnika OR $level_users ==1 OR $level_users ==3){ 

?>

<?


?>


<html class="add_update" style="" >
 <a class="back" href="../main_tabel.php#manager_raschetnik"> Назад</a>
<form method="POST" style="margin-top:2vh;"  class="form_up_add" action="raschetni_listok.php?id=<? echo $id?>">
 <select size="1" name="monday" required>
          <option value="-01-" selected>Январь</option>
    <option value="-02-">Февраль</option>
    <option value="-03-">Март</option>
	<option value="-04-">Апрель</option>
    <option value="-05-">Май</option>
    <option value="-06-">Июнь</option>
   <option value="-07-">Июль</option>
    <option value="-08-">Август</option>
    <option value="-09-">Сентябрь</option>
	<option value="-10-">Октябрь</option>
    <option value="-11-">Ноябрь</option>
    <option value="-12-">Декабрь</option>
   </select>
   
   
       <select size="1" name="year" required>
    
    <option value="2017" selected>2017</option>
   
   <option value="2018">2018</option>
    

	
   </select>
<input type="submit" href="" name="prim" value="Расчитать" />

</form>



<?php 

if(isset($_POST['prim'])){
   include('functions_raschet.php');
?>

 

<?



 }
//Иное

else
{
	 echo '<div class="raschetnik">';
	echo 'Выберите месяц и год!!!';
	 echo '</div>';
	
}
}
else
{
	echo "<script> location.href='error_rab.php'; </script>";
	
}
?>

<?include('raschetni_form.php');?>

	  
	</html>  
	  
      
	  