<?php
	require_once 'fcmphp.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>FCM bemutatása</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>	
		<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
		<link rel="stylesheet" type="text/css" href="css/960.css">
		<link rel="stylesheet" type="text/css" href="css/kezdolap.css">
	</head>
	<body>
		<div id="Container">
			<header>
				<div>
					<a id="title" href="kezdolap.php" style="text-decoration:none">FCMDev.hu</a>
				</div>
				<nav>
					<a class="nav-link" id="kezdolap" href="kezdolap.php">Kezdőlap</a>
					<a class="nav-link" id="fcm" href="fcm.php" style="text-decoration: underline;">FCM bemutatása</a>
					<a class="nav-link" id="linkek" href="linkek.php">Linkek</a>
					<a class="nav-link" id="login" href="login.php"><?php echo $name?></a>
				</nav>
			</header>
		</div>
		<div id="Page" class="row container_12">
			<h1 class="grid_12 col-12">Mi az a Fuzzy Kognitív Térkép?</h1>
			<div class="grid_6 col-12" style="text-align: justify">
				<p>Robert Axelrod politikai tudós mutatta be a kognitív térképeket társadalmi tudományok ábrázolására. (1976) A kognitív térkép egy irányított gráf. A következő kép egy ilyen kognitív térképet mutat be:</p>
				<p>Később Bart Kosko bővítette ki Axelrod elméletét a Fuzzy Kognitív Térképekig. Az FCM is szintén egy gráf, amelynek csúcsai komponensek állapotát adják meg. A komponenseket általában C-vel jelölik, így <b>$$C =  \{C_1, C_2, C_3...C_n\}$$</b> halmaz adja meg a csúcsokat, ahol n a komponensek (conceptek) száma.
				A gráfok élei kapcsolati súlyokkal ellátottak. Ci és Cj komponensek közötti kapcsolati súlyt így határozzuk meg: <b>$$W:(C_i,C_j)->W{_i}{_j}$$</b> A kapcsolati súlyok értéke <b>[-1,1]</b> intervallumba esik.</p>
				<p>Pozitív kapcsolati súly esetén az egyik komponens erősíteni fogja a másikat (tfh. itt Ci erősíti Cj-t), ellenkező esetben a komponensek gyengíteni fogják egymást. Előfordulhat, hogy a kapcsolati súly zérus lesz, ez a kapcsolat hiányára utal. Az FCM következő lépése, hogy kiszámítja az aktiváció mértékét <b>$$t(t=1,2..,T)$$</b> időpontban <b>$$A:(C_i)->A_i^{(t)}$$</b> függvény segítségével.
				A küszöbfüggvény gondoskodik arról, hogy ezen aktivációs értékek [-1,1] intervallumban maradjanak. Ezek által az FCM-ek <b>$$M = (C,W,A,f)$$</b> négyessel leírhatók.</p>
				<p>Az oldal által használt küszöbfüggvény a szigmoid küszöbfüggvény: <b>$$ f(x) = {1\over 1 + e^{-{\lambda}x}}$$<b></p>
				<p><p>
			</div>
			<div class="grid_6" style="text-align:center;">
				<image src="axelrod.png"></image>
			</div>
			<div class="grid_12">
				<ul class="grid_5">Az FCM modellek kellő számú t időpillanat után háromféle eredményt mutathatnak:
					<li style="margin-top: 10px;">fixpontba kerül (egyensúlyi vagy stabil állapotba)</li>
					<li>határciklusba kerül</li>
					<li>kaotikus viselkedést mutat.</li>
				</ul>
				<ul class="grid_5">A conceptek is háromféleképpen csoportosíthatók:
					<li style="margin-top: 10px;">bemeneti concept (más concept állapotát befolyásolja)</li>
					<li>kimeneti concept (más concept befolyásolja az ő állapotát)</li>
					<li>köztes concept (amikor mindkettő igaz rá)</li>
				</ul>
			</div>
			<div class="grid_12" style="text-align: center;"><p>A Fuzzy Kognitív Térképekről leírtak megtalálhatók és letölthetőek a Linkek menüpont alatt.<br>A Bejelentkezés menüpontnál autentikáció után saját magunk is hozhatunk létre szimulációkat!</br></p>
		</div>
	</body>
</html>