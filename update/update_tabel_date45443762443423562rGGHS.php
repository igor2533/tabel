<?
  include_once('../db_red_gost.php');
/*Делаем запрос к БД*/


$date_todaaty = date("d.m.Y H:i"); 
 $result_update_razryad = mysql_query("UPDATE levels SET `nazv`='$date_todaaty' WHERE id = '5'",$db);
 
   ?>  
