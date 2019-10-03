
<?php include('db.php'); ?>


  <script type="text/javascript">
 function lowercase (val) {
  var upper="QWERTYUIOPASDFGHJKLZXCVBNMЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮЁ";
  var lower="qwertyuiopasdfghjklzxcvbnmйцукенгшщзхъфывапролджэячсмитьбюё";  
  var c,t,s='';
  for (var i=0; i<val.length; i++) {
   c=val.substring(i,i+1);
   t=upper.indexOf(''+c);
   if (t>-1) c=lower.substring(t,t+1); 
   s+=c;
  }
  return s;
 }
 function list_select () {
  var a = document.getElementById('user_id');
  var b = lowercase(document.getElementById('input').value); 
  for (i=0; i<a.options.length; i++) {
   if (lowercase(a.options[i].innerHTML).indexOf(b)>-1) {
    a.options[i].selected = true; return; 
   }
  }
 }
</script>


<form method="POST" class="form_o" action="#add_chas">
   
         
  <select class="sel_add_ch"  size="1" name="chasy">
    <option disabled value="0" selected>Чаcы рабочего дня</option>
  

    <option value="8">8</option>
	<option value="0">Н</option>
	 <option value="8">Б</option>
	<option value="7">7</option>
	 <option value="6">6</option>
	<option value="5">5</option>
	 <option value="4">4</option>
	<option value="3">3</option>
	 <option value="2">2</option>
	<option value="1">1</option>
	 <option value="0">0</option>
	
		
   </select></br>
   
   <input type="checkbox" id="other_time"  style="margin-top: 40px;width:20px;" /><label style="font-size: 23px;color: wheat;
    font-weight: bold;" for="other_time">Ночные</label>
	
	
	<script>

$("#other_time").change(function(){ 
if($(this).attr("checked")){ 
 document.getElementById('chasy_other_1').style.display = 'inline';
 
 
}else{ 
  document.getElementById('chasy_other_1').style.display = 'none';

	 
}}); 







	</script>
   <br/>
    <select style="display:none;" class="sel_add_ch" size="1" id="chasy_other_1" name="chasy_noch">
    <option disabled value="0" selected>Чаcы ночные</option>
  

    <option value="8">8</option>
	<option value="0">Н</option>
	 <option value="8">Б</option>
	<option value="7">7</option>
	 <option value="6">6</option>
	<option value="5">5</option>
	 <option value="4">4</option>
	<option value="3">3</option>
	 <option value="2">2</option>
	<option value="1">1</option>
	 <option value="0">0</option>
	
		
   </select><br />
   
  
   
   
  
   
   
   <input  class="sel_add_ch" type="date"  name="stav" id="stav" value="Y-m-d"  required></br>

   
   <script> 
   $("#stav").change(function(){
       
	/*    var stav = document.getElementById("stav").value;
    	  
  document.getElementById('stav').style.display = 'none';
		   document.getElementById('stav_block').style.display = 'inline';
   location.href ="?stavc=" + stav + "#addchas";
      document.getElementById('edit_date').style.display = 'inline'; */
   
});


    
   </script>
   
   
   <input id="input" style="font-size: 22px;font-weight: bold;color: black;"
   placeholder  = "Введите ФИО работника" onkeyup = "list_select()"></br>
      <select class="sel_add_ch" id="user_id" name="rab" size="1">
   
   
   
   
   
   
   
	<? 
 $id_podr_get = $_GET['id_podr'];

	$sql = $db->query("SELECT * FROM rabotniki order by famil");
 $db->close;
 while($result = $sql->fetch_assoc()): ?>
   <? $id_raba = $result['id_r'];?>
       <option value="<? 
	  $date_stav_get = strip_tags(trim($_GET['stavc']));
	  $date_stav = strip_tags(trim($_POST['stav']));
	
			
	   	   
	   echo $id_raba;?>" ><? echo $result['famil']; echo ' '; echo $result['famil'];echo ' ';echo  $result['otchestvo'];?></option>
	<? endwhile ?>
   
   </select></br>
   
       
     <input  style="background: #8fbb1a;
    color: white;
    font-size: 25px;" name="submit_ch" type="submit" value="Проставить">
      </form>
	
	  <? 
	   
	  $sql_test_chasov = $db->query("SELECT * FROM chasy where date_prostav = '$date_stav'");
 $db->close;
 while($resulte_test_chasov = $sql_test_chasov->fetch_assoc()): 
	$date_testa_chas =  $resulte_test_chasov['date_prostav'];
	  endwhile;
	  
	  
	  //$submitk = 
	  
	  $chas = strip_tags(trim($_POST['chasy']));
	  $chas_nochn = strip_tags(trim($_POST['chasy_noch']));

	  if(isset($_POST['submit_ch'])){
		  
		  
		 
$date_week  = strftime("%w", strtotime($date_stav));
$date_with_week = '('. $date_week . ')' . ' ' . $date_stav;	  
		  
		  
		    $sql_test_sotrud = $db->query("SELECT * FROM rabotniki where id_r = '$id_raba'");
 $db->close;
 while($resulte_test_sotrud = $sql_test_sotrud->fetch_assoc()): 
	$testa_sotrud =  $resulte_test_sotrud['id_r'];
	  endwhile;
		  
		  
	
		  
		  
		  
		//if($date_testa_chas == $date_stav ){
			
				
			//	if($testa_sotrud != $fio){
						
			  if($chas<9 ){
				
				  
				  
       $fio = strip_tags(trim($_POST['rab']));
      $time_stav = date('Дата: d-m-Y Время: H:i:s');
	  $day_stav = strip_tags(trim($_POST['stav']));
	$day_stav_ready = substr_replace($day_stav, null, 0, 8);
	
	
	 $sql_proverk_prazd = $db->query("SELECT * FROM spravochniki where category = 16 AND koeff = '$date_stav'");
 $db->close;
 while($resulty_proverk_prazd = $sql_proverk_prazd->fetch_assoc()): 
 $day_prazd_or_no =$resulty_proverk_prazd['koeff'];

 endwhile;
	
	if($day_prazd_or_no == $date_stav AND $date_week != 0 AND $date_week != 6)
	{
		
		
		
		$prazdnichn_dni = $chas;
		
			
	}
	
	else {
		$prazdnichn_dni = 0;
		
	}
	
	
	
	
	
	 $sql = $db->query("SELECT * FROM rabotniki where id_r = $fio ");
 $db->close;
 while($resulty = $sql->fetch_assoc()): 
 $name_s =$resulty['name'];
  $famil_s=$resulty['famil'];
   $otchestvo_s =$resulty['otchestvo'];
 $doljnost_s = $resulty['dolj'];
 endwhile;
  
  			
 $sql=$db->query("INSERT INTO `chasy`(`day`,`prazdnichn_dni`,`nochnie`,`date_prostav`,`date_create`, `chasov`, `id_rabotnika`, `id_nach`, `famil_rabotnika`,
 `name_rabotnika`, `otchestvo_rabotnika`, `doljnost`) VALUES ('$day_stav_ready','$prazdnichn_dni','$chas_nochn','$date_with_week','$time_stav','$chas','$fio',
 '$id_Ses','$famil_s','$name_s','$otchestvo_s','$doljnost_s')");
 $db->close;
 echo "<script>location.href='main_tabel.php#addchas'; </script>";  
		  }	
		  
 else {
	 		  echo "<script>location.href='#error_big_time';</script>";
 	  }
	
						
		
		
			
		
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	  }
	  
	 
	  
	  
	  
	  ?>
	  
	  
	  