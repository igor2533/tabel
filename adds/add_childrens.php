<? include('../session.php');?>
<? include('../links.php'); include('../db.php'); ?>

<? if (($level_users==1 OR $level_users==3)){ ?>

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
 function list_select () {
  var a = document.getElementById('user_id');
  var b = lowercase(document.getElementById('input').value); 
  for (i=0; i<a.options.length; i++) {
   if (lowercase(a.options[i].innerHTML).indexOf(b)>-1) {
    a.options[i].selected = true; return; 
   }
  }
 }
</script>



<html class="add_update">
<a class="back" href="../main_tabel.php#manager_childrens">Назад </a>
<form method="POST" class="form_up_add" action="add_childrens.php">
  
 
  


<input id="input" placeholder  = "Введите ФИО работника" onkeyup = "list_select()">
<select id="user_id" size="1" name="rab_id">
<?
$sql_rabotniki = $db->query("SELECT * FROM rabotniki ORDER BY id_r DESC");
 $db->close;
 while($result_rabotniki = $sql_rabotniki->fetch_assoc()): 
$rabotnik_id =$result_rabotniki['id_r'];
$rabotnik_name =$result_rabotniki['name'];
$rabotnik_famil =$result_rabotniki['famil'];
$rabotnik_otchestvo =$result_rabotniki['otchestvo'];
 ?>
 <option value="<? echo $rabotnik_id; ?>"><? echo $rabotnik_famil.' '.$rabotnik_name.' '.$rabotnik_otchestvo;  ?></option>
 <?  endwhile;
 ?>
</select>
  
  
  
   <select name="ligoty" size="1"> 
   <option selected disabled>Выплата алиментов</option>
  <option value="0">Нет</option>  
  <option value="1">Да</option>  
   </select>
  
   
   <input name="fio_children" type="text" placeholder="Введите ФИО ребенка" required>
           <input name="date_born_children_year" type="number" min="1997" max="2017" placeholder="Год рождения ребенка" required>
		      			  
		 <input name="date_born_children_day" type="number" min="1" max="31" placeholder="День рождения ребенка" required>
			  
		 <select size="1" name="date_born_children_month" required>
        <option value="" selected disabled>Месяц рождения ребенка</option>
    <option value="-01-">Январь</option>
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
			  
     <input name="submit_children" type="submit" value="Добавить">
	 
	 
 
	 
	 
      </form>
	  
	  <? 
	  
	  if(isset($_POST['submit_children'])){
		  
		  
		  
		  
		  
		  
		  		 $rab_id = strip_tags(trim($_POST['rab_id']));
				  $sql_config_nal_Det = $db->query("select * from configs where id = '$rab_id'");
 $db->close;
 while($result_config_nal_Det = $sql_config_nal_Det->fetch_assoc()): 
 $config_nal_Det = $result_config_nal_Det['deti'];
 endwhile;
          $ligoty = strip_tags(trim($_POST['ligoty']));		 
		    $fio_children = strip_tags(trim($_POST['fio_children']));
          $date_born_children_year = strip_tags(trim($_POST['date_born_children_year']));		
		          $date_born_children_month = strip_tags(trim($_POST['date_born_children_month']));	
				   $date_born_children_day = strip_tags(trim($_POST['date_born_children_day']));	
				 
				  
		$date_slagaemoe = '18';
		  $date_soverwennol_year =  $date_born_children_year + $date_slagaemoe;
		  $date_soverwennol_children = $date_soverwennol_year .   $date_born_children_month . $date_born_children_day;
		   $date_born_children = $date_born_children_year . $date_born_children_month . $date_born_children_day;
	  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_add_stavka = mysql_query("INSERT INTO childrens (`id_rab`,`date_born`,`aliments`,`fio_children`,`date_soverwennol`) VALUES ('$rab_id','$date_born_children',
 '$ligoty','$fio_children','$date_soverwennol_children')",$db);
 //$result = mysql_query("INSERT INTO doljnosty (`nameDolj`) VALUES('$name_dolj')",$db);
 
  

 
  $result_add_plus_child = mysql_query("UPDATE configs SET `deti` = '$config_nal_Det'+1 WHERE id = '$rab_id'",$db);
 
	echo "<script>location.href='../main_tabel.php#manager_childrens'; </script>";   
	
		 
	  }
	  
	  
	      }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }
	  
	  ?>
	  </html>