<? include('../session.php');include('../links.php');  
  include_once('../db.php');  ?>

  <? if (($level_users==1 OR $level_users==3)){ ?>
  
  
  <html class="add_update" >
<?php   

  $id=$_GET['id'];
  
 $sql = $db->query("SELECT * FROM rabotniki WHERE `id_r` = '$id'");
  $db->close; 
while($result = $sql->fetch_assoc()):

  $dolj = $result['dolj'];
  $name = $result['name'];
  $famil = $result['famil'];
  $otchestvo = $result['otchestvo'];
  $stav_born = $result['date_born'];
  $category = $result['category'];
  $form_truda = $result['forma_truda'];
  $stavka = $result['stavka'];
  $razryad = $result['razryad'];
  $premia = $result['premia'];
  $profmasterstvo = $result['profmasterstvo'];
  $profsouz = $result['profsouz'];
  $uslov_truda = $result['uslov_truda'];
  $group_s = $result['group_s'];
  $sovmewenie = $result['sovmewenie'];
  $counts_akcii = $result['akcii'];
  $chasy_vsego = $result['chasy_vsego'];
$user_nach_id = $result['id_nach'];
	$aliments = $result['aliments'];
	$nadbavka = $result['nadbavka'];
	$coeff_povish = $result['coeff_povish'];
	$za_slojn_napr = $result['za_slojn_napr'];
	$podrazdelenie = $result['podrazdelenie'];
?>
<a class="back" href="../main_tabel.php#manager_rabotnik">Назад </a>
	<form method="post" style="margin-top: 1vh;" class="form_up_add" action="update_rabotnik.php?id=<?php echo $id;?>">


	<!-- TREBUSHET -->
	   <select name="id_nach" size="1" title="Пользователь" required >
        <option value="<? echo $user_nach_id; ?>" selected><?
		$sql_nacha_id = $db->query("SELECT * FROM users where id = $user_nach_id ");
 $db->close;
 while($result_nacha_id = $sql_nacha_id->fetch_assoc()):
		$login_nachal = $result_nacha_id['login'];
		endwhile;
		echo $login_nachal;
		?></option>
	     <?  $sql_nach_no = $db->query("SELECT * FROM users where id != $user_nach_id ORDER BY id DESC");
 $db->close;
 while($result_nach_no = $sql_nach_no->fetch_assoc()): ?>
		   
    <option value="<? echo $result_nach_no['id']; ?>"><? echo $result_nach_no['login']; ?></option>

	
	<? endwhile ?>
   </select></br>
	
	
	
	
	 <?  $sql_spravochniki = $db->query("SELECT * FROM category_spravochnik where setting_sel = 1");
 $db->close;
 while($result_spravochniki = $sql_spravochniki->fetch_assoc()): 

 
 $result_spravochniki_id = $result_spravochniki['id'];
 $result_spravochniki_nazv = $result_spravochniki['nazv'];
 ?>
 
 
 
 
   <select name="id_sprav_<?= $result_spravochniki_id;?>" size="1" title="<?= $result_spravochniki_nazv; ?>" required >
      	     <?  $sql_podrazdel = $db->query("SELECT * FROM spravochniki where id = $dolj");
 $db->close;
 while($result_podrazdel = $sql_podrazdel->fetch_assoc()): 

 ?>
 
     
    <option value="<?
	
	if ($result_spravochniki_id == 2) {
		$id_selecta = $stavka;
	}
	
	
	if ($result_spravochniki_id == 4) {
		$id_selecta = $aliments;
	}
	
	
	if ($result_spravochniki_id == 5) {
		$id_selecta = $profsouz;
	}
	
	if ($result_spravochniki_id == 6) {
		$id_selecta = $nadbavka;
	}
	
	if ($result_spravochniki_id == 8) {
		$id_selecta = $uslov_truda;
	}
	
	if ($result_spravochniki_id == 9) {
		$id_selecta = $premia;
	}
	
	if ($result_spravochniki_id == 10) {
		$id_selecta = $category;
	}
	
	if ($result_spravochniki_id == 11) {
		$id_selecta = $form_truda;
	}
	
	if ($result_spravochniki_id == 15) {
		$id_selecta = $group_s;
	}
	
	if ($result_spravochniki_id == 17) {
		$id_selecta = $podrazdelenie;
	}
	
	if ($result_spravochniki_id == 18) {
		$id_selecta = $dolj;
	}
	
	if ($result_spravochniki_id == 19) {
		$id_selecta = $razryad;
	}
	
	if ($result_spravochniki_id == 20) {
		$id_selecta = $profmasterstvo;
	}
		
	echo $id_selecta;
	
	?>" selected ><? 

	$sql_name_selecta = $db->query("SELECT * FROM spravochniki where id = $id_selecta");
 $db->close;
 while($result_name_selecta = $sql_name_selecta->fetch_assoc()): 
	$name_selecta = $result_name_selecta['nazv'];
	endwhile;
	
	echo $name_selecta;

	 ?></option>
	<? endwhile;

$sql_podrazdel_other = $db->query("SELECT * FROM spravochniki where id != $id_selecta AND category = $result_spravochniki_id ORDER BY id DESC");
 $db->close;
 while($result_podrazdel_other = $sql_podrazdel_other->fetch_assoc()): 
 $id_podrazdel_other = $result_podrazdel_other['id'];
	 $name_podrazdel_other = $result_podrazdel_other['nazv'];
	 $name_podrazdel_kofe = $result_podrazdel_other['koeff'];
	?>
	
	<option value="<? echo $id_podrazdel_other;?>"><? echo  $name_podrazdel_other;?> (Знач.<?=$name_podrazdel_kofe;?>) </option>
	<? endwhile;?>
	
   </select>
 
 
 
 
	
	<? endwhile;?>
	
	
	
	
	
	
	
	   
	
	
	
	
	
   
   
   <input name="name" title="Имя" value="<? echo $name; ?>" placeholder="Имя" required>
  <input name="famil" title="Фамилия" value="<? echo $famil; ?>" placeholder="Фамилия" required>
   <input name="otchestvo" title="Отчество" value="<? echo $otchestvo; ?>" placeholder="Отчество" required>
<div class = "div_date">
     <div style="">
	 <span>Дата рождения </span>
	<input type="date" style="    font-size: 20px;"   name="stav_born" placeholder="Выберите дату рождения" value="<? echo $stav_born ?>" required></br>
	</div>
</div>
      
   
   
   
   
   
   
   
      
   
   <?
   $sql_config_za_slojn_napr = $db->query("SELECT * FROM configs where id = $id");
 $db->close;
 while($result_config_za_slojn_napr = $sql_config_za_slojn_napr->fetch_assoc()):
  $id_conf_za_slojn = $result_config_za_slojn_napr['za_slojn_napr'];
  $id_deti = $result_config_za_slojn_napr['deti'];
  endwhile;
   
   if($id_deti == '0'){
	   $nazv_deti = 'Нет детей';
   }
    if($id_deti == '1'){
	   $nazv_deti = 'Один ребенок';
   }
   
   else{
	   $nazv_deti = $id_deti . ' ребенка(детей)';
   }
   
   
   ?>
   
   
   
     
   
   
   
   
   
   
   
    <input name="sovmewenie" type="number" title="Совмещение в %" value="<? echo $sovmewenie;?>" placeholder="Доплата за совмещение в %" required>
   <input name="nadbavka" type="number" title="Контрактная надбавка" value="<? echo $nadbavka;?>" placeholder="Контрактная надбавка" required>
   <input name="coeff_povish" type="number" title="Повышающий коэффициент" value="<? echo $coeff_povish;?>" placeholder="Повышающий коэффициент" required>

	
	<!-- TREBUSHET END -->
	
	
	
	
	
	
	
	
	
	
	


<input type="submit" name="update_dolj" value="Изменить" />

</form>
					
	 
  <?php  endwhile;   ?>
 
  <?php
   
  
 $id=$_GET['id'];
 
 if(isset($_POST['update_dolj']))
 {
 
   $dolj = strip_tags(trim($_POST['id_sprav_18']));
  $name = strip_tags(trim($_POST['name']));
  $famil = strip_tags(trim($_POST['famil']));
  $otchestvo = strip_tags(trim($_POST['otchestvo']));
  $stav_born = strip_tags(trim($_POST['stav_born']));
  $category = strip_tags(trim($_POST['id_sprav_10']));
  $form_truda = strip_tags(trim($_POST['id_sprav_11']));
  $stavka = strip_tags(trim($_POST['id_sprav_2']));
  $razryad = strip_tags(trim($_POST['id_sprav_19']));
  $premia = strip_tags(trim($_POST['id_sprav_9']));
  $profmasterstvo = strip_tags(trim($_POST['id_sprav_20']));
  $profsouz = strip_tags(trim($_POST['id_sprav_5']));
  $uslov_truda = strip_tags(trim($_POST['id_sprav_8']));
  $group_s = strip_tags(trim($_POST['id_sprav_15']));
  $sovmewenie = strip_tags(trim($_POST['sovmewenie']));
  $counts_akcii = strip_tags(trim($_POST['counts_akcii']));
  $chasy_vsego = strip_tags(trim($_POST['chasy_vsego']));
   $aliments = strip_tags(trim($_POST['aliments']));
   $coeff_povish = strip_tags(trim($_POST['coeff_povish']));
   $nadbavka = strip_tags(trim($_POST['kont_nadbav']));
    $za_slojn_napr = strip_tags(trim($_POST['za_slojn_napr']));
    $id_deti = strip_tags(trim($_POST['id_deti']));
      $nalich_detei = strip_tags(trim($_POST['nalich_detei']));
	    $id_podrazdel = strip_tags(trim($_POST['id_sprav_17']));
	   $id_nachalnike = strip_tags(trim($_POST['id_nach']));


  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_update_razryad = mysql_query("UPDATE `rabotniki` SET `id_nach`='$id_nachalnike',`podrazdelenie`='$id_podrazdel',`nadbavka`='$nadbavka',`coeff_povish`='$coeff_povish',
 `name`='$name',`famil`='$famil',
 `otchestvo`='$otchestvo',
 `dolj`='$dolj',`category`='$category',`uslov_truda`='$uslov_truda',
 `stavka`='$stavka',`forma_truda`='$form_truda',`premia`='$premia',`date_born`='$stav_born',
 `group_s`='$group_s',`profmasterstvo`='$profmasterstvo',`sovmewenie`='$sovmewenie',`razryad`='$razryad',
 `profsouz`='$profsouz' WHERE id_r = '$id'",$db);
   
    $result_update_config = mysql_query("UPDATE `configs` SET `za_slojn_napr`='$za_slojn_napr' WHERE id = '$id'",$db);
   
      
 echo "<script> location.href = '../main_tabel.php#manager_rabotnik'; </script>";
  }

  }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }
  
  
  
   ?>  
   </html>