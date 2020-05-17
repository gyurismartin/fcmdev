<?php
	require_once 'fcmphp.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Kezdőlap</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="css/kezdolap.css">
		<link rel="stylesheet" type="text/css" href="css/960.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
	</head>
	<body>
		<div id="Container">
			<header class="row">
				<div class="col-md-12">
					<a id="title" href="kezdolap.php" style="text-decoration:none">FCMDev.hu</a>
				</div>
				<nav class="col-md-12">
					<a class="nav-link" id="kezdolap" href="kezdolap.php" style="text-decoration: underline;">Kezdőlap</a>
					<a class="nav-link" id="fcm" href="fcm.php">FCM bemutatása</a>
					<a class="nav-link" id="linkek" href="linkek.php">Linkek</a>
					<a class="nav-link" id="login" href="login.php"><?php echo $name?></a>
				</nav>
			</header>
		</div>
		<div id="Page" class="row container_12">
			<h1 id="bemutatkozas" class="col-md-12 grid_12 col-12">Bemutatkozás</h1>
			<p id="bemutatkozo" class="col-md-12 grid_12 col-12">Köszöntelek az fcmdev.hu oldalon!</p>
			<p id="szoveg" class="col-md-12 grid_12 col-12">Ez a weboldal egy szakdolgozat eredményeként jött létre.
			A szakdolgozat témája a Fuzzy Cognitive Map modellek.</p>
			<div id="content" class="grid_6 col-md-12 col-12">
				<p id="celok">A weboldal céljai:</p>
				<ul id="felsorolas">
					<li>bemutassa a Fuzzy Cognitive Map modelleket</li>
					<li>témába vágó cikkekhez, értekezésekhez nyújtson könnyed elérési utat</li>
					<li>egyszerű szimulációk lefuttattása</li>
				</ul>
			</div>
			<div id="image" class="grid_6 animated fadeInRight col-md-12 col-12" style="animation-duration: 2s;animation-name: fadeInRight;">
				<img src="images/A-simple-Fuzzy-Cognitive-Map.png" style="border: solid 2px #cccccc"></img>
			</div>
			<div id="function-list" class="grid_12 col-md-12 col-12">
				<div id="functions" class="grid_4 animated fadeInUp col-md-12" style="animation-duration: 2s;animation-name: fadeInUp;">
					<h1 style="margin-bottom: 10px">FCM bemutatása</h1>
					<div id="function-description">
						<a href="fcm.php" style="text-decoration: none;color: black">Erre a szövegre kattintva vagy a jobb felső menüsoron az FCM bemutatása feliratra kattintva egy rövid bemutatást talál a Fuzzy Kognitív Térképekről.</a>
					</div>
				</div>
				<div id="functions" class="grid_4 animated fadeInUp col-md-12 col-12" style="animation-duration: 2s;animation-name: fadeInUp;">
					<h1 style="margin-bottom: 10px">Linkek</h1>
					<div id="function-description">
						<a href="linkek.php" style="text-decoration: none;color: black">Az FCM bemutatása oldal leegyszerűsített és rövid bemutatását kibővíteni vágyóknak itt megtalálható egy pár szakirodalom az FCM-ekről, amelyek letölthetők PDF formátumban. Illetve további anyagok is találhatók, melyek a segítségünkre lehetnek.</a>
					</div>
				</div>
				<div id="functions" class="grid_4 animated fadeInUp col-md-12 col-12" style="animation-duration: 2s;animation-name: fadeInUp;">
					<h1 style="margin-bottom: 10px">Bejelentkezés</h1>
					<div id="function-description">
						<a href="login.php" style="text-decoration: none;color: black">Ide kattintva vagy jobb felül a bejelentkezésre kattintva elérhetővé válik egy autentikációs folyamat, ezután lehetőségünk lesz saját szimulációk futtatására.</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>