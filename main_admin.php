<? include('session.php')?>
<? include('links.php'); ?>






<li> 	<!-- выйти -->
	<?php     
       if (empty($_SESSION['login']) or empty($_SESSION['id'])){ 
           
       } 
       else{ 
           
       echo '<a style="float:right;" href=exit.php>Выйти</a>';} 
       ?>
	<!-- выйти конец --> </li>







<div class="one">
<p>Начальник </p>
<p>Иванов В.В. </p>
<p>Кол-во работников 8 </p>
<p>В системе с 090817 </p>
<p>Уровень доступа "Табельщик" </p>
<p> Последний вход в систему 090817 12:44</p>
<p> online</p>
</div>


<div class="two">
<p>Лента изменений </p>

<div class="lenta_st">
0908 1212 Выставлены часы работнику: Иванов ВА
</div>
<a> Полностью</a>
</div>


<div class="three">
Последние добавленные работники
<p>Должность : слесарь ФИО : Иванов Датадобавлениея: 1205 1212</p>

</div>


<div class="for">
Инструменты <br>

<a href="#tabel">Ведение табеля </a><br>
<a href="#addchas"> Проставить часы </a><br>
<a href="#adddolj"> Добавить должность </a><br>
<a href="#addnacha">Ддобавить пользователя </a><br>
<a href="#addpodrazz"> Добавить подразделение</a><br>
<a href="#addrab">Добавить работника</a>
</div>


<!-- begin modal -->
<div class="modal" id="addrab">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		<? include('add_rab.php'); ?>
		
		
		<!-- end modal content -->
		

 <a href="#modal-close">Close</a>
    </div>
	
</div>
<!-- end modal -->
<!-- begin modal -->
<div class="modal" id="addpodrazz">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		<? include('add_podraz.php'); ?>
		
		
		<!-- end modal content -->
		

 <a href="#modal-close">Close</a>
    </div>
	
</div>
<!-- end modal -->
<!-- begin modal -->
<div class="modal" id="addnacha">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		<? include('add_nach.php'); ?>
		
		
		<!-- end modal content -->
		

 <a href="#modal-close">Close</a>
    </div>
	
</div>
<!-- end modal -->

<!-- begin modal tabel -->
<div class="modal" id="tabel">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		<? include('tabel.php'); ?>
		
		
		<!-- end modal content -->
		

 <a href="#modal-close">Close</a>
    </div>
	
</div>
<!-- end modal -->



<!-- begin modal -->
<div class="modal" id="adddolj">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		<? include('add_dolj.php'); ?>
		
		
		<!-- end modal content -->
		

 <a href="#modal-close">Close</a>
    </div>
	
</div>
<!-- end modal -->


<!-- begin modal -->
<div class="modal" id="addchas">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		<? include('add_chas.php'); ?>
		
		
		<!-- end modal content -->
		

 <a href="#modal-close">Close</a>
    </div>
	
</div>
<!-- end modal -->







