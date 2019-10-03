
<?php include('session.php');?>

<style>
TABLE {
    width: 300px; /* Ширина таблицы */
    border-collapse: collapse; /* Убираем двойные линии между ячейками */
   }
   TD, TH {
    padding: 3px; /* Поля вокруг содержимого таблицы */
    border: 1px solid black; /* Параметры рамки */
   }
   TH {
    background: #b0e0e6; /* Цвет фона */
   }

</style>

<?php 




$sdd_db_host='localhost'; // ваш хост
$sdd_db_name='host1024_tabele'; // ваша бд
$sdd_db_user='host1024_tabele'; // пользователь бд
$sdd_db_pass='hh4*77hjHHHu78'; // пароль к бд
@mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass); // коннект с сервером бд
@mysql_select_db($sdd_db_name);



//die($_SESSION['login']);






//$name_table = 'Лайт_готовность_заказов_ЛАЙТ_АПРЕЛЬ_1_НЕДЕЛЯ';
?>

<a href="logout.php">Выход</a>
<form method="post" style="margin-top: 49px;text-align:center;" action="main_tabel.php">
<select style="font-size: 26px;" name="tableya">
<option value="<?php echo $_POST['tableya'];; ?>" selected><?php echo $_POST['tableya'];; ?> </option>
<?php
$result_tables=mysql_query('SHOW TABLES');
while($row=mysql_fetch_array($result_tables)){
?>

<option value="<?php
echo $row['Tables_in_host1024_tabele'];

 ?>">
<?php
echo $row['Tables_in_host1024_tabele'];

 ?>
 </option>
<?php

}
?>
 </select>
 <input type="submit" style="font-size: 27px;
    background: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px 3px 3px 3px;" name="knopochka" value="Выбрать"/>
 </form>

 <?php
  if(isset($_POST['knopochka'])){
	 $name_table = $_POST['tableya'];
	  
  }
 
 ?>

























<?php

$diler_kratko = $_SESSION['login'];


if($name_table == null) {
	$name_table = 'ИЮНЬ_2_НЕДЕЛЯ';
}
else {
	
	
}
$result=mysql_query("SELECT * FROM ".$name_table ." WHERE `Клиент` LIKE '%$diler_kratko%'"); // запрос на выборку
?>


<table style="margin-left: 50px;">
    <tr>
        <td>№Заказа</td>
        <td>Клиент</td>
        <td>Каркас_верх</td>
        <td>Каркас_низ</td>
        <td>Фасады_верх</td>
        <td>Фасады_низ</td>
        <td>Столешница</td>
        <td>Стеновая</td>
        <td>Фурнитура</td>
        <td>ПОЛНАЯ ГОТОВНОСТЬ</td>
        <td>План._дата_отгрузки <span style="color: red;">(Год-месяц-число)</span></td>
        <td>Реальная_дата_отгрузки <span style="color: red;">(Год-месяц-число)</span></td>
        <td>Дополнительная инф-я</td>
    </tr>

<?php
while($row=mysql_fetch_array($result))
{?>



<?php


echo '<tr>';

echo '<td>'.$row['№Заказа'].'</td>';
echo '<td>'.$row['Клиент'].'</td>';
echo '<td>'.$row['Каркас_верх'].'</td>';
echo '<td>'.$row['Каркас_низ'].'</td>';
echo '<td>'.$row['Фасады_верх'].'</td>';
echo '<td>'.$row['Фасады_низ'].'</td>';
echo '<td>'.$row['Столешница'].'</td>';
echo '<td>'.$row['Стеновая'].'</td>';
echo '<td>'.$row['Фурнитура'].'</td>';
echo '<td>'.$row['ПОЛНАЯ_ГОТОВНОСТЬ'].'</td>';
echo '<td>'.$row['План._дата_отгрузки'].'</td>';
echo '<td>'.$row['Реальная_дата_отгрузки'].'</td>';
echo '<td>'.$row['Дополнительная_информация'].'</td>';
echo '</tr>';

	
	

}



?>
</table>



<div style="text-align: center;">
<span style="text-align:center;color:red; font-size:34;">Статистика по заказам</span></div>

<div style=" border:solid 2px red; padding:5px;margin-top:30px;width:100%;height:400px;overflow-y:scroll;"">

<?php
$result_tables_shows=mysql_query('SHOW TABLES');
while($row=mysql_fetch_array($result_tables_shows)){

$tabla_chet = $row['Tables_in_host1024_tabele'];
$result_tables_counts=mysql_query("SELECT COUNT(*) FROM ".$tabla_chet." WHERE `Клиент` LIKE '%$diler_kratko%'");
while($row=mysql_fetch_array($result_tables_counts)){
$counts_tables = $row['COUNT(*)'];
}

echo $tabla_chet.'  <span style="color:red;">' .$counts_tables.'</span>  заказов</br>';
}
?>

</div>





<?php

$result_tables_count_dilers=mysql_query('SHOW TABLES');
while($row=mysql_fetch_array($result_tables_count_dilers)){
$spisok = 

}
 ?>







































