<? include('../session.php');

include('../db.php');
$id=$_GET['id'];
$sql = $db->query("SELECT * FROM rabotniki WHERE `id_r` = $id");
  $db->close; 
while($result = $sql->fetch_assoc()):
 $id_nacha = $result['id_nach'];
endwhile;

 if (($id_Ses==$id_nacha)){ 

include('../links.php');  
  ?>
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

	
?>
<a class="back" href="../main_tabel.php#manager_rabotnik">Назад </a>
	<form method="post" style="margin-top: 1vh;" class="form_up_add" action="update_rabotnik_tabel.php?id=<?php echo $id;?>">


	<!-- TREBUSHET -->
	
	<select name="dolj" size="1" required  title="Должность">
        <option value="<? echo $dolj; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM dolj where id_dolj = $dolj ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv']; ?>
			<?endwhile?>
	     <?  $sql = $db->query("SELECT * FROM dolj where id_dolj!= $dolj ORDER BY id_dolj DESC");
 $db->close;
 while($result = $sql->fetch_assoc()): ?>
		   
			
			</option>
    <option value="<? echo $result['id_dolj']; ?>"><? echo $result['nazv']; ?></option>

	
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
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM category where id_category_rab = $category ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv_cat_rab']; ?>
			<?endwhile?>
	     <?  $sql_cat = $db->query("SELECT * FROM category where id_category_rab!= $category ORDER BY id_category_rab DESC");
 $db->close;
 while($result_cat = $sql_cat->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_cat['id_category_rab']; ?>"><? echo $result_cat['nazv_cat_rab']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
 <select name="form_truda" title="Форма труда" size="1" required >
	
	<option value="<? echo $form_truda; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM forma_truda where id_form_truda = $form_truda ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv_form'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
			
			</option>	
			<? endwhile ?>
	
	
	     <?  $sql_form_truda = $db->query("SELECT * FROM forma_truda where id_form_truda!= $form_truda ORDER BY id_form_truda DESC");
 $db->close;
 while($result_form_truda = $sql_form_truda->fetch_assoc()): ?>

	   
    <option value="<? echo $result_form_truda['id_form_truda']; ?>"><? echo $result_form_truda['nazv_form']; ?>  Коэффиц: <? echo $result_form_truda['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
    <select name="stavka" title="Ставка" size="1" required >
	
	
<option value="<? echo $stavka; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM stavka where id_stavka = $stavka ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv_stavk'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
			
			</option>	
			<? endwhile ?>
	
	
	     <?  $sql_stavka = $db->query("SELECT * FROM stavka where id_stavka != $stavka ORDER BY id_stavka DESC");
 $db->close;
 while($result_stavka = $sql_stavka->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_stavka['id_stavka']; ?>"><? echo $result_stavka['nazv_stavk']; ?>  Коэфф: <? echo $result_stavka['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
   
   <select name="razryad" title="Разряд" size="1" required >

   <option value="<? echo $razryad; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM razryad where id_razryad = $razryad ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv_razr'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
				
			<? endwhile ?>
   
   
	     <?  $sql_razryad = $db->query("SELECT * FROM razryad where id_razryad != $razryad ORDER BY id_razryad DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		</option>   
    <option value="<? echo $result_razryad['id_razryad']; ?>"><? echo $result_razryad['nazv_razr']; ?>  Коэфф: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
      <select name="premia" title="Премия" size="1" required >
   
   
    <option value="<? echo $premia; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM premia where id_premia = $premia ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
echo ' Коэфф:'; echo $result_option_select_dolj['number'];
			?>
			
				
			<? endwhile ?>
   
   
   
	     <?  $sql_razryad = $db->query("SELECT * FROM premia where id_premia !=  $premia ORDER BY id_premia DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id_premia']; ?>"><? echo $result_razryad['nazv']; ?>  Коэфф: <? echo $result_razryad['number']; ?></option>

	
	<? endwhile ?>
   </select></br>
   
     <select name="profmasterstvo" title="Профмастерство" size="1" required >
   
    <option value="<? echo $profmasterstvo; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM profmasterstvo where id_profmaster = $profmasterstvo ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv'];
echo ' Коэфф:'; echo $result_option_select_dolj['koefficient'];
			?>
			
				
			<? endwhile ?>
   
   
	     <?  $sql_razryad = $db->query("SELECT * FROM profmasterstvo where id_profmaster != $profmasterstvo ORDER BY id_profmaster DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id_profmaster']; ?>"><? echo $result_razryad['nazv']; ?>  Коэфф: <? echo $result_razryad['koefficient']; ?></option>

	
	<? endwhile ?>
   </select></br>         

   
        <select name="profsouz" title="Профсоюзы" size="1" required >
  
   <option value="<? echo $profmasterstvo; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM profsouz where id_profsouz = $profsouz ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['vibor'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
				
			<? endwhile ?>
  
  
	     <?  $sql_razryad = $db->query("SELECT * FROM profsouz where id_profsouz != $profsouz ORDER BY id_profsouz DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id_profsouz']; ?>"><? echo $result_razryad['vibor']; ?>  Коэфф: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>    
   
   
         <select name="uslov_truda" title="Условия труда" size="1" required >
    
	<option value="<? echo $uslov_truda; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM uslov_truda where id_uslov_truda = $uslov_truda ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv_usl'];
echo ' Коэфф:'; echo $result_option_select_dolj['koeff'];
			?>
			
				
			<? endwhile ?>
	
	
	     <?  $sql_razryad = $db->query("SELECT * FROM uslov_truda where id_uslov_truda != $uslov_truda ORDER BY id_uslov_truda DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id_uslov_truda']; ?>"><? echo $result_razryad['nazv_usl']; ?>  Коэфф: <? echo $result_razryad['koeff']; ?></option>

	
	<? endwhile ?>
   </select></br>  
   
         <select name="group_s" title="Группы" size="1" required >

		 	<option value="<? echo $group_s; ?>" selected>
			 <?  $sql_option_select_dolj = $db->query("SELECT * FROM group_s where id_group = $group_s ");
 $db->close;
 while($result_option_select_dolj = $sql_option_select_dolj->fetch_assoc()): ?>
			<? echo $result_option_select_dolj['nazv_gr'];
			?>
			
				
			<? endwhile ?>
	
		 
		 
	     <?  $sql_razryad = $db->query("SELECT * FROM group_s where id_group != $group_s ORDER BY id_group DESC");
 $db->close;
 while($result_razryad = $sql_razryad->fetch_assoc()): ?>
		   </option>
    <option value="<? echo $result_razryad['id_group']; ?>"><? echo $result_razryad['nazv_gr']; ?> </option>

	
	<? endwhile ?>
   </select></br>  
   
    <input name="sovmewenie" type="number" title="Совмещение в %" value="<? echo $sovmewenie;?>" placeholder="Доплата за совмещение в %" required></br> 
   <input name="chasy_vsego" type="number" title="Всего часов" value="<? echo $chasy_vsego;?>" placeholder="Часы всего" required></br>
	
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
 
 
  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_update_razryad = mysql_query("UPDATE `rabotniki` SET `name`='$name',`famil`='$famil',
 `otchestvo`='$otchestvo',`chasy_vsego`='$chasy_vsego',
 `dolj`='$dolj',`category`='$category',`uslov_truda`='$uslov_truda',
 `stavka`='$stavka',`forma_truda`='$form_truda',`premia`='$premia',`date_born`='$stav_born',
 `group_s`='$group_s',`profmasterstvo`='$profmasterstvo',`sovmewenie`='$sovmewenie',`razryad`='$razryad',
 `profsouz`='$profsouz'  WHERE id_r = '$id'",$db);
   
 echo "<script> location.href = '../main_tabel.php#manager_rabotnik'; </script>";
  }
 
 }
 
 else {echo "<script> location.href='error_rab.php'; </script>";}
   ?>  
   </html>