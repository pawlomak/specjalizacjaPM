<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="get">
	<label for="id_kw">Podaj kwotę pożyczki: </label>
	<input id="id_kw" type="number" name="kw" value="<?php out($kw); ?>" /><br />

	<label for="id_op">Oprocentowanie: </label>
	<input id="id_op" type="number" name="op" value="<?php out($op); ?>" min="0,1" max="100" /><br /><br />
	
	<label for="id_os">Podaj czas spłaty w miesiącach: </label>
	<input id="id_os" type="number" name="os" value="<?php out($os); ?>" /><br />
	
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count( $messages ) > 0) {
		echo '<ol style="margin: 15px; padding: 8px 8px 8px 25px; border-radius: 6px; background-color: red; width:350px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 15px; padding: 8px; border-radius: 6px; background-color: yellow; width:350px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</body>
</html>