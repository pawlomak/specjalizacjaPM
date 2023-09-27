<?php
require_once dirname(__FILE__).'/../config.php';

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$z = $_REQUEST ['z'];


if ( ! (isset($x) && isset($y) && isset($z))) {
	$messages [] = 'Brak jednego z parametrów.';
}

if ( $x == "") {
	$messages [] = 'Nie podano kwoty pożyczki';
}
if ( $y == "") {
	$messages [] = 'Nie podano oprocentowania';
}
if ( $y == "") {
	$messages [] = 'Nie podano okresu spłaty';
}

if (empty( $messages )) {
	
	if (! is_numeric( $x )) {
		$messages [] = 'Kwota pożyczki nie jest liczbą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $z )) {
		$messages [] = 'Okres spłaty nie jest liczbą całkowitą';
	}	

	if ( $x < 0) {
		$messages [] = 'Kwota pożyczki musi być liczbą dodatnią';
	}
	if ( $y < 0) {
		$messages [] = 'Oprocentowanie musi być liczbą dodatnią';
	}
	if ( $y < 0) {
		$messages [] = 'Okresu spłaty musi być liczbą dodatnią';
}
}

if (empty ( $messages )) {
	
	//konwersja parametrów na int
	$x = intval($x);
	$y = intval($y);
	$z = intval($z);

	$lata = $z/12;
	$opr = $y/100;

$result = $x + ($x*$opr*$lata);
 }

include 'calc_view.php';