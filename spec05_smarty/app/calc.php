<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/Smarty.class.php';

//Rozpoczęcie definiowania funkcji 
function getParams(&$kw, &$op, &$os){
	$kw = isset($_REQUEST ['kw'])? $_REQUEST ['kw']: null;
	$op = isset($_REQUEST ['op'])? $_REQUEST ['op']: null;
	$os = isset($_REQUEST ['os'])? $_REQUEST ['os']: null;
	
}

function validate(&$kw, &$op, &$os, &$messages) {
	if ( ! (isset($kw) && isset($os) && isset($op))) {
		return false;
	}

	if ( $kw == "") {
		$messages [] = 'Nie podano kwoty pożyczki';
	}
	if ( $op == "") {
		$messages [] = 'Nie podano oprocentowania';
	}
	if ( $os == "") {
		$messages [] = 'Nie podano okresu spłaty';
	}
	
	if (count ( $messages ) != 0) return false;
		
		if (! is_numeric( $kw )) {
			$messages [] = 'Kwota pożyczki nie jest liczbą';
		}
		
		if (! is_numeric( $op )) {
			$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
		}	
		if (! is_numeric( $os )) {
			$messages [] = 'Okres spłaty nie jest liczbą całkowitą';
		}	
	
		if ( $kw < 0) {
			$messages [] = 'Kwota pożyczki musi być liczbą dodatnią';
		}
		if ( $op < 0) {
			$messages [] = 'Oprocentowanie musi być liczbą dodatnią';
		}
		if ( $os < 0) {
			$messages [] = 'Okresu spłaty musi być liczbą dodatnią';
		}
			if (count ( $messages ) != 0) return false;
	else return true;
	
		
}


function process(&$kw, &$op, &$os, &$messages, &$result){
	$kw = intval($kw);
	$os = intval($os);
	$op = floatval($op);

	$lata = $op/12;
	$opr = $os/100;

	$result = $kw + ($kw*$opr*$lata);
}

$kw = null;
$os = null;
$op = null;
$result = null;
$messages = array();

getParams($kw, $op, $os);
	if(validate($kw, $op, $os, $messages)) {
		process($kw, $op, $os, $messages, $result);
	}
	

	$smarty = new Smarty();

	$smarty->assign('app_url',_APP_URL);
	$smarty->assign('root_path',_ROOT_PATH);
	$smarty->assign('page_title','Spec 04');
	$smarty->assign('page_description','Strona tworzona przez Pawła Makówka na potrzeby specjalizacji w klasie 5 Technikum');
	$smarty->assign('page_header','Kalkulator Kredytowy');
	$smarty->assign('page_description','Tutaj obliczysz ratę swojego kredytu');
	
	//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
	$smarty->assign('result',$result);
	$smarty->assign('messages',$messages);
	
	// 5. Wywołanie szablonu
	$smarty->display(_ROOT_PATH.'/app/calc.html');