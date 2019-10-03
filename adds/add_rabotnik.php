<?include('../session.php'); include('../links.php'); include('../db.php');  ?>

<? if (($level_users==2)){ ?>

<html class="add_update">
<a class="back" href="../main_tabel.php#manager_rabotnik">Назад </a>
<form method="POST" style="margin-top: 1vh;" class="form_up_add" style="overflow-y:scroll;" action="add_rabotnik.php">
 <select name="dolj" size="1" required >
        <option value="" disabled  selected>Выбрать должность</option>
	     <?  $sql = $db->query("SELECT * FROM dolj ORDER BY id_dolj DESC");
 $db->close;
 while($result = $sql->fetch_assoc()): ?>
		   
    <option value="<? echo $result['id_dolj']; ?>"><? echo $result['nazv']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
   <input name="name" placeholder="Имя" required></br>
  <input name="famil" placeholder="Фамилия" required></br>
   <input name="otchestvo" placeholder="Отчество" required></br> 
<div class = "div_date">
    
	 <span>Дата рождения</span>
	<input type="date"  name="stav_born" placeholder="Выберите дату рождения" value="Выберите дату рождения" required></br>
</div>
    <select name="category" size="1" required >
    <option value="" disabled  selected>Выбрать категорию</option>
	     <?  $sql_cat = $db->query("SELECT * FROM category ORDER BY id_category_rab DESC");
 $db->close;
 while($result_cat = $sql_cat->fetch_assoc()): ?>
		   
    <option value="<? echo $result_cat['id_category_rab']; ?>"><? echo $result_cat['nazv_cat_rab']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   

   
   
   
   
   
   
 <select name="form_truda" size="1" required >
    <option value="" disabled  selected>Выбрать форму труда</option>
	     <?  $sql_form_truda = $db->query("SELECT * FROM forma_truda ORDER BY id_form_truda DESC");
 $db->close;
 while($result_form_truda = $sql_form_truda->fetch_assoc()): ?>
		   
    <option value="<? echo $result_form_truda['id_form_truda']; ?>"><? echo $result_form_truda['nazv_form']; ?>  Коэффиц: <? echo $result_form_truda['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
    <select name="stavka" size="1" required >
    <option value="" disabled  selected>Выбрать ставку</option>
	     <?  $sql_stavka = $db->query("SELECT * FROM stavka ORDER BY id_stavka DESC");
 $db->close;
 while($result_stavka = $sql_stavka->fetch_assoc()): ?>
		   
    <option value="<? echo $result_stavka['id_stavka']; ?>"><? echo $result_stavka['nazv_stavk']; ?>  Коэффиц: <? echo $result_stavka['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
   <select name="razryad" size="1" required >
    <option value="" disabled  selected>Выбрать разряд</option>
	     <?  $sql_razryad = $db->query("SELECT * FROM razryad ORDER BY id_razryad DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   
    <option value="<? echo $result_razryad['id_razryad']; ?>"><? echo $result_razryad['nazv_razr']; ?>  Коэффиц: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
      <select name="premia" size="1" required >
    <option value="" disabled  selected>Выбрать премию</option>
	     <?  $sql_razryad = $db->query("SELECT * FROM premia ORDER BY id_premia DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   
    <option value="<? echo $result_razryad['id_premia']; ?>"><? echo $result_razryad['nazv']; ?>  Коэффиц: <? echo $result_razryad['number']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
     <select name="profmasterstvo" size="1" required >
    <option value="" disabled  selected>Выбрать профмастерство</option>
	     <?  $sql_razryad = $db->query("SELECT * FROM profmasterstvo ORDER BY id_profmaster DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   
    <option value="<? echo $result_razryad['id_profmaster']; ?>"><? echo $result_razryad['nazv']; ?>  Коэффиц: <? echo $result_razryad['koefficient']; ?></option>

	
	<? endwhile ?>
   </select></br>         

   
        <select name="profsouz" size="1" required >
    <option value="" disabled  selected>Выбрать профсоюз</option>
	     <?  $sql_razryad = $db->query("SELECT * FROM profsouz ORDER BY id_profsouz DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   
    <option value="<? echo $result_razryad['id_profsouz']; ?>"><? echo $result_razryad['vibor']; ?>  Коэффиц: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>    
   
   
         <select name="uslov_truda" size="1" required >
    <option value="" disabled  selected>Выбрать условие труда</option>
	     <?  $sql_razryad = $db->query("SELECT * FROM uslov_truda ORDER BY id_uslov_truda DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   
    <option value="<? echo $result_razryad['id_uslov_truda']; ?>"><? echo $result_razryad['nazv_usl']; ?>  Коэффиц: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>  
   
         <select name="group_s" size="1" required >
    <option value="" disabled  selected>Выбрать группу(для расчета)</option>
	     <?  $sql_razryad = $db->query("SELECT * FROM group_s ORDER BY id_group DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   
    <option value="<? echo $result_razryad['id_group']; ?>"><? echo $result_razryad['nazv_gr']; ?> </option>

	
	<? endwhile ?>
   </select></br>  
   
    <input name="sovmewenie" type="number" placeholder="Доплата за совмещение в %" required></br> 
   
   
		 
     <input name="submit_rab" type="submit" value="Добавить">
      </form>
	  </html>
	  <? 
	  if(isset($_POST['submit_rab'])){
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
$counts_akcii = strip_tags(trim($_POST['counts_akcii']));

 	 $date_auth = date('Y-m-d');
 
	
 $sql=$db->query("INSERT INTO `rabotniki`(`name`, `famil`, `otchestvo`, `id_nach`, 
 `podrazdelenie`, `chasy_vsego`, `dolj`, `date_auth`, `category`, `uslov_truda`, `stavka`, 
 `forma_truda`, `premia`, `date_born`, `group_s`, `profmasterstvo`, `sovmewenie`, `razryad`,
 `profsouz`) VALUES ('$name','$famil', '$otchestvo','$id_Ses','$podrazde','0',
 '$dolj','$date_auth', '$category','$uslov_truda','$stavka','$form_truda',
 '$premia','$stav_born', '$group_s','$profmasterstvo','$sovmewenie','$razryad','$profsouz')");

$sql=$db->query("UPDATE `users` SET `kol_vo_rab`= `kol_vo_rab`+1 WHERE id = '$id_Ses'");		 
		 
		 
 $db->close;
echo "<script>location.href='../main_tabel.php#manager_rabotnik'; </script>";    
		  
			 
	  }
	  
	    
	    }
	  else{
	 echo "<script> location.href='error.php'; </script>";
	 
 }

	  
	  
	  
	  ?>
	  
	  
	  