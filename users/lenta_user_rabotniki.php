<div class="lenty">
<p style="font-size: 30px;">Последние добавленные работники</p>
<? 
if (($level_users=='1')){ 
include('last_rabotniki_admin.php');
}

else if(($level_users=='2')){

include('last_rabotniki_user.php');
	
}

else if(($level_users=='3')){

include('last_rabotniki_user.php');
	
}



?>

</div>