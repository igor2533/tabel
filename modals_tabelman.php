


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
$sdd_db_name='montanja'; // ваша бд
$sdd_db_user='root'; // пользователь бд
$sdd_db_pass=''; // пароль к бд
@mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass); // коннект с сервером бд
@mysql_select_db($sdd_db_name);



//die($_SESSION['login']);






//$name_table = 'Лайт_готовность_заказов_ЛАЙТ_АПРЕЛЬ_1_НЕДЕЛЯ';
?>

<a href="logout.php">Выход</a>





	
  <div style="    float: left;width: 100%;
    position: relative;
    top: 51px;text-align: center;"> 
<h1 style="text-align: center;">Табель готовности заказов </h1> </br>
<?php $sql = $db->query("show tables");
 $db->close;
 ?>

<form>
<select>
  <?php  while($resulte = $sql->fetch_assoc()):  ?>
    <option>  <?php echo $resulte['Tables_in_montanja']; ?>  </option>
 <?endwhile?>
</select>
<input type="submit" name="tables">
</form>
 


<?php
  if(isset($_POST['tables'])){
   $name_table = $_POST['tableya'];
    
  }
 
 ?>

























<?php

$diler_kratko = $_SESSION['login'];
echo 'dad';

if($name_table == null) {
  $name_table = 'dec_1';
}
else {
  
  
}
//$result=mysql_query("SELECT * FROM ".$name_table ." WHERE `Клиент` LIKE '%Александр Чапля%'"); // запрос на выборку
$result=mysql_query("SELECT * FROM dec_1 WHERE `Клиент` LIKE '%Александр Чапля%'"); // запрос на выборку


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




   </div>
	





































