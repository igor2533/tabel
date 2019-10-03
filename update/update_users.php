<? include('../session.php');include('../links.php');  
  include_once('../db.php');  ?>

  <?


 if (($level_users==1)){ ?>
  
  
  
  
  <html class="add_update" >
<?php   

  $id=$_GET['id'];
  
 $sql = $db->query("SELECT * FROM users WHERE `id` = '$id'");
  $db->close; 
while($result = $sql->fetch_assoc()):
    $login = $result['login'];
  $level_id = $result['level_id'];
      $date_register = $result['date_register'];
      $date_auth = $result['date_auth'];
      $fio = $result['fio'];
    $dolj = $result['dolj'];
  $podrazd = $result['podrazd'];
 $pass = $result['pass'];
	
?>
<a class="back" href="../main_tabel.php#manager_users">Назад </a>
	<form method="post" style="margin-top: 1vh;" class="form_up_add" action="update_users.php?id=<?php echo $id;?>">


	<!-- TREBUSHET -->
	
	
   
   
   <input name="fio" title="ФИО" value="<? echo $fio; ?>" placeholder="ФИО" required></br>
  <input name="login" title="Логин" value="<? echo $login; ?>" placeholder="Логин" required></br>
    
   

    <option value="<? echo $result_cat['id']; ?>"><? echo $result_cat['nazv']; ?></option>

	
	<? endwhile ?>
   </select></br>
  
  
  
  
  
  
  
  
  
</br>
   
       
	
	<!-- TREBUSHET END -->
	
	<?
	
		
	
	
	
	
	?>
	
	
	
	
	
	
	
	
	


<input type="submit" name="update_dolj" value="Изменить" />

</form>





					
	 
  <?php   ?>
  
  
  <form method="post" class="form_up_add" style="margin-top:1vh;" action="update_users.php?id=<?echo $id;?>">

<input type="password" name="password_new" placeholder="Новый пароль" required />
<input type="submit" name="reset_pass" value="Сбросить пароль"/>

</form>

<? 
if(isset($_POST['reset_pass'])){
	 $new_pass = strip_tags(trim($_POST['password_new']));
	$id = $_GET['id'];
	
	 include('../secret.php');
	   $password_zawita = md5($new_pass.$secret);
	
	
	 include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_reset_password = mysql_query("UPDATE `users` SET `pass`='$password_zawita' WHERE id = '$id'",$db);
	echo "<script> alert('Пароль изменен !!!');</script>";
	
}

?>
  
  
 
  <?php
   
  
 $id=$_GET['id'];
 
 if(isset($_POST['update_dolj']))
 {
 
include('../secret.php');
 
 
   $dolj = strip_tags(trim($_POST['dolj']));
  $fio = strip_tags(trim($_POST['fio']));
  $login = strip_tags(trim($_POST['login']));
  $level_id = strip_tags(trim($_POST['level_id']));
    $podrazd = strip_tags(trim($_POST['podrazd']));
   // $pass = strip_tags(trim($_POST['pass']));
 
   
	  
 
 
  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_update_razryad = mysql_query("UPDATE `users` SET `dolj`='$dolj',`podrazd` = '$podrazd',`fio`='$fio',
 `login`='$login',`level_id`='$level_id' WHERE id = '$id'",$db);
   
 echo "<script> location.href = '../main_tabel.php#manager_users'; </script>";
  }
 }
 else
	 
	 {
		echo "<script> location.href='error_user.php'; </script>";
		 
	 }
 
 
 
 
   ?>  
   </html>