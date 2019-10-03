<?php 

include('db.php');


$spisok_users = $db->query("SELECT * FROM users");
 $db->close;
 while($result_spisok_users = $spisok_users->fetch_assoc()): 
$result_spisok_users = $result_spisok_users['login'];

echo $result_spisok_users; echo "</br>";

  endwhile;
 
 



?>