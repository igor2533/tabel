<? include('session.php'); include('links.php'); include('db.php'); ?>

<? if (($level_users==1 OR $level_users==2 OR $level_users==3)){ ?>

<div class="one">
<span style="font-size: 30px;">Данные пользователя </span>
<? 

 $id_podr_get = $_GET['id_podr'];
	$sql = $db->query("SELECT * FROM users where id= $id_Ses");
 $db->close;
 while($result = $sql->fetch_assoc()): ?>
<span style="font-size: 35px;
    color: #8fbb1a;"><? echo $result['login']; ?></span></br>
<span>Дожность: </span><span style="color:green"><?
$dolj_id =$result['dolj'];
	$sql = $db->query("SELECT * FROM spravochniki where id = $dolj_id");
 $db->close;
 while($resulte = $sql->fetch_assoc()): 

 echo $resulte['nazv']; 
 endwhile
 ?></span></br>
<span>ФИО:</span><span style="color:green"><? echo $result['fio']; ?></span></br>
<span>Кол-во работников</span><span style="color:green"> <?

$sql=$db->query("SELECT * FROM `rabotniki` WHERE id_nach = $id_Ses");
$num_rows = mysqli_num_rows($sql);
$db->close;
   echo $num_rows;

 



 ?></span></br>
<span>В системе с </span><span style="color:green"> <? echo $result['date_register']; ?></span></br>
<span>Уровень доступа: </span><span style="color:green"> <?
$sql = $db->query("SELECT * FROM levels where level= $level_users");
 $db->close;
 while($resulte_level = $sql->fetch_assoc()): 

 echo $resulte_level['nazv'];
endwhile
 ?></span></br>
<span>Последний вход в систему: </span> Дата: <span style="color:green"><? echo $result['date_auth']; ?></span>
 Время: <span style="color:green"><? echo $result['time_last_auth']; ?></span></br>
<span>IP-адрес последнего входа в систему: </span><span style="color:green"> <? echo $result['ip_adres_last']; ?></span></br>
<? endwhile ?>

</div>
	  
	
	
	
	<?
	
	}

 else{
	 echo "<script> location.href='error_user.php'; </script>";
	 
 }
	
	?>  
	  