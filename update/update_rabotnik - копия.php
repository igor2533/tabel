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
	
	
	
	
	 <?  $sql_spravochniki = $db->query("SELECT * FROM category_spravochnik where id = 2 OR
	 id = 4 OR id = 5 or id = 6 or id = 8 or id = 9 or id = 10 or id = 11 or id = 15 or id = 17
	 or id = 18 or id = 19 or id = 20");
 $db->close;
 while($result_spravochniki = $sql_spravochniki->fetch_assoc()): 

 ?>
 
 
 
 
 
	
	<? endwhile;?>
	
	
	
	
	
	
	
	     <select name="id_podrazdel" size="1" title="Подразделение" required >
      	     <?  $sql_podrazdel = $db->query("SELECT * FROM spravochniki where id = $podrazdelenie");
 $db->close;
 while($result_podrazdel = $sql_podrazdel->fetch_assoc()): 

 ?>
		   
    <option value="<? echo $podrazdelenie; ?>" selected ><? echo $result_podrazdel['nazv']; ?></option>
	<? endwhile;

$sql_podrazdel_other = $db->query("SELECT * FROM spravochniki where id != $podrazdelenie AND category = 17 ORDER BY id DESC");
 $db->close;
 while($result_podrazdel_other = $sql_podrazdel_other->fetch_assoc()): 
 $id_podrazdel_other = $result_podrazdel_other['id'];
	 $name_podrazdel_other = $result_podrazdel_other['nazv'];
	?>
	
	<option value="<? echo $id_podrazdel_other;?>"><? echo  $name_podrazdel_other;?> </option>
	<? endwhile;?>
	
   </select></br>
	
	
	
	
	
	
	<select name="dolj" size="1" required  title="Должность">
        <option value="<? echo $dolj; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $dolj ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv']; ?>
			<?endwhile?>
	     <?  $sql = $db->query("SELECT * FROM spravochniki where id!= $dolj AND category = 18 ORDER BY id DESC");
 $db->close;
 while($result = $sql->fetch_assoc()): ?>
		   
			
			</option>
    <option value="<? echo $result['id']; ?>"><? echo $result['nazv']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
   <input name="name" title="Имя" value="<? echo $name; ?>" placeholder="Имя" required></br>
  <input name="famil" title="Фамилия" value="<? echo $famil; ?>" placeholder="Фамилия" required></br>
   <input name="otchestvo" title="Отчество" value="<? echo $otchestvo; ?>" placeholder="Отчество" required></br> 
<div class = "div_date">
    
	 <span>Дата рождения </span>
	<input type="date"   name="stav_born" placeholder="Выберите дату рождения" value="<? echo $stav_born ?>" required></br>
</div>
    <select name="category" title="Категория" size="1" required >
    <option value="<? echo $category; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $category ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv']; ?>
			<?endwhile?>
	     <?  $sql_cat = $db->query("SELECT * FROM spravochniki where id!= $category AND category = 10 ORDER BY id DESC");
 $db->close;
 while($result_cat = $sql_cat->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_cat['id']; ?>"><? echo $result_cat['nazv']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
 <select name="form_truda" title="Форма труда" size="1" required >
	
	<option value="<? echo $form_truda; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $form_truda ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
			
			</option>	
			<? endwhile ?>
	
	
	     <?  $sql_form_truda = $db->query("SELECT * FROM spravochniki where id!= $form_truda AND category = 11 ORDER BY id DESC");
 $db->close;
 while($result_form_truda = $sql_form_truda->fetch_assoc()): ?>

	   
    <option value="<? echo $result_form_truda['id']; ?>"><? echo $result_form_truda['nazv']; ?>  Коэффиц: <? echo $result_form_truda['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
   
   
   
  
   
   
   
   
   
   
    <select name="stavka" title="Ставка" size="1" required >
	
	
<option value="<? echo $stavka; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $stavka ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
			
			</option>	
			<? endwhile ?>
	
	
	     <?  $sql_stavka = $db->query("SELECT * FROM spravochniki where id != $stavka AND category = 2 ORDER BY id DESC");
 $db->close;
 while($result_stavka = $sql_stavka->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_stavka['id']; ?>"><? echo $result_stavka['nazv']; ?>  Коэфф: <? echo $result_stavka['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
   <select name="razryad" title="Разряд" size="1" required >

   <option value="<? echo $razryad; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $razryad ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
				
			<? endwhile ?>
   
   
	     <?  $sql_razryad = $db->query("SELECT * FROM spravochniki where id != $razryad AND category = 19 ORDER BY id DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		</option>   
    <option value="<? echo $result_razryad['id']; ?>"><? echo $result_razryad['nazv']; ?>  Коэфф: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
      <select name="premia" title="Премия" size="1" required >
   
   
    <option value="<? echo $premia; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $premia ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
				
			<? endwhile ?>
   
   
   
	     <?  $sql_razryad = $db->query("SELECT * FROM spravochniki where id !=  $premia AND category = 9 ORDER BY id DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id']; ?>"><? echo $result_razryad['nazv']; ?>  Коэфф: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
     <select name="profmasterstvo" title="Профмастерство" size="1" required >
   
    <option value="<? echo $profmasterstvo; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $profmasterstvo ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
				
			<? endwhile ?>
   
   
	     <?  $sql_razryad = $db->query("SELECT * FROM spravochniki where id != $profmasterstvo AND category = 20 ORDER BY id DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id']; ?>"><? echo $result_razryad['nazv']; ?>  Коэфф: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>         

   
        <select name="profsouz" title="Профсоюзы" size="1" required >
  
   <option value="<? echo $profsouz; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $profsouz ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
				
			<? endwhile ?>
  
  
	     <?  $sql_razryad = $db->query("SELECT * FROM spravochniki where id != $profsouz AND category = 5 ORDER BY id DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id']; ?>"><? echo $result_razryad['nazv']; ?>  Коэфф: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>    
   
   
         <select name="uslov_truda" title="Условия труда" size="1" required >
    
	<option value="<? echo $uslov_truda; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $uslov_truda ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
				
			<? endwhile ?>
	
	
	     <?  $sql_razryad = $db->query("SELECT * FROM spravochniki where id != $uslov_truda AND category = 8 ORDER BY id DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id']; ?>"><? echo $result_razryad['nazv']; ?>  Коэфф: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>  
   
         <select name="group_s" title="Группы" size="1" required >

		 	<option value="<? echo $group_s; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM spravochniki where id = $group_s ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
			?>
			
				
			<? endwhile ?>
	
		 
		 
	     <?  $sql_razryad = $db->query("SELECT * FROM spravochniki where id != $group_s AND category = 15 ORDER BY id DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id']; ?>"><? echo $result_razryad['nazv']; ?> </option>

	
	<? endwhile ?>
   </select></br>  
   
   
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
   
   
   
      <select name="za_slojn_napr" title="Доплаты за сложность и напряженность" size="1" required >

		 	<option value="<? echo $id_conf_za_slojn; ?>" selected>
			 <?  $sql_option_select_conf_za_slojn = $db->query("SELECT * FROM spravochniki where id = $id_conf_za_slojn ");
 $db->close;
 while($result_option_select_conf_za_slojn = $sql_option_select_conf_za_slojn->fetch_assoc()): ?>
			<? echo $result_option_select_conf_za_slojn['nazv'];echo ' Коэфф: '; echo $result_option_select_conf_za_slojn['koeff']; 
			?>
			
				
			<? endwhile ?>
	
		 
		 
	     <?  $sql_za_slojn_napr = $db->query("SELECT * FROM spravochniki where id != $id_conf_za_slojn AND category = 6 ORDER BY id DESC");
 $db->close;
 while($result_za_slojn_napr = $sql_za_slojn_napr->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_za_slojn_napr['id']; ?>"><? echo $result_za_slojn_napr['nazv'];echo ' Коэфф: '; echo $result_za_slojn_napr['koeff']; 
			?></option>

	
	<? endwhile ?>
   </select></br>  
   
   
   
   
   
   
   
   
   
   
   
    <input name="sovmewenie" type="number" title="Совмещение в %" value="<? echo $sovmewenie;?>" placeholder="Доплата за совмещение в %" required></br> 
   <input name="nadbavka" type="number" title="Контрактная надбавка" value="<? echo $nadbavka;?>" placeholder="Контрактная надбавка" required></br>
   <input name="coeff_povish" type="number" title="Повышающий коэффициент" value="<? echo $coeff_povish;?>" placeholder="Повышающий коэффициент" required></br>

	
	<!-- TREBUSHET END -->
	
	
	
	
	
	
	
	
	
	
	


<input type="submit" name="update_dolj" value="Изменить" />

</form>
					
	 
  <?php  endwhile;   ?>
 
  <?php
   
  
 $id=$_GET['id'];
 
 if(isset($_POST['update_dolj']))
 {
 
   $dolj = strip_tags(trim($_POST['dolj']));
  $name = strip_tags(trim($_POST['name']));
  $famil = strip_tags(trim($_POST['famil']));
  $otchestvo = strip_tags(trim($_POST['otchestvo']));
  $stav_born = strip_tags(trim($_POST['stav_born']));
  $category = strip_tags(trim($_POST['category']));
  $form_truda = strip_tags(trim($_POST['form_truda']));
  $stavka = strip_tags(trim($_POST['stavka']));
  $razryad = strip_tags(trim($_POST['razryad']));
  $premia = strip_tags(trim($_POST['premia']));
  $profmasterstvo = strip_tags(trim($_POST['profmasterstvo']));
  $profsouz = strip_tags(trim($_POST['profsouz']));
  $uslov_truda = strip_tags(trim($_POST['uslov_truda']));
  $group_s = strip_tags(trim($_POST['group_s']));
  $sovmewenie = strip_tags(trim($_POST['sovmewenie']));
  $counts_akcii = strip_tags(trim($_POST['counts_akcii']));
  $chasy_vsego = strip_tags(trim($_POST['chasy_vsego']));
   $aliments = strip_tags(trim($_POST['aliments']));
   $coeff_povish = strip_tags(trim($_POST['coeff_povish']));
   $nadbavka = strip_tags(trim($_POST['nadbavka']));
    $za_slojn_napr = strip_tags(trim($_POST['za_slojn_napr']));
    $id_deti = strip_tags(trim($_POST['id_deti']));
      $nalich_detei = strip_tags(trim($_POST['nalich_detei']));
	    $id_podrazdel = strip_tags(trim($_POST['id_podrazdel']));
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