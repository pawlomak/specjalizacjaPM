<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="index.html">Alpha</a> by HTML5 UP</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>

							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2>Kalkulator kredytowy</h2>
					<p>Najprostszy sposób aby wyliczyć ratę swojego kredytu.</p>
					<ul class="actions special">
					</ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Logowanie</h2>
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
						</header>
						<?php
							if (isset($messages)) {
								if (count ( $messages ) > 0) {
									echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
									foreach ( $messages as $key => $msg ) {
										echo '<li>'.$msg.'</li>';
									}
									echo '</ol>';
								}
							}
							?>

							<?php if (isset($result)){ ?>
							<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
							<?php echo 'Wynik: '.$result; ?>
							</div>
							<?php } ?>
					</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>