<? include('session.php'); include('links.php'); include('db.php'); ?>

<? if (($level_users==1)){ ?>


<a class="back" onclick="history.back();" href="">Назад </a>
<form method="POST" style="margin-top:1vh;    padding-top: 20px;
    padding-bottom: 20px;
    color: black;background:white;" class="form_up_add" action="">
  

   
   <?php   
  $id=$_GET['id'];
   $sql = $db->query("SELECT * FROM users WHERE `id` = '$id'");
  $db->close; 
while($result = $sql->fetch_assoc()):

  $login = $result['login'];
  $level_id = $result['level_id'];
      $date_register = $result['date_register'];
      $date_auth = $result['date_auth'];
	   $time_auth = $result['time_last_auth'];
      $fio = $result['fio'];
    $dolj = $result['dolj'];
  $kol_vo_rab = $result['kol_vo_rab'];
$podrazd = $result['podrazd'];
$ip_adres_last = $result['ip_adres_last'];
	
?>

	<span>Логин: </span> <span><? echo $login;?></span>  </br>
    <span>Уровень доступа: </span> <span style="color:green"><? 
	
	$sql_level = $db->query("SELECT * FROM levels WHERE `level` = $level_id");
  $db->close; 
while($result_level = $sql_level->fetch_assoc()):
	$level_name = $result_level['nazv'];
	endwhile;
			echo $level_name;?></span>  </br>
	<span>Дата регистрации: </span> <span style="color:green"><? echo $date_register;?></span>  </br>
	<span>Последний вход в систему: </span> Дата: <span style="color:green"><? echo $date_auth; ?></span>
 Время: <span style="color:green"><? echo $time_auth; ?></span></br> 
	<span>IP - adres последнего входа в систему: </span> <span style="color:green"><? echo $ip_adres_last;?></span>  </br>
	<span>ФИО: </span> <span style="color:green"><? echo $fio;?></span>  </br>
	<span>Должность: </span> <span style="color:green"><?

$sql_doljnosti = $db->query("SELECT * FROM dolj WHERE `id_dolj` = $dolj");
  $db->close; 
while($result_doljnosti = $sql_doljnosti->fetch_assoc()):
$name_doljnosti = $result_doljnosti['nazv'];
endwhile;

	echo $name_doljnosti;?></span>  </br>
	<span>Подразделение: </span> <span style="color:green"><?
 $sql_podrazdel = $db->query("SELECT * FROM podrazdel WHERE `id_podr` = $podrazd");
  $db->close; 
while($result_podrazdel = $sql_podrazdel->fetch_assoc()):
$name_podrazdela = $result_podrazdel['name_podr'];

endwhile;
	echo $name_podrazdela;?></span>  </br>
	<span>Кол-во работников: </span> <span style="color:green"><? echo $kol_vo_rab;?></span>  </br>
	 
  <?php  endwhile;   ?>
   
   
   
   
   
    
	 
 
	 
	 
      </form>
	
	
	  
	  
	<?
	
	}

 else{
	 echo "<script> location.href='error_user.php'; </script>";
	 
 }
	
	?>  
	  