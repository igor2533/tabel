<?include('../session.php'); include('../links.php'); include('../db.php');  ?>

<? if (($level_users==1 or $level_users==3)){ ?>

<html class="add_update">
<a class="back" href="../main_tabel.php#manager_rabotnik">Назад </a>
<form method="POST" style="margin-top: 1vh;" class="form_up_add" style="overflow-y:scroll;" action="add_rabotnik_admin.php">
  
   
   <select name="id_nach" size="1" title="Пользователь" required >
        <option value="" disabled  selected>Выбрать пользователя</option>
	     <?  $sql = $db->query("SELECT * FROM users ORDER BY id DESC");
 $db->close;
 while($result = $sql->fetch_assoc()): ?>
		   
    <option value="<? echo $result['id']; ?>"><? echo $result['login']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
      
   
    <?  $sql_spravochniki = $db->query("SELECT * FROM category_spravochnik where setting_sel = 1");
 $db->close;
 while($result_spravochniki = $sql_spravochniki->fetch_assoc()): 

 
 $result_spravochniki_id = $result_spravochniki['id'];
 $result_spravochniki_nazv = $result_spravochniki['nazv'];
 ?>
 
 
 
 
   <select name="id_sprav_<?= $result_spravochniki_id;?>" size="1" title="<?= $result_spravochniki_nazv; ?>" required >
      	    
     
    <option value="" selected ><?= $result_spravochniki_nazv; ?></option>
	<? 
$sql_podrazdel_other = $db->query("SELECT * FROM spravochniki where category = $result_spravochniki_id ORDER BY id DESC");
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
   
   
   
   
   
   
   
   
   
  
   
   <input name="name" placeholder="Имя" required>
  <input name="famil" placeholder="Фамилия" required>
   <input name="otchestvo" placeholder="Отчество" required>
<div class = "div_date">
     <div style="">
	 <span>Дата рождения </span>
	<input type="date" style="    font-size: 20px;"   name="stav_born" placeholder="Выберите дату рождения" value="<? echo $stav_born ?>" required></br>
	</div>
</div>
   
   
    
   
   
   
   
   
    <input name="sovmewenie" type="number" placeholder="Доплата за совмещение в %" required> 
   
     <input name="kont_nadbav" type="number" placeholder="Контрактная надбавка %" required> 
   
    <input name="coeff_povish" type="number" placeholder="Коэффициент повышения %" required> 
		 
		 
		 
		 
		 
     <input name="submit_rab" type="submit" value="Добавить">
      </form>
	  </html>
	  <? 
	  if(isset($_POST['submit_rab'])){
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
$id_nach = strip_tags(trim($_POST['id_nach']));
$aliments = strip_tags(trim($_POST['aliments']));
 	 $date_auth = date('Y-m-d');
 $kont_nadbav = strip_tags(trim($_POST['kont_nadbav']));	
	$coeff_povish = strip_tags(trim($_POST['coeff_povish']));
	$za_slojn_napr = strip_tags(trim($_POST['za_slojn_napr']));
	
	$id_deti = strip_tags(trim($_POST['id_deti']));
	$nalich_detei = strip_tags(trim($_POST['nalich_detei']));
	$id_podrazdel = strip_tags(trim($_POST['id_sprav_17']));

	$sql_podrazdelenie_nujnoe = $db->query("SELECT * FROM users where id = $id_nach");
 $db->close;
 while($result_podrazdelenie_nujnoe = $sql_podrazdelenie_nujnoe->fetch_assoc()):
	$id_nujn_podrazd = $result_podrazdelenie_nujnoe['podrazd'];
	endwhile;
	
	
 $sql=$db->query("INSERT INTO `rabotniki`(`coeff_povish`,`nadbavka`,`name`, `famil`, `otchestvo`, `id_nach`, 
 `podrazdelenie`, `dolj`, `date_auth`, `category`, `uslov_truda`, `stavka`, 
 `forma_truda`, `premia`, `date_born`, `group_s`, `profmasterstvo`, `sovmewenie`, `razryad`,
 `profsouz`) VALUES ('$coeff_povish','$kont_nadbav','$name','$famil', '$otchestvo','$id_nach','$id_podrazdel',
 '$dolj','$date_auth', '$category','$uslov_truda','$stavka','$form_truda',
 '$premia','$stav_born', '$group_s','$profmasterstvo','$sovmewenie','$razryad','$profsouz')");

 
 
 $sql=$db->query("INSERT INTO `configs` (`za_slojn_napr`,`deti`) VALUES ('$za_slojn_napr','0')");
 
 
$sql=$db->query("UPDATE `users` SET `kol_vo_rab`= `kol_vo_rab`+1 WHERE id = '$id_nach'");		 
		 
		 
 $db->close;
echo "<script>location.href='../main_tabel.php#manager_rabotnik'; </script>";    
		  
			 
	  }
	  
	    
	    }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }

	  
	  
	  
	  ?>
	  
	  
	  