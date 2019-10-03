<?   include('../db.php');?>
<?
	//Считаем сколько рабочик часов вышло по факту
	 $id = $_GET['id'];
	  $monday = $_POST['monday'];
	  $year = $_POST['year'];
	  $sql = $db->query("SELECT SUM(chasov) FROM chasy WHERE id_rabotnika = '$id' AND date_prostav LIKE '%$monday%' AND date_prostav LIKE '%$year%' ");
 $db->close;
 while($resulte = $sql->fetch_assoc()):
$chasov_vsego = $resulte['SUM(chasov)'];
endwhile;


//Считаем сколько праздничных часов вышло за месяц по факту
	 
	  $sql_prazdnichnih = $db->query("SELECT SUM(prazdnichn_dni) FROM chasy WHERE id_rabotnika = '$id' AND date_prostav LIKE '%$monday%' AND date_prostav LIKE '%$year%' ");
 $db->close;
 while($resulte_prazdnichnih = $sql_prazdnichnih->fetch_assoc()):
$chasov_vsego_prazdnichnih = $resulte_prazdnichnih['SUM(prazdnichn_dni)'];
endwhile;



	

	//Считаем сколько выходных часов вышло по факту
$sql_vihodnih = $db->query("SELECT SUM(chasov) FROM chasy WHERE id_rabotnika = '$id' AND date_prostav LIKE '%$monday%' AND date_prostav LIKE '%$year%' AND date_prostav
LIKE '%(6)%' OR date_prostav LIKE '%(0)%' ");
 $db->close;
 while($resulte_vihodnih = $sql_vihodnih->fetch_assoc()):
$chasov_vsego_vihodnih = $resulte_vihodnih['SUM(chasov)'];
endwhile;
$chasov_vsego_vihodnih_e = $chasov_vsego_vihodnih;

//Считаем сколько праздничных дней всего в данном месяце по плану 

 
 

$sql_vihodnih = $db->query("SELECT SUM(chasov) FROM chasy WHERE id_rabotnika = '$id' AND date_prostav LIKE '%$monday%' AND date_prostav LIKE '%$year%' AND date_prostav
LIKE '%(6)%' OR date_prostav LIKE '%(0)%' ");
 $db->close;
 while($resulte_vihodnih = $sql_vihodnih->fetch_assoc()):
$chasov_vsego_vihodnih = $resulte_vihodnih['SUM(chasov)'];
endwhile;
$chasov_vsego_vihodnih_e = $chasov_vsego_vihodnih;







	//Считаем сколько ночных часов вышло по факту
$sql_chasov_nochnih = $db->query("SELECT SUM(nochnie) FROM chasy WHERE id_rabotnika = '$id' AND date_prostav LIKE '%$monday%' AND date_prostav LIKE '%$year%' ");
 $db->close;
 while($resulte_chasov_nochnih = $sql_chasov_nochnih->fetch_assoc()):
$chasov_vsego_nochnih = $resulte_chasov_nochnih['SUM(nochnie)'];
endwhile;
$chasov_vsego_nochnih_e = $chasov_vsego_nochnih; 	
	




	//ВЫЗОВ РАБОТНИКИ
 $sql_premia = $db->query("SELECT * FROM rabotniki WHERE id_r = $id");
 $db->close;
 while($resulte_rabotnik = $sql_premia->fetch_assoc()):
 $premia_id_cof =$resulte_rabotnik['premia'];
  $stavka_id =$resulte_rabotnik['stavka'];
  $aliments =$resulte_rabotnik['aliments'];
    $razryad_rabotnika =$resulte_rabotnik['razryad'];
	$year_in_authing = $resulte_rabotnik['date_auth'];
	$coeff_povish = $resulte_rabotnik['coeff_povish'];
	$kont_nadbav = $resulte_rabotnik['nadbavka'];
	$profmasterstvo_id = $resulte_rabotnik['profmasterstvo'];
	$uslovia_truda_id = $resulte_rabotnik['uslov_truda'];
	$dolj_id = $resulte_rabotnik['dolj'];
	$fio_man = $resulte_rabotnik['famil'];
	$name_man = $resulte_rabotnik['name'];
	$otch_man = $resulte_rabotnik['otchestvo'];
	$id_podrazd = $resulte_rabotnik['podrazdelenie'];
	$id_profsouz = $resulte_rabotnik['profsouz'];
	$nalich_detei = $resulte_rabotnik['nalich_detei'];
 endwhile;
	$id_profsouz_rabotnika = $id_profsouz;
	$nalich_detei_ready = $nalich_detei;
	//Вызов коэффициента профсоюза
	$sql_profsouz = $db->query("SELECT * FROM spravochniki WHERE id = $id_profsouz_rabotnika");
 $db->close;
 while($resulte_profsouz = $sql_profsouz->fetch_assoc()):
 $profzouz_koeffic = $resulte_profsouz['koeff'];
	endwhile;
	$profzouz_koeffic_ready = $profzouz_koeffic;
	//ВЫЗОВ КОНФИГА РАБОТНИКА
 $sql_configs = $db->query("SELECT * FROM configs WHERE id = $id");
 $db->close;
 while($resulte_configs = $sql_configs->fetch_assoc()):
 $slojnost_i_naprejennost_id_coeffic =$resulte_configs['za_slojn_napr'];
  $id_deti_const = $resulte_configs['deti'];
  endwhile;
   $id_deti_ready = $id_deti_const;
  //Вызов названия должности
   $sql_dolj_name = $db->query("SELECT * FROM spravochniki WHERE id = $dolj_id");
 $db->close;
 while($resulte_dolj_name = $sql_dolj_name->fetch_assoc()):
 $name_doljnosti =$resulte_dolj_name['nazv'];
  endwhile;
 //Вызов названия подразделения
   $sql_podrazd_name = $db->query("SELECT * FROM spravochniki WHERE id = $id_podrazd");
 $db->close;
 while($resulte_podrazd_name = $sql_podrazd_name->fetch_assoc()):
 $name_podrazd =$resulte_podrazd_name['name_podr'];
  endwhile;
  
  
  
  //ВЫЗОВ КОЭФФИЦИЕНТА ЗА СЛОЖНОСТЬ И НАПРЯЖЕННОСТЬ
  
 /*$sql_nadbavki_slojn = $db->query("SELECT * FROM spravochniki WHERE id = $slojnost_i_naprejennost_id_coeffic");
 $db->close;
 while($resulte_nadbavki_slojn = $sql_nadbavki_slojn->fetch_assoc()):
 $slojnost_i_naprejennost_coeff =$resulte_nadbavki_slojn['koeff'];
 $slojnost_i_naprejennost_coeff_ready = $slojnost_i_naprejennost_coeff * 0.01;
  endwhile;*/


//Запрос коэффициентов на алименты
//Один ребенок
$sql_alim_one_reb = $db->query("SELECT * FROM spravochniki WHERE id = 9");
 $db->close;
 while($resulte_alim_one_reb = $sql_alim_one_reb->fetch_assoc()):
 $koeff_na_odnogo_reb_alim = $resulte_alim_one_reb['koeff'];
  endwhile;
$koeff_na_odnogo_reb_alim_ready = $koeff_na_odnogo_reb_alim * 0.01;


$sql_alim_two_reb = $db->query("SELECT * FROM spravochniki WHERE id = 10");
 $db->close;
 while($resulte_alim_two_reb = $sql_alim_two_reb->fetch_assoc()):
 $koeff_na_two_reb_alim = $resulte_alim_two_reb['koeff'];
  endwhile;
$koeff_na_two_reb_alim_ready = $koeff_na_two_reb_alim * 0.01;






	//запрос стажа

//подсчет стажа
$today = date('Y-m-d');
$years_raznica = date('y', strtotime($today)) - date('y', strtotime($year_in_authing));

if ($years_raznica <1)
{
 
 $id_staj_sotrudnika = '5';
 
 
}

if($years_raznica > 1 AND $years_raznica <2 OR $years_raznica == 1)
{
   $id_staj_sotrudnika = '1';
  
}


if($years_raznica > 2 AND $years_raznica <5 OR $years_raznica == 2 )
{
  $id_staj_sotrudnika = '2';
  
}

if($years_raznica > 5 AND $years_raznica <10 OR $years_raznica == 5 )
{
  $id_staj_sotrudnika = '3';
  
}

if($years_raznica > 10 OR $years_raznica == 10)
{
  $id_staj_sotrudnika = '4';
  
}
	



	//подсчет стажа
//запрос стажа
$sql_coeff_staja = $db->query("SELECT * FROM spravochniki WHERE `id` = '$id_staj_sotrudnika'");
  $db->close; 
while($result_coeff_staja = $sql_coeff_staja->fetch_assoc()):
$koeff_staja = $result_coeff_staja['koeff'];

endwhile;
$staj_koeff_ready = $koeff_staja * 0.01;
	







	 //ВЫЗОВ РАЗРЯДА
  $sql_razryad = $db->query("SELECT * FROM spravochniki WHERE id =  $razryad_rabotnika");
 $db->close;
 while($resulte_razryad = $sql_razryad->fetch_assoc()):
 $razryad_rabotnika_coeff = $resulte_razryad['koeff'];
  $razryad_rabotnika_nazv = $resulte_razryad['nazv'];
 endwhile;
	



	 //ВЫЗОВ ПРЕМИИ
 $sql_premia_cof = $db->query("SELECT * FROM spravochniki WHERE id = $premia_id_cof");
 $db->close;
 while($resulte_premia_cof = $sql_premia_cof->fetch_assoc()):
 $premia_cof =$resulte_premia_cof['koeff'];
 $premia_cof_ready = $premia_cof * 0.01;
 endwhile;
	



	
	//ВЫЗОВ КОНСТАНТ
	//ВЫЗОВ Подоходный налог 
  $sql_constants = $db->query("SELECT * FROM spravochniki WHERE category = 13 AND id = '33'");
 $db->close;
 while($resulte_constants = $sql_constants->fetch_assoc()):
 $nalog_podohodni =$resulte_constants['koeff'];
  endwhile;
 
 	//ВЫЗОВ Сумма для сравнения ЗП для вычета налога
  $sql_constants = $db->query("SELECT * FROM spravochniki WHERE category = 13 AND id = '34'");
 $db->close;
 while($resulte_constants = $sql_constants->fetch_assoc()):
 $sum_for_sravn_vichet =$resulte_constants['koeff'];
  endwhile;
 
 //ВЫЗОВ Сумма вычета если нет детей
  $sql_constants = $db->query("SELECT * FROM spravochniki WHERE category = 13 AND id = '35'");
 $db->close;
 while($resulte_constants = $sql_constants->fetch_assoc()):
  $vichet_fiz_lico_for_zp =$resulte_constants['koeff'];
  endwhile;
 
 
  //ВЫЗОВ Сумма вычета если один ребенок
  $sql_constants = $db->query("SELECT * FROM spravochniki WHERE category = 13 AND id = '36'");
 $db->close;
 while($resulte_constants = $sql_constants->fetch_assoc()):
  $if_one_kinder =$resulte_constants['koeff'];
  endwhile;
 
 
 
  //ВЫЗОВ Сумма вычета если двое детей
  $sql_constants = $db->query("SELECT * FROM spravochniki WHERE category = 13 AND id = '37'");
 $db->close;
 while($resulte_constants = $sql_constants->fetch_assoc()):
  $if_two_kinders =$resulte_constants['koeff'];
  endwhile;
 
 
 
 //ВЫЗОВ BPM
  $sql_constants = $db->query("SELECT * FROM spravochniki WHERE category = 12 AND id = '31'");
 $db->close;
 while($resulte_constants = $sql_constants->fetch_assoc()):
  $budjet_proj =$resulte_constants['koeff'];
  endwhile;
 
 
  //ВЫЗОВ Mzp
  $sql_constants = $db->query("SELECT * FROM spravochniki WHERE category = 12 AND id = '32'");
 $db->close;
 while($resulte_constants = $sql_constants->fetch_assoc()):
  $min_zp =$resulte_constants['koeff'];
  endwhile;


  
   
  

	
  $vichet_fiz_lico_for_zp_ready =$vichet_fiz_lico_for_zp;
  $if_two_kinders_ready = $if_two_kinders;
  $if_one_kinder_ready = $if_one_kinder;
  $sum_for_sravn_vichet_ready =$sum_for_sravn_vichet;
$nalog_podohodni_s_proc = $nalog_podohodni;
  $nalog_podohodni_ready = $nalog_podohodni_s_proc * 0.01;


	

	

 if($monday == "-01-"){
	 $tekuw_mesac_id = 52;
	
	$nazv_mesyac = 'Январь';
 }
 
  if($monday == "-02-"){
	  $tekuw_mesac_id = 53;
	
	$nazv_mesyac = 'Февраль';
 }
 
  if($monday == "-03-"){
	  $tekuw_mesac_id = 54;
	
	$nazv_mesyac = 'Март';
 }
 
  if($monday == "-04-"){
	  $tekuw_mesac_id = 55;

	$nazv_mesyac = 'Апрель';
 }
 
  if($monday == "-05-"){
	  $tekuw_mesac_id = 56;
	
	$nazv_mesyac = 'Май';
 }
 
  if($monday == "-06-"){
	  $tekuw_mesac_id = 57;
	
	$nazv_mesyac = 'Июнь';
 }
 
  if($monday == "-07-"){
	  $tekuw_mesac_id = 58;
	
	$nazv_mesyac = 'Июль';
 }
 
  if($monday == "-08-"){
	  $tekuw_mesac_id = 59;
	
	$nazv_mesyac = 'Август';
 }
 
  if($monday == "-09-"){
	  $tekuw_mesac_id = 60;

$nazv_mesyac = 'Сентябрь';	
 }
 
  if($monday == "-10-"){
	  $tekuw_mesac_id = 61;
	
	$nazv_mesyac = 'Октябрь';
 }
 
  if($monday == "-11-"){
	  $tekuw_mesac_id = 62;
	
	$nazv_mesyac = 'Ноябрь';
 }
 
  if($monday == "-12-"){
	  $tekuw_mesac_id = 63;
		$nazv_mesyac = 'Декабрь';
 }
 
 
 

$sql_norm_rab = $db->query("SELECT * FROM spravochniki WHERE id = $tekuw_mesac_id ");
	
 $db->close;
 while($resulte_norm_rab = $sql_norm_rab->fetch_assoc()):
 
$mesac_dni = $resulte_norm_rab['koeff'];

 endwhile;

 $norma_dnei_mesyac = $mesac_dni; 

//вызов средней нормы раб времени
	
	$sql_norm_rab = $db->query("SELECT * FROM spravochniki WHERE id = 64 ");
	
 $db->close;
 while($resulte_norm_rab = $sql_norm_rab->fetch_assoc()):
 
$sr_norma_rab_vr = $resulte_norm_rab['koeff'];


 endwhile;
	
	
	
	
	
	 //ВЫЗОВ СТАВКИ
 
   $sql_stavka = $db->query("SELECT * FROM spravochniki WHERE id = $stavka_id");
 $db->close;
 while($resulte_stavka = $sql_stavka->fetch_assoc()):
 
 $koeff_stavki = $resulte_stavka['koeff'];

 
 endwhile;
 
	
		//ВЫЗОВ Параметров за сложность и напряженность
  $sql_constants = $db->query("SELECT * FROM spravochniki WHERE id = '$id'");
 $db->close;
 while($resulte_constants = $sql_constants->fetch_assoc()):



  $pensionni_fond =$resulte_constants['pensionni_fond'];
 endwhile;	

 //ВЫЗОВ Параметров за проф.мастерство
  $sql_profmasterstvo = $db->query("SELECT * FROM spravochniki WHERE id = '$profmasterstvo_id'");
 $db->close;
 while($resulte_profmasterstvo = $sql_profmasterstvo->fetch_assoc()):
 $koeff_profmasterstva =$resulte_profmasterstvo['koeff'];
$koeff_profmasterstva_ready = $koeff_profmasterstva * 0.01;
 endwhile;
	
	 //ВЫЗОВ коэффициента по вредным условиям труда
  $sql_id_uslov_truda = $db->query("SELECT * FROM spravochniki WHERE id = '$uslovia_truda_id'");
 $db->close;
 while($resulte_id_uslov_truda = $sql_id_uslov_truda->fetch_assoc()):
 $koeff_uslov_truda =$resulte_id_uslov_truda['koeff'];
//получаем часовую доплату от вредности


 endwhile;
	
//Вызов количества детей для алиментов
$today_date_alim = date('Y-m-d');
 $sql_alim_det = $db->query("SELECT SUM(aliments) FROM childrens WHERE id_rab LIKE  '$id' AND aliments LIKE '1' AND date_soverwennol > '$today_date_alim';");
 $db->close;
 while($resulte_alim_det = $sql_alim_det->fetch_assoc()):
 $deti_alim =$resulte_alim_det['SUM(aliments)'];

endwhile;
	 $deti_alim_ready = $deti_alim;
	
//Расчеты


if(isset($_POST['prim'])){

//Наш коэффициент ставки с разрядом
$koeff_stavki_ready =  $koeff_stavki / $sr_norma_rab_vr;
$koeff_s_razryadom = $koeff_stavki_ready * $razryad_rabotnika_coeff;
}

//Получем коэффициент повышения ставки
$coeff_povish_ready = $coeff_povish * 0.01 * $koeff_s_razryadom ;
//Получем коэффициент контрактной надбавки
$cont_nadbav_ready = $kont_nadbav * 0.01;
//Получем коэффициент КН разряда 2 этап
$cont_nadbav_ready_two = $koeff_s_razryadom * $cont_nadbav_ready;
//Получем часовую ставку нужного нам работника
$chasovaya_stavka_nujnogo_rabotnika =  $koeff_s_razryadom + $coeff_povish_ready + $cont_nadbav_ready_two;
//Оплата по тарифу все часы по факту
$oplata_po_tarifu = $chasov_vsego * $chasovaya_stavka_nujnogo_rabotnika;
//Получем премию 
$premia_rabotnika = $oplata_po_tarifu * $premia_cof_ready;
//Получем за выслугу лет
$za_vislugu_let = $oplata_po_tarifu * $staj_koeff_ready;
//получаем за сложность и напреженность
$za_slojnost_i_naprejennost = $slojnost_i_naprejennost_coeff_ready * $oplata_po_tarifu;
//Получем всего дней
$vsego_dnei_fact = $chasov_vsego / 8 ;
//Получем за профмастерство
$polychaem_Za_profmasterstvo = $koeff_profmasterstva_ready * $oplata_po_tarifu;
//Получаем  оплату за вредность
$vrednie_uslov_nadbavka = $koeff_uslov_truda * $koeff_stavki_ready;
//Получаем за вредность
$vrednie_uslov_nadbavka_polnost = $vrednie_uslov_nadbavka * $chasov_vsego;

//Получаем норму раб времени по текущему месяцу
$norma_rab_vrem_v_chasah = $norma_dnei_mesyac * 8;

if($chasov_vsego < $norma_rab_vrem_v_chasah OR $chasov_vsego == $norma_rab_vrem_v_chasah)
{
	$sverhurochnie_chasy = 0;
}


if($chasov_vsego > $norma_rab_vrem_v_chasah)
{
	$sverhurochnie_chasy = $chasov_vsego - $norma_rab_vrem_v_chasah - $chasov_vsego_vihodnih_e;
}
//Вычисляем оплату за выходные и праздничные дни
$oplata_za_vihodnie = ($chasov_vsego_vihodnih_e+$chasov_vsego_prazdnichnih) * ($koeff_s_razryadom+($cont_nadbav_ready_two*$koeff_s_razryadom));

//Вычисляем оплату за сверхурочных
$oplata_za_sverhurochn = $chasovaya_stavka_nujnogo_rabotnika * $sverhurochnie_chasy;

//Вычисляем оплату за ночные
$dnei_nochnih = $chasov_vsego_nochnih_e / 8;
$oplata_za_nochnie = $chasov_vsego_nochnih_e * ($koeff_s_razryadom+($cont_nadbav_ready_two*$koeff_s_razryadom)); 







$nachisleno = $oplata_po_tarifu +
$premia_rabotnika+$za_vislugu_let
+$za_slojnost_i_naprejennost+
$polychaem_Za_profmasterstvo+
$vrednie_uslov_nadbavka+
$oplata_za_nochnie+
$oplata_za_sverhurochn+
$oplata_za_vihodnie

;	




 if($nachisleno > $min_zp)
 {
	$doplata_ot_mzp = 0;
$nachisleno_s_index = $doplata_ot_mzp + $nachisleno;	
 }


if ($nachisleno < $min_zp)
{
	
	if($vsego_dnei_fact < $norma_dnei_mesyac)
	{
$doplata_ot_mzp = 0;

$nachisleno_s_index = $doplata_ot_mzp + $nachisleno;

	}
	
	if($vsego_dnei_fact > $norma_dnei_mesyac OR $vsego_dnei_fact == $norma_dnei_mesyac)
	{
$doplata_ot_mzp = $min_zp - $nachisleno;

$nachisleno_s_index = $doplata_ot_mzp + $nachisleno;

	}

}	
	

// BUHGALTERIA

//Вычисляем пенсионный фонд
$summ_pension_fond = $nachisleno_s_index * 0.01;
//Вычисляем сумму профвзноса
$summ_profvznosa = ($profzouz_koeffic_ready * 0.01) * $nachisleno_s_index;
	
//Вычеты налога
if($nachisleno_s_index < $sum_for_sravn_vichet_ready)
{
	
	if($id_deti_ready == 0){
		
		$vichet_s_naloga = $vichet_fiz_lico_for_zp_ready;
	}
	
	if($id_deti_ready == 1){
		
		$vichet_s_naloga = $if_one_kinder_ready +$vichet_fiz_lico_for_zp_ready;
	}
	
	if($id_deti_ready == 2 OR $id_deti_ready > 2){
		
		$vichet_s_naloga = ($if_two_kinders_ready * $id_deti_ready)+$vichet_fiz_lico_for_zp_ready ;
	}
	
}

if($nachisleno_s_index > $sum_for_sravn_vichet_ready){
	
	
	if($id_deti_ready == 0){
		
		$vichet_s_naloga = 0;
	}
	
	if($id_deti_ready == 1){
		
		$vichet_s_naloga = $if_one_kinder_ready;
	}
	
	if($id_deti_ready > 1){
		
		$vichet_s_naloga = ($if_two_kinders_ready * $id_deti_ready)+$vichet_fiz_lico_for_zp_ready ;
	}
	
	
}

//Вычисляем налог
$vichisl_nalog = ($nachisleno_s_index - $vichet_s_naloga)* $nalog_podohodni_ready;

if($vichisl_nalog < 0){
	$vichisl_nalog = 0;
}

//Алименты


  if($deti_alim_ready == 0){
	
	$raschet_alimenta = 0;
	$perehod_dolg = 0;
}
	
	
	
	
if($deti_alim_ready == 1)	{
	$tret_zp = 0.3 * $nachisleno_s_index;
//$razchet_zp = $nachisleno_s_index - $raschet_alimenta;
	
	$raschet_alimenta = $koeff_na_odnogo_reb_alim_ready * ($nachisleno_s_index - $vichisl_nalog - $summ_profvznosa); 
	$pbpm = $budjet_proj * 0.5;
	
	
	
	if($raschet_alimenta < $pbpm)
{
$raschet_alimenta = $nachisleno_s_index - $vichisl_nalog - $summ_profvznosa - $tret_zp;
//$razchet_zp = ($nachisleno_s_index - $vichisl_nalog - $summ_profvznosa - $raschet_alimenta;
$perehod_dolg = $pbpm - $raschet_alimenta;
}
if($raschet_alimenta > $pbpm)
{	
$raschet_alimenta = $pbpm;
$razchet_zp = ($nachisleno_s_index - $vichisl_nalog-$summ_profvznosa) - $pbpm;
$perehod_dolg = 0;
}
	
	
	
	
	
	
}	
	 

if($deti_alim_ready > 1){
	$tret_zp = 0.3 * $nachisleno_s_index;
$razchet_zp = $nachisleno_s_index - $raschet_alimenta;
		$raschet_alimenta = $koeff_na_two_reb_alim_ready * ($nachisleno_s_index - $vichisl_nalog - $summ_profvznosa);
	$pbpm = $budjet_proj * 0.75;
	$perehod_dolg = 0;
	
		if($raschet_alimenta < $pbpm)
{
$raschet_alimenta = $nachisleno_s_index - $vichisl_nalog - $summ_profvznosa - $tret_zp;
//$razchet_zp = ($nachisleno_s_index - $vichisl_nalog - $summ_profvznosa - $raschet_alimenta;
	$perehod_dolg = $pbpm - $raschet_alimenta;
}
if($raschet_alimenta > $pbpm)
{	
$raschet_alimenta = $pbpm;
$razchet_zp = ($nachisleno_s_index - $vichisl_nalog-$summ_profvznosa) - $pbpm;
$perehod_dolg = 0;
}
	
	
	
	
	}	





	
//Вычисляем удержание всего
$vsego_uderjano = $raschet_alimenta+$summ_profvznosa+$summ_pension_fond+$vichisl_nalog;
//На руки
$zp_na_ruki = $nachisleno_s_index - $vsego_uderjano; 

?>