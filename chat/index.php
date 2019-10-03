
    

        
      
                
        <link rel="stylesheet" href="http://cdn.jsdelivr.net/emojione/1.3.0/assets/css/emojione.min.css"/>
        <link rel="stylesheet" href="/assets/css/styles.css" />

   
    

     
        <div class="shoutbox">
            
           <a onclick="viji();" id="trigger"><h1 style="height: 13px;text-align:center;position: relative;
    top: -10px;">Онлайн чат<img src=''/></h1></a> 
             <a onclick="viji2();" id="trigger2" style="height: 13px;display:none;position: relative;
    top: -10px;"><h1 style="text-align:center;">Онлайн чат<img src=''/></h1></a> 
            <ul class="shoutbox-content"  id="shouta_id" style="display:none;"></ul>
            
            <div class="shoutbox-form" style="display:none;" id="shot_form">
                <h2>Написать сообщение<span>×</span></h2>
                
                <form action="/publish.php" method="post">
                       <input type="text" id="shoutbox-name" name="name" value="<? echo $_SESSION['login'];?>" style="display:none;"/>
                   <textarea onkeydown="keyDown(event)" onkeyup="keyUp(event)" style="color:blue;font-size:20px;" id="shoutbox-comment" name="comment" maxlength='240'></textarea></br>
				   <span style="color:blue;font-weight: bold;">CTRL+ENTER - отправить сообщение</span>
                    <input type="submit" id="go" value="Shout!" style="display:none;"/>
                </form>
            </div>
            
        </div>

    
		
		<script> 
		
		function keyDown(e){ // В качестве параметра будем передавать объект event
/* Если нажата клавиша ctrl, то присваиваем соответствующей переменной значение true*/
	if(e.keyCode == 17)
		ctrl = true;
// Иначе, если пользователь держит нажатой клавишу ctrl и нажимает enter
else if(e.keyCode == 13 && ctrl)
// то имитируем щелчок по кнопке с id="go"
document.getElementById("go").click();
	document.getElementById('shoutbox-name').value = 'ad23233'; 
		document.getElementById('shoutbox-name').value = '<? echo $_SESSION['login'];?>';
}
		
	
		
		
	 
		
		</script>
		
		<script type='text/javascript'> 
		
		function viji(){
			
			
			
		
			$("#shouta_id").show(300);
			document.getElementById('trigger').style.display = 'none';
			document.getElementById('trigger2').style.display = 'inline';
		$("#shot_form").show(300);
			
		}	
		
		
		
			function viji2(){
			$("#shot_form").hide(300);
			$("#shouta_id").hide(300);
		document.getElementById('trigger').style.display = 'inline';
		document.getElementById('trigger2').style.display = 'none';
			
		}	
		
		
		
		
		
		
  </script> 
		
        <!-- Include jQuery and the EmojiOne library -->
      

        <script src="http://cdn.jsdelivr.net/emojione/1.3.0/lib/js/emojione.min.js"></script>
        <script src="/assets/js/script.js"></script>
