  <script>
  $( function() {
    var availableTags = [
      "",
      "",
     
      "",
	  <?
	 
	  include('db.php');
	  if($level_users == 1 OR $level_users == 3){
	  $sql_rabotniki_search = $db->query("SELECT * FROM rabotniki ORDER BY famil ASC");}
	  if($level_users == 2){
		  $sql_rabotniki_search = $db->query("SELECT * FROM rabotniki where id_nach = $id_Ses ORDER BY famil ASC");
	  }		  
 $db->close;
 while($result_rabotniki_sarch = $sql_rabotniki_search->fetch_assoc()): 
	  echo '"'.$result_rabotniki_sarch['famil'].' '.$result_rabotniki_sarch['name'].' '.$result_rabotniki_sarch['otchestvo'].'",';
	 endwhile;
	  ?>
      "",
       "",
      ""
    ];
    $( ".search_fio" ).autocomplete({
      source: availableTags
    })
	;
	
  } );
  
  
  
  </script>
<!-- Контейнер с адаптиными блоками -->
<div class="masonry">
    <!-- Адаптивные блоки с содержанием -->
   <div class="item">
     <a href="#manager_tabel">  <img src="imgs/tabel.jpg"></a>
         <br> <div class="pered_item">  <a class="nazv_item" href="#manager_tabel">Ведение табеля </a></div>
    </div>
 
   <div class="item">
    <a href="#addchas">    <img src="imgs/time.jpg"></a>
        <br> <div class="pered_item"> <a class="nazv_item" href="#addchas"> Проставить часы </a></div>
   </div>
 
   <div class="item">
     <a href="#manager_raschetnik">  <img src="imgs/raschet.jpg">
     </a>  <br><div class="pered_item"> <a class="nazv_item" href="#manager_raschetnik">Сформировать расчетный листок</a></div>
  </div>
 
   <div class="item">
    <a href="#manager_rabotnik">   <img src="imgs/rabotniki.jpg">
  </a>   <br> <div class="pered_item"> <a class="nazv_item" href="#manager_rabotnik">Работники</a></div>
   </div>
 
   
	   <div class="item">
    <a href="#manager_childrens">   <img src="imgs/childrens.jpg">
  </a>   <br> <div class="pered_item"> <a class="nazv_item" href="#manager_childrens">Список иждивенцев</a></div>
   </div>
 
	 
	
	<div class="item">
    <a href="#manager_tabel_horizontal">   <img src="imgs/prazdnik.jpg">
  </a>   <br> <div class="pered_item"> <a class="nazv_item" href="#manager_tabel_horizontal">Табель</a></div>
   </div>
   
   
   <div class="item">
       <a  href="#manager_category_spravochnik"> <img src="imgs/sprav.png"></a>
       <br>  <div class="pered_item">  <a class="nazv_item" href="#manager_category_spravochnik">Справочники</a></div>
	</div>
	
	
	
	<!-- Конец адаптивных блоков с содержанием -->
 
</div>
    <!-- Конец контейнера с адаптивными блоками -->




<!-- begin modal -->
<div class="modal" id="manager_tabel_horizontal" >
    <div class="modal-container" style="max-height:400px; overflow-y:scroll;background: #962222!important;">
        <!-- begin modal  content -->
		
		<?
   include('managers/manager_tabel_horizontal.php');

		?>
		
		<!-- end modal content -->
		
 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->









<!-- begin modal -->
<div class="modal" id="lenta_rabotniki">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		
		
		<?
include('users/lenta_user_rabotniki.php');

		?>
		
		
		<!-- end modal content -->
		

 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->




<!-- begin modal -->
<div class="modal" id="lenta_admin">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		
		
		<?


if(($level_users=='3')){

include('users/lenta_user.php');
	
}

		?>
		
		
		<!-- end modal content -->
		

 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->


<!-- begin modal -->
<div class="modal" id="info_for_you">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		<? include('users/info_for_you.php'); ?>
		
		
		<!-- end modal content -->
		

 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->








<!-- begin modal -->
<div class="modal" id="manager_raschetnik">
    <div class="modal-container" style="top: 9%;">
        <!-- begin modal  content -->
		
		<? include('managers/manager_raschetnik.php'); ?>
		
		
		<!-- end modal content -->
		

 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->



<!-- begin modal -->
<div class="modal" id="manager_rabotnik">
    <div class="modal-container" style="top: 9%;">
        <!-- begin modal  content -->
		
		<? include('managers/manager_rabotnik.php'); ?>
		
		
		<!-- end modal content -->
		

 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->




<!-- begin modal -->
<div class="modal" id="tabel_search_admin">
    <div class="modal-container" style="max-width:80%!important;">
        <!-- begin modal  content -->
		
		<? include('tabel/tabel_search_admin.php'); ?>
		
		
		<!-- end modal content -->
		

 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->



<!-- begin modal tabel -->
<div class="modal" id="manager_tabel" style="">
    <div class="modal-container" style="top:10%;max-width: 80%!important;">
        <!-- begin modal  content -->
		
		<? include('managers/manager_tabel.php'); ?>
		
		
		<!-- end modal content -->
		

 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->





<!-- begin modal -->
<div class="modal" id="addchas">
    <div class="modal-container">
        <!-- begin modal  content -->
		
		<? include('tabel/add_chas_admin.php'); ?>
		
		
		<!-- end modal content -->
		
 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->




<!-- begin modal -->
<div class="modal" id="manager_childrens" >
    <div class="modal-container" style="max-height:400px; overflow-y:scroll;background: #962222!important;">
        <!-- begin modal  content -->
		
		<?
   include('managers/manager_childrens.php');

		?>
		
		<!-- end modal content -->
		
 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->



<!-- begin modal -->
<div class="modal" id="prewiew_in_manager_category_spravochnik" >
    <div class="modal-container" style="max-height:400px; overflow-y:scroll;background: #962222!important;">
        <!-- begin modal  content -->
		
		<?
		if(isset($_GET['id'])){
		include('managers/preview_spravochnik.php');}

		?>
		
		<!-- end modal content -->
		
 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->






<!-- begin modal -->
<div class="modal" id="manager_category_spravochnik" >
    <div class="modal-container" style="max-height:400px; overflow-y:scroll;background: #962222!important;">
        <!-- begin modal  content -->
		
		<?
   include('managers/manager_category_spravochnik.php');

		?>
		
		<!-- end modal content -->
		
 <div class="close_div">
 <a href="#modal-close">Закрыть</a></div>
    </div>
	
</div>
<!-- end modal -->






