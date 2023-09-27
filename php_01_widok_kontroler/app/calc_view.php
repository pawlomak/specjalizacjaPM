<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="get">
	<label for="idx">Podaj kwotę pożyczki: </label>
	<input id="idx" type="number" name="x" value="<?php isset($x) ?print($x): ""; ?>" /><br />

	<label for="idy">Oprocentowanie: </label>
	<input id="idy" type="number" name="y" value="<?php isset($y) ?print($y): ""; ?>" min="0,1" max="100" /><br /><br />
	
	<label for="idz">Podaj czas spłaty w miesiącach: </label>
	<input id="idz" type="number" name="z" value="<?php isset($z) ?print($z): ""; ?>" /><br />
	
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