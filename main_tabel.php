<? include('session.php')?>
<? include('links.php'); ?>
<? include('db.php'); ?>







<li style="    list-style-type: square;
    background: #2196F3;
    margin-bottom: 10px;
    padding: 7px;
    position: fixed;
    width: 100%;
    top: 0;
    /* margin-right: 2px; */
    left: 0;"> 	<!-- выйти -->
	<?php     
       if (empty($_SESSION['login']) or empty($_SESSION['id'])){ 
           
       } 
       else{ 
        echo '<a href="index.php"><img style="height: 48px;
    padding: 0px;
    float: left;" src="white.png"></img></a>';	
       echo '<a style="margin-top: 10px;" class="vihodh" href=exit.php>Выйти</a>';
	    echo '<a href="#info_for_you" title="Это ваш логин" style="background: red;
    padding-left: 5px;
    float: right;
    color: #ffffff;
    margin-right: 15px;
    text-decoration: none;
    font-size: 20px;
    margin-top: 10px;
    padding-right: 5px;">';
echo $login_in_system;

	   
	   
	   
	   
	   } 
       ?>
	<!-- выйти конец --> </li>







<?php     
       if (($level_users=='1')){ 
         include('modals_admin.php');
		
	
       } 
	   
	   if (($level_users=='3')){ 
         include('modals_otiz.php');
		 
       } 
	   
	    if (($level_users=='2')){ 



$sql_tab_obn = $db->query("SELECT * FROM levels where id = 5");
 $db->close;
 while($resulte = $sql_tab_obn->fetch_assoc()): 
$tabel_obnovlen_date = $resulte['nazv'];
endwhile;


       echo '<a style="position: absolute;color: white;font-size:28px;margin-left:38px;">Табель обновлен '.$tabel_obnovlen_date.'</a>';


        include('modals_tabelman.php');
		//include('chat/index.php');
       } 
	   
	   
	   
       else{  

	   } 
       ?>




















	   



