<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>

<h3>Prosty kalkulator</h2>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="get">
								<fieldset>
								<label for="id_kw">Podaj kwotę pożyczki: </label>
								<input id="id_kw" type="number" name="kw" value="<?php out($kw); ?>" /><br />

								<label for="id_op">Oprocentowanie: </label>
								<input id="id_op" type="number" name="op" value="<?php out($op); ?>" min="0,1" max="100" /><br /><br />
	
								<label for="id_os">Podaj czas spłaty w miesiącach: </label>
								<input id="id_os" type="number" name="os" value="<?php out($os); ?>" /><br />
								</fieldset>	
								<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
							</form>	

<div class="messages">

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
	echo '<h4>Wystąpiły błędy: </h4>';
	echo '<ol class="err">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php
//wyświeltenie listy informacji, jeśli istnieją
if (isset($infos)) {
	if (count ( $infos ) > 0) {
	echo '<h4>Informacje: </h4>';
	echo '<ol class="inf">';
		foreach ( $infos as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
	<h4>Wynik</h4>
	<p class="res">
<?php print($result); ?>
	</p>
<?php } ?>

</div>

<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>