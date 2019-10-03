<style> body {    background: #2196F3;} </style>
<?php     




          //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!     
          session_start(); 







		
          ?>  
<link  href="http://fonts.googleapis.com/css?family=Cabin:400,500,600,bold" rel="stylesheet" type="text/css" >

<link  href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold" rel="stylesheet" type="text/css">		  
            <span style="color:white;"> ТГЗ Версия 1.01</span>
          <div class="divlogin">

		  <p style="background: rgba(0, 0, 0, 0.46);color:white;font-size:40px;font-weight:bold;">Личный кабинет клиента ООО Монтанья</p>
		   <p style="background: rgba(0, 0, 0, 0.46);color:white;font-size:30px;font-weight:bold;">Для входа в систему необходима авторизация</p>
		  
		  <form action="index.php" class="testreg" method="post">     

              
       <p>     
           
          <input name="login" class="testLogin" placeholder="Введите логин" type="text" size="15" maxlength="15" required >     
          </p>     

          <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->     
             
          <p>     

        
          <input name="password" class="testName" placeholder="Введите пароль" type="password" size="15" maxlength="15" required >     
          </p>     

          <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->       

          <p>  




		  
          <input class="submitVoiti" type="submit" name="submit" value="Войти">     

          <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** -->       
<br>     
       <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** -->       
  
          </p></form>    
</div>  
          <?php 

$submit_t = $_POST['submit'];		  
if (isset($submit_t)){
		      
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
      if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} } 
    
if (empty($login) or empty($password)) 
      { 
      exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!"); 
      } 
      
      $login = stripslashes($login); 
      $login = htmlspecialchars($login); 
$password = stripslashes($password); 
      $password = htmlspecialchars($password); 

      $login = trim($login); 
      $password = trim($password); 

      include ("bd.php");
     
$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db); 
      $myrow = mysql_fetch_array($result); 
	  
	   include('secret.php');
	   $password_zawita = md5($password.$secret);
	  
	  
      if (empty($myrow['pass'])) 
      { 
     
      exit ('<span class="notpass_error">Извините, введённый вами login или пароль неверный.</span>'); 
      } 
      else { 
     
      if ($myrow['pass']==$password_zawita) { 
      
      $_SESSION['login']=$myrow['login'];   
      $_SESSION['id']=$myrow['id'];
	
	//nachalo
	
	/**
 * Возвращает информация об IP адресе
 */
function get_ip_info($ip)
{
    $postData = "
        <ipquery>
            <fields>
                <all/>
            </fields>
            <ip-list>
                <ip>$ip</ip>
            </ip-list>
        </ipquery>
    "; 
 
    $curl = curl_init(); 
 
    curl_setopt($curl, CURLOPT_URL, 'http://194.85.91.253:8090/geo/geo.html'); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postData); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
 
    $responseXml = curl_exec($curl);
    curl_close($curl);
 
    if (substr($responseXml, 0, 5) == '<?xml')
    {
        $ipinfo = new SimpleXMLElement($responseXml);
        return $ipinfo->ip;
    }
 
    return false;
}
 
// пример использования
$ipinfo = get_ip_info($_SERVER['REMOTE_ADDR']);
//echo $ipinfo->city; // город
//echo $ipinfo->region; // регион
//echo $ipinfo->district; // федеральный округ РФ
	
	
	//end
	
	
	
	
	
	$city_my = $ipinfo->city;
	 $id_Ses = $_SESSION['id'];
	 	      $_SESSION['level_id']=$myrow['level_id'];
		  		   $date_auth = date('d-m-Y');
	  $time_auth = date('H:i:s');
		  
		 $ip_adres_last = $_SERVER["REMOTE_ADDR"];
        $inserta = mysql_query("UPDATE `users` SET `date_auth`='$date_auth',`time_last_auth`='$time_auth', `ip_adres_last`= '$ip_adres_last' WHERE id = '$id_Ses'",$db); 
	  
	   echo("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=main_tabel.php'></head></html>");
       
        exit();
       } 
   else { 

      exit ('<span class="notpass_error">Извините, введённый вами login или пароль неверный.</span>'); 
      } 
      }     
}
else{

}	
		 // Проверяем, пусты ли переменные логина и id пользователя     
          if (empty($_SESSION['login']) or empty($_SESSION['id']))     
          {     
          // Если пусты, то мы не выводим ссылку     
          
            
             
          }     
          ?>