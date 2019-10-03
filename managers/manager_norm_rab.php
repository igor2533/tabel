<? include('./session.php');?>

<? if (($level_users==1 OR $level_users==3)){ ?>





<?php   
include('links.php');  
  include_once('db.php');
  $year_get = $_GET['id'];
  ?>
 

  
  <?
 $sql = $db->query("SELECT * FROM norma_rab where id = '$year_get'");
  $db->close; 
while($result = $sql->fetch_assoc()):

$year_vibora = $result['year'];
$january = $result['january'];
$february = $result['february'];
$march = $result['march'];
$april = $result['april'];
$may = $result['may'];
$june = $result['june'];
$july = $result['july'];
$august = $result['august'];
$september = $result['september'];
$october = $result['october'];
$november = $result['november'];
$december = $result['december'];	
$sr_norma_ch = $result['sr_norma_ch'];
?>
<div style="margin-bottom: 15px;" class="close_div">
 <a href="#modal-close">Закрыть</a></div>
 

 
 
 
 
 

	<form method="post" style="margin-top:2px;" class="form_up_add" action="?id=<? echo $year_get;?>#manager_norm_rab">


	<select id="year_change"> 
	
	<option value="" selected>Выберите год</option>
	
	
	<?$sql = $db->query("SELECT * FROM norma_rab order by year desc");
  $db->close; 
while($result = $sql->fetch_assoc()):
$year = $result['year'];
$id = $result['id'];?>
 <option value="<?
  
 
 echo $id;
 ?>"><? echo $year;?> </option>
<?

endwhile;

?>

  </select> </br>
	
	
	

Выбран  <input value = "<?php echo $year_vibora;?>" type="text" name="year" disabled /> год</br>
Средняя норма РВ  <input value = "<?php echo $sr_norma_ch;?>" type="text" name="sr_norma_ch" required /></br>
Январь  <input value = "<?php echo $january;?>" type="text" name="january" required /></br>
Февраль <input value = "<?php echo $february;?>" type="text" name="february" required /></br>
Март <input value = "<?php echo $march;?>" type="text" name="march" required /></br>
Апрель  <input value = "<?php echo $april;?>" type="text" name="april" required /></br>
Май  <input value = "<?php echo $may;?>" type="text" name="may" required /></br>
Июнь  <input value = "<?php echo $june;?>" type="text" name="june" required /></br>
Июль  <input value = "<?php echo $july;?>" type="text" name="july" required /></br>
Август  <input value = "<?php echo $august;?>" type="text" name="august" required /></br>
Сентябрь  <input value = "<?php echo $september;?>" type="text" name="september" required /></br>
Октябрь  <input value = "<?php echo $october;?>" type="text" name="october" required /></br>
Ноябрь  <input value = "<?php echo $november;?>" type="text" name="november" required /></br>
Декабрь  <input value = "<?php echo $december;?>" type="text" name="december" required /></br>

<input type="submit" name="update_norma" value="Изменить" /></br>

</form>
	<script>

	$( "#year_change" ).change(function() {
 
var select_chamge = document.getElementById("year_change"); 
var yeat_js = select_chamge.options[select_chamge.selectedIndex].value; 
 
 location.href="?id="+yeat_js+"#manager_norm_rab";
 
 
});
	
	

</script>	
	 
  <?php  endwhile; 

  
   ?>
 
  <?php
$year = strip_tags(trim($_POST['year']));
$january = strip_tags(trim($_POST['january']));
$february = strip_tags(trim($_POST['february']));
$march = strip_tags(trim($_POST['march']));
$april = strip_tags(trim($_POST['april']));
$may = strip_tags(trim($_POST['may']));
$june = strip_tags(trim($_POST['june']));
$july = strip_tags(trim($_POST['july']));
$august = strip_tags(trim($_POST['august']));
$september = strip_tags(trim($_POST['september']));	
$october = strip_tags(trim($_POST['october']));
$november = strip_tags(trim($_POST['november']));	 
$december = strip_tags(trim($_POST['december']));	
$sr_norma_ch = strip_tags(trim($_POST['sr_norma_ch']));	

 if(isset($_POST['update_norma']))
 {
 
  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_update_constants = mysql_query("UPDATE norma_rab SET `sr_norma_ch` = '$sr_norma_ch',`january`='$january',`february`= '$february',`march`= '$march',
`april`= '$april',`may`= '$may',`june`= '$june'
,`july`= '$july',`august`= '$august',`september`= '$september',`october`= '$october',
`november`= '$november',`december`= '$december' WHERE id = '$year_get'",$db);
   
   echo "<script> location.href = '../main_tabel.php'; </script>";
   

  
  
  
  }
  
  
  
    
/*    else {
	   include_once('db_red.php');
    $result_add_constants = mysql_query("INSERT INTO constants (`nazv_predpr`, `inn`, `adress`, `tel_directora`, `tel_buhgaltera`, `fio_gl_buhgaltera`, `fio_directora`, `BPM`, `MZP`, `nalog_podohodni`, `god_osnovania`, `pensionni_fond`) VALUES ('$nazv_predpr','$inn','$adress','$tel_directora','$tel_buhgaltera','$fio_gl_buhgaltera','$fio_directora','$BPM','$MZP','$nalog_podohodni','$god_osnovania','$pensionni_fond')",$db);  
	  
} */
  
  
 
  
  

  	       }
	  else{
	 echo "<script> location.href='../error.php'; </script>";
	 
 }
	  
  
  
  
   ?>  
 