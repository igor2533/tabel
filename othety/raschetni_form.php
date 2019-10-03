<?
include('../links.php');
include('functions_raschet.php');


//Начислено




?>
<style>
.raschetnik>table>tbody>tr>td{
	border:solid 1px black;
	    padding: 7px;
}

tbody {
	   
}

</style>
<script>
function delete_tr_2(){
	document.getElementById('tr_2').style.display = 'none';
}

function delete_tr_3(){
	document.getElementById('tr_3').style.display = 'none';
}

function delete_tr_4(){
	document.getElementById('tr_4').style.display = 'none';
}

function delete_tr_5(){
	document.getElementById('tr_5').style.display = 'none';
}

function delete_tr_6(){
	document.getElementById('tr_6').style.display = 'none';
}

function delete_tr_7(){
	document.getElementById('tr_7').style.display = 'none';
}
function delete_tr_8(){
	document.getElementById('tr_8').style.display = 'none';
}

function delete_tr_9(){
	document.getElementById('tr_9').style.display = 'none';
}
function delete_tr_10(){
	document.getElementById('tr_10').style.display = 'none';
}
function delete_tr_11(){
	document.getElementById('tr_11').style.display = 'none';
}
function delete_tr_12(){
	document.getElementById('tr_12').style.display = 'none';
}
</script>
<div class="raschetnik">


<table style="font-weight: bold;width: -webkit-fill-available;"> 
<tr>
<td>№ <? echo $id;?></td>
<td><? echo $fio_man; echo ' '; echo $name_man; echo ' '; echo $otch_man; ?></td>
<td><? echo $razryad_rabotnika_nazv; ?></td>
<td>Ставка: <? echo round($koeff_s_razryadom, 2); ?></td>
</tr>


<tr>
<td>За <? echo $nazv_mesyac; echo ' '; echo $year; echo ' г.';?></td>
<td></td>
<td>Тариф: <? echo round($chasovaya_stavka_nujnogo_rabotnika, 2); ?></td>
<td><? echo 'Норма(часов): '; echo $norma_rab_vrem_v_chasah; ?></td>
</tr>

<tr>
<td>Должность: <? echo $name_doljnosti;?></td>
<td>Мин ЗП: <? echo $min_zp;?></td>
<td>Норма(дней): <? echo $norma_dnei_mesyac;?></td>
<td>Подразделение: <? echo $name_podrazd;?></td>
</tr>


</table>


<table style="font-weight: bold;width: -webkit-fill-available;">
    <tr id="tr_1">
        <td>Месяц</td>
        <td>Вид начисления</td>
        <td>Сумма</td>
        <td>Дни</td>
        <td>Часы</td>
        <td>Месяц</td>
        <td>Вид удержания</td>
        <td>Сумма</td>
		<td style="border:none; "></td>
    </tr>
    <tr id="tr_2">
        <td><?echo $monday;?></td>
        <td>Оплата по тарифу</td>
        <td><? echo round($oplata_po_tarifu, 2);?></td>
        <td><? echo round($vsego_dnei_fact, 2);?></td>
        <td><? echo round($chasov_vsego, 2); ?></td>
        <td><? echo $monday;?></td>
        <td>Пенсионный фонд</td>
        <td><? echo round($summ_pension_fond ,2);?></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_2();">Х</a></td>
    </tr>
    <tr id="tr_3">
        <td><?echo $monday;?></td>
        <td contenteditable="true">Надбавка за выслугу лет</td>
        <td contenteditable="true"><? echo round($za_vislugu_let, 2); ?></td>
        <td></td>
        <td></td>
        <td><? echo $monday;?></td>
        <td>Подоходный налог</td>
        <td><?echo round($vichisl_nalog,2);?></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_3();">Х</a></td>
    </tr>
    <tr id="tr_4">
        <td><? echo $monday; ?></td>
        <td contenteditable="true">Ежемесячная премия рабочих</td>
        <td contenteditable="true"><? echo round($premia_rabotnika, 2);?></td>
        <td></td>
        <td></td>
        <td><? echo $monday; ?></td>
        <td contenteditable="true">Профвзносы</td>
        <td><? echo round($summ_profvznosa, 2);?></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_4();">Х</a></td>
    </tr>
    <tr id="tr_5">
        <td><? echo $monday;?></td>
        <td contenteditable="true">За сложность и напряженность</td>
        <td contenteditable="true"><? echo round($za_slojnost_i_naprejennost, 2);?></td>
        <td></td>
        <td></td>
        <td><? echo $monday;?></td>
        <td>Алименты</td>
        <td><? echo round($raschet_alimenta,2);?></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_5();">Х</a></td>
    </tr>
    <tr id="tr_6">
        <td><? echo $monday;?></td>
        <td contenteditable="true">За проф. мастерство</td>
        <td contenteditable="true"><? echo round($polychaem_Za_profmasterstvo, 2); ?></td>
        <td></td>
        <td></td>
        <td><? echo $monday;?></td>
        <td></td>
        <td></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_6();">Х</a></td>
    </tr>
    <tr id="tr_7">
        <td><? echo $monday;?></td>
        <td contenteditable="true">За вредность</td>
        <td contenteditable="true"><? echo round($vrednie_uslov_nadbavka_polnost, 2); ?></td>
        <td></td>
        <td></td>
        <td><? echo $monday;?></td>
        <td></td>
        <td></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_7();">Х</a></td>
    </tr>
	
	 <tr id="tr_8">
        <td><? echo $monday;?></td>
        <td contenteditable="true">Индексация ЗП</td>
        <td contenteditable="true"><? echo round($doplata_ot_mzp, 2); ?></td>
        <td></td>
        <td></td>
        <td><? echo $monday;?></td>
        <td></td>
        <td></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_8();">Х</a></td>
    </tr>
	
	
	 <tr id="tr_9">
        <td><? echo $monday;?></td>
        <td contenteditable="true">Ночные</td>
        <td contenteditable="true"><? echo round($oplata_za_nochnie, 2) ;?></td>
        <td></td>
        <td><? echo $chasov_vsego_nochnih_e;?></td>
        <td><? echo $monday;?></td>
        <td></td>
        <td></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_9();">Х</a></td>
    </tr>
	
		 <tr id="tr_12">
        <td><? echo $monday;?></td>
        <td contenteditable="true">Сверхурочные</td>
        <td contenteditable="true"><? echo round($oplata_za_sverhurochn, 2) ;?></td>
        <td></td>
        <td><? echo $sverhurochnie_chasy;?></td>
        <td><? echo $monday;?></td>
        <td></td>
        <td></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_12();">Х</a></td>
    </tr>
	
	
	
	
	
	 <tr id="tr_11">
        <td><? echo $monday;?></td>
        <td contenteditable="true">Выходные</td>
        <td contenteditable="true"><? echo round($oplata_za_vihodnie, 2); ?></td>
        <td></td>
        <td><? echo $chasov_vsego_vihodnih_e;?></td>
        <td><? echo $monday;?></td>
        <td></td>
        <td></td>
			<td style="border:none; "><a style="text-decoration: none;color: #c74015;font-size: 25px;
    font-weight: bold;" href="#" onclick="delete_tr_11();">Х</a></td>
    </tr>
	
	
	

	
	
	
	  <tr id="tr_x">
        <td style="border:none;"></td>
        <td style="border:none;"><span style="font-weight:bold;">Начислено</span></td>
        <td><? echo round($nachisleno_s_index, 2); ?></td>
        <td style="border:none;"></td>
        <td style="border:none;"></td>
        <td style="border:none;"></td>
        <td style="border:none;font-weight:bold;">Удержано</td>
        <td style="font-weight:bold;"><? echo round($vsego_uderjano,2); ?></td>
			<td style="border:none;"></td>
    </tr>
	
	
	
	
</table>


<table style="width: -webkit-fill-available; font-weight:bold;">
<tr>
	<td>Долг за предприятием(за работником) на начало месяца</td>
	<td>-</td>
	</tr>
	
	<tr>
	<td>Полагается к выплате</td>
	<td><? echo round($zp_na_ruki,2);?></td>
	</tr>
	
	<tr>
	<td>Внесено в кассу в течение месяца</td>
	<td>-</td>
	</tr>
	
	<tr>
	<td>Переходящий долг за работником на следующий месяц</td>
	<td><? echo round($perehod_dolg,2);?></td>
	</tr>
	
	<tr>
	<td>Долг за предприятием(за работником) на конец месяца</td>
	<td>-</td>
	</tr>


</table>

<script >
function utverjdenie(){
var pass=prompt('Введите пароль',100)
if(pass == 1){
	$( "#form_add_dan" ).submit();
}
else{
alert('Неправильный пароль')}}

 </script>
<form method="POST" id="form_add_dan" action="raschetni_listok.php?id=<? echo $id;?>">

<input type="button" onclick="utverjdenie()" style="width: 200px;  

  margin-top: 10px;    height: 50px;
    margin-bottom: 10px;    font-size: 20px;" name="utverdit" 
<? 
include('../db.php');
$date_utverjd_for_b = date('Y-m-d');
$sql_utverjd_for_b = $db->query("SELECT * FROM raschetniki WHERE id_r = $id AND date_utverjden = '$date_utverjd_for_b'");
 $db->close;
 while($resulte_utverjd_for_b = $sql_utverjd_for_b->fetch_assoc()):
 $daters = $resulte_utverjd_for_b['date_utverjden'];
endwhile;
if($date_utverjd_for_b == $daters){
	echo 'disabled value="Утверждено"';
}
else{ 
echo 'value="Утвердить"';
 }


?>
	/>
	<button onclick="window.print()" style="font-size: 17px;
    height: 50px;
    padding-left: 20px;
    padding-right: 20px;">Печать</button>
<input style="display:none;" value="<? echo round($perehod_dolg,2);?>" name="dolg_alimenty"/>
<input style="display:none;" value="<? echo round($perehod_dolg,2);?>" name="dolg_obw"/>
<input style="display:none;" value="<? echo round($vsego_uderjano,2); ?>" name="uderjanie"/>
<input style="display:none;" value="<? echo round($raschet_alimenta,2);?>" name="vsego_zapl_alimentov"/>
<input style="display:none;" value="<? echo round($nachisleno_s_index, 2); ?>" name="nachisleno"/>
<input style="display:none;" value="<? echo round($zp_na_ruki,2);?>" name="na_ruki"/>
<input style="display:none;" value="<?echo round($vichisl_nalog,2);?>" name="nalog_podoh"/>
<input style="display:none;" value="<? echo round($summ_profvznosa, 2);?>" name="profsouz"/>
<input style="display:none;" value="<? echo round($chasov_vsego, 2); ?>" name="chasov_vsego"/>
<input style="display:none;" value="0" name="bilo_zaplacheno"/>
<input style="display:none;" value="<? echo date('Y-m-d');?>" name="date_utverjden"/>
<input style="display:none;" value="<? echo date ('m-Y'); ?>" name="month_and_year"/>

</form>
<?
if(isset($_POST['nalog_podoh'])){
	
		 $month_and_year = strip_tags(trim($_POST['month_and_year']));
          $date_utverjden = strip_tags(trim($_POST['date_utverjden']));	
 $bilo_zaplacheno = strip_tags(trim($_POST['bilo_zaplacheno']));
          $chasov_vsego = strip_tags(trim($_POST['chasov_vsego']));	
 $profsouz = strip_tags(trim($_POST['profsouz']));
          $nalog_podoh = strip_tags(trim($_POST['nalog_podoh']));	
 $na_ruki = strip_tags(trim($_POST['na_ruki']));
          $nachisleno = strip_tags(trim($_POST['nachisleno']));	
 $vsego_zapl_alimentov = strip_tags(trim($_POST['vsego_zapl_alimentov']));
          $uderjanie = strip_tags(trim($_POST['uderjanie']));	
 $dolg_obw = strip_tags(trim($_POST['dolg_obw']));
          $dolg_alimenty = strip_tags(trim($_POST['dolg_alimenty']));
         	  
	  include_once('../db_red.php');
/*Делаем запрос к БД*/
 $result_add_stavka = mysql_query("INSERT INTO raschetniki (`id_user`,`id_r`,`month_and_year`,`date_utverjden`,
 `bilo_zaplacheno`,`chasov_vsego`,`profsouz`,`nalog_podoh`,`na_ruki`,`nachisleno`,`vsego_zapl_alimentov`,`uderjanie`,`dolg_obw`
 ,`dolg_alimenty`) VALUES ('$id_usersa','$id','$month_and_year','$date_utverjden','$bilo_zaplacheno','$chasov_vsego','$profsouz',
 '$nalog_podoh','$na_ruki','$nachisleno','$vsego_zapl_alimentov','$uderjanie','$dolg_obw','$dolg_alimenty')",$db);
	echo '<script>alert("Утверждено"); </script>';
	echo '<script>location.href="../main_tabel.php#manager_raschetnik"; </script>';
	
}

?>




</div>
