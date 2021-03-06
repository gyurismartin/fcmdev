<?php
	require 'torol.php';
	require_once 'fcmphp.php';
?>   

<!DOCTYPE html>

<html>
	<head>
        <title>FCM létrehozása</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript" src="remove.js"></script>
		<script type="text/javascript" src="selectAll.js"></script>
		<script type="text/javascript" src="tomeges.js"></script>
		<script type="text/javascript" src="bead.js"></script>
		<script type="text/javascript" src="maxszimulal.js"></script>
		<script type="text/javascript" src="tobb.js"></script>
		<script type="text/javascript" src="szimulal.js"></script>
		<script type="text/javascript" src="random.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/fcm.css">
		<link rel="stylesheet" type="text/css" href="css/960.css">
		<link rel="stylesheet" type="text/css" href="css/kezdolap.css">
    </head>
	<body>
		<div id="Container">
			<header>
				<div id="titlediv">
					<a id="title" href="kezdolap.php" style="text-decoration:none">FCMDev.hu</a>
				</div>
				<nav>
					<a class="nav-link" id="kezdolap" href="kezdolap.php">Kezdőlap</a>
					<a class="nav-link" id="fcm" href="fcm.php">FCM bemutatása</a>
					<a class="nav-link" id="linkek" href="linkek.php">Linkek</a>
					<a class="nav-link" id="logoff" href="logout.php">Kijelentkezés</a>
					<a class="nav-link" id="login" style="text-decoration: underline;"><?php echo $name?></a>
				</nav>
			</header>
		</div>
		<div id="container-login100" class="container-login100 container_12">
			<div id="funkcio-gombok">
				<header id="funkcio-header">
					<div class="dropdown">
					  <button class="dropbtn">Funkciók</button>
					  <div class="dropdown-content">
						<a id="ujszim" href="szimulacio.php">Új szimuláció</a>
						<a id="fajl" href="#fajldiv">Fájl feltöltése</a>
						<a id="mtr" href="#mtrdiv">Mátrix</a>
						<a id="szim" href="#szimdiv">Eredmények</a>
						<a id="megosztas" href="#megosztasdiv">Megosztás</a>
					  </div>
					</div>
					<nav id="funkcio-nav">
						<a class="funkcio-a" id="ujszim" href="szimulacio.php">Új szimuláció</a>
						<a class="funkcio-a" id="fajl" href="#fajldiv">Fájl feltöltése</a>
						<a class="funkcio-a" id="mtr" href="#mtrdiv">Mátrix</a>
						<a class="funkcio-a" id="szim" href="#szimdiv">Eredmények</a>
						<a class="funkcio-a" id="megosztas" href="#megosztasdiv">Megosztás</a>
					</nav>
				</header>
			</div>
			<div id="mtrdiv" class="content row active" style="position: relative;top: 30px;">
				<div class="col-lg-12 col-md-12 col-sm-12 text-center">
					<p>Mekkora mátrixot szeretne létrehozni?</p>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 text-center">
					<input type="number" required id="num1" style="border: 1px solid black;margin-right: 10px">
					<button id="btn" type="submit" onclick="tableCreate()">Mátrix létrehozása</button>
				</div>
				<p id="selecttext" style="display: none">A szimulálni kívánt kezdeti állapotok:</p>
				<select id="mySelect" style="display: none">
					<option value=0>0</option>
					<option value=0.25>0.25</option>
					<option value=0.5>0.5</option>
					<option value=0.75>0.75</option>
					<option value=1>1</option>
				</select>
				<input id="removebtn" type="image" onclick="remove()" src="images/red-x.png" style="display: none"></input>
				<div id="btndiv" style="width: 100%;text-align: center;display:none">
					<button id="tbtn" onclick="tobb()">Érték a kezdeti állapotokhoz</button>
					<button id="randombtn" onclick="random()">Véletlenszerű értékek generálása</button>
					<button id="tomegesbtn" onclick="tomeges()">Tömeges kezdeti állapot bevitel</button>
				</div>
				<form id="mtrform" action="javascript:szimulal()"></form>
			</div>
			<div id="fajldiv" class="content row">
				<form id="upload" class="col-lg-12 col-md-12 col-sm-12 text-center" action="feltolt.php" method="post" enctype="multipart/form-data" style="padding-top: 10px">
					Válassza ki a fájlt a feltöltéshez:
					<input class="up" type="file" name="fileToUpload" id="fileToUpload">
					<button id="adatok" type="submit">Adatok megadása fájlból</button>
					<p style="padding-top: 20px">A fájl megfelelő kitöltése a következő:</p>
					<div class="imageContainer">
						<img id="myImg" src="images/FCM_sample.jpg" alt="FCM példa" style="width:100%;max-width:100px">

						<!-- The Modal -->
						<div id="myModal" class="modal">

							<!-- The Close Button -->
							<span class="close">&times;</span>

							<!-- Modal Content (The Image) -->
							<img class="modal-content" src="images/FCM_sample.jpg" id="img01" alt="FCM példa">

							<!-- Modal Caption (Image Text) -->
							<div id="caption"></div>
						</div>
					</div>
				</form>
			</div>
			<div id="szimdiv" class="content row">
				<div id="btndiv2" style="width: 100%;text-align: center;"></div>
			</div>
			<div id="megosztasdiv" class="content row">
				<form id="mailform" class="login100-form col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 justify-content-center">
					<span class="txt1">
						E-mail cím:
					</span>
					<div class="wrap-input100 validate-input d-flex justify-content-center">
						<input class="input100" type="email" id="email" name="email" style="width:400px;text-align:center">
						<span class="focus-input100"></span>
					</div>
					<span class="txt2">
						Tárgy:
					</span>
					<div class="wrap-input100 validate-input d-flex justify-content-center">
						<input class="input100" id="subject" name="subject" style="width:400px;text-align:center">
						<span class="focus-input100"></span>
					</div>
					<span class="txt2">
						Üzenet:
					</span>
					<div class="wrap-input100 validate-input d-flex justify-content-center">
						<textarea class="input100" id="message" name="message" rows="10" cols="60"></textarea>
						<span class="focus-input100"></span>
					</div>
					<div style="margin-top:10px;fontSize: 20px">
						<label style="width: 100%">Eredmények küldése
							<input type="checkbox" id="eredmenykuldes" name="eredmenykuldes" checked="checked" style="height: 20px;width: 20px;margin-left: 10px;position: absolute"></input>
						</label>
						<label style="width: 100%">Kiindulási adatok küldése
							<input type="checkbox" id="kiindulasikuldes" name="kiindulasikuldes" style="height: 20px;width: 20px;margin-left: 10px;position: absolute"></input>
						</label>
					</div>
					<div class="container-signin d-flex justify-content-center" style="margin-bottom: 10px;margin-top: 10px">
						<button class="signin" name="signin" id="btn">Küldés</button>
					</div>
				</form>
			</div>
		</div>
		<script>
			var myForm = document.getElementById("mailform");
					
			myForm.addEventListener("submit", (e) => {
				e.preventDefault();
						
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.open("POST","mail.php", true);
				xmlhttp.onload = function () {
					alert(xmlhttp.responseText);
				}
				xmlhttp.send(new FormData(myForm));
			});
			$(function() {
			  $('.container-login100 > div > header > div > div > a').on('click', function() {
				var e = (this).id;
				var divs = ["fajldiv","mtrdiv","szimdiv","megosztasdiv"];
				jQuery.each(divs, function (i, val){
					if($("#" + val).hasClass("active") && $("#" + val).id != e + "div"){
						$("#" + val).removeClass("active");
					}
				});
				$("#" + e + "div").addClass('active');
			  });
			});
			$(function() {
			  $('.container-login100 > div > header > nav > a').on('click', function() {
				var e = (this).id;
				var divs = ["fajldiv","mtrdiv","szimdiv","megosztasdiv"];
				jQuery.each(divs, function (i, val){
					if($("#" + val).hasClass("active") && $("#" + val).id != e + "div"){
						$("#" + val).removeClass("active");
					}
				});
				$("#" + e + "div").addClass('active');
			  });
			});
			// Get the modal
            var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
			window.chartColors = {
				red: 'rgb(255, 99, 132)',
				orange: 'rgb(255, 159, 64)',
				yellow: 'rgb(255, 205, 86)',
				green: 'rgb(124, 252, 0)',
				blue: 'rgb(54, 162, 235)',
				purple: 'rgb(153, 102, 255)',
				grey: 'rgb(201, 203, 207)'
			}
			
			window.adat = <?php echo json_encode($adats) ?>;
			var n = <?php echo json_encode($num) ?>;
			n = parseFloat(n);
			
			var element = document.getElementById("num1");
			element.setAttribute("value",n);
			
			window.init = new Array();
			window.segedtabla = new Array(5);
			
			var szamlalo = 1;
			var index = 0;
			var stabil = 0;
			var hatarciklus = 0;
			var nemstabil = 0;
			var seged = 2;
			var segedint = 0;
			var darabseged = 0;
			window.eredmenyek = [];
			window.osszes = [];
			window.fixponttomb = [];
			const c = [];
			window.fixpontok = [];
			const fixertekek = [];
			
			function kepletoltes(){
				var myCanvas = document.getElementById("newChart");
				
				const a = document.createElement("a");
				document.body.appendChild(a);
				a.href = myCanvas.toDataURL("image/png");
				a.download = "canvas-image.png";
				a.click();
				document.body.removeChild(a);
			}
			function kepletoltes2(){
				var myCanvas = document.getElementById("newChart2");
				
				const a = document.createElement("a");
				document.body.appendChild(a);
				a.href = myCanvas.toDataURL("image/png");
				a.download = "canvas-image.png";
				a.click();
				document.body.removeChild(a);
			}
			function kepletoltes3(clicked_id){
				var myCanvas = document.getElementById("myChart"+clicked_id);
				
				const a = document.createElement("a");
				document.body.appendChild(a);
				a.href = myCanvas.toDataURL("image/png");
				a.download = "canvas-image.png";
				a.click();
				document.body.removeChild(a);
			}
			function eredmenymentes(){
				for(var i=0;i<window.osszes.length;i++){
					window.osszes[i].splice(0,0,[(i+1) + ". szimulacio"]);
					var eredmenytomb = JSON.stringify(window.osszes[i]);
					
					xmlhttp = new XMLHttpRequest();
					xmlhttp.open("POST","ment.php", true);
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.send("eredmenyek=" + eredmenytomb);
				}

			}
			function mentesfunction(){
				var number = document.getElementById("num1").value;
				number = parseFloat(number);	
				var lambda = document.getElementById("lambda").value;
				lambda = parseFloat(lambda);
				var t = document.getElementById("timeinput").value;
				t = parseFloat(t);
				
				var alapinfo = [["NxN:",number],["Lambda:",lambda],["Time:",t]];
				
				alapinfo = JSON.stringify(alapinfo);
				window.init.splice(0, 0, ["Kezdeti allapotok"]);
				var mentve = JSON.stringify(window.init);
				window.matrix.splice(0, 0, ["Kapcsolati matrix"]);
				console.log(window.matrix);
				var kapcsolatimatrix = JSON.stringify(window.matrix);
				
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("POST","ment_adatok.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("alapinfo=" + alapinfo);
				
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("POST","ment_adatok.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("kapcsolatimatrix=" + kapcsolatimatrix);
				
				xmlhttp = new XMLHttpRequest();
				xmlhttp.open("POST","ment_adatok.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("mentve=" + mentve);
			}
			function ujrakezd(){
				var resp = confirm("A gomb lenyomása az összes adat elvesztésével jár. Folytatja?");
				if (resp === true){
					location.href="fcm.php";
				}
				<?php unset($_SESSION['adat']) ?>;
			}
			function tableCreate() {
                //number of rows and columns
				var number = 0;
				if (window.adat === 1) {
					var session = <?php echo json_encode($lines) ?>;
					number = session[0][1];
					number = parseFloat(number);
					var element = document.getElementById("num1");
					element.setAttribute("value",number);
				}
				else{
					number = document.getElementById("num1").value;
					number = parseFloat(number);
                }
				number = document.getElementById("num1").value;
				number = parseFloat(number);
                if(number>=2 && Number.isInteger(number) === true){
                
                var ha = document.getElementById("num1");
                ha.setAttribute("readonly","readonly");
                var ertek = 0;
				for(var j=0;j<5;j++){
					window.segedtabla[j] = new Array(number);
					for(i=0;i<number;i++){
						window.segedtabla[j][i] = ertek;
					}
					ertek += 0.25;
				}
                //body reference 
                var body = document.getElementById("container-login100");
                // create elements <table> and a <tbody>
                var tbl1 = document.createElement("table");
                var tblBody = document.createElement("tbody");
                var fodiv = document.createElement("div");
                body.appendChild(fodiv);
                fodiv.setAttribute("id","fodiv");
                fodiv.style.position = "relative";
                fodiv.style.width = "100%";
				window.form = document.createElement("form");
				form.setAttribute("id","form");
				form.setAttribute("action","javascript:szimulal()");
				window.formdiv = document.createElement("div");
				formdiv.setAttribute("id","formdiv");
				formdiv.style.display = "inline-block";
				formdiv.style.width = "100%";
                // cells creation
                for (var j = 0; j < number + 1; j++) {
                    // table row creation
                    var row = document.createElement("tr");

                    for (var i = 0; i < number + 1; i++) {
                        // put <td> at end of the table row
                        if(j===0 && i===0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("Kapcsolati mátrix");
                            
                            cell.appendChild(cellText);
                        }
                        else if (j===i){
                            var cell = document.createElement("td");
							var input = document.createElement("input");

							cell.appendChild(input);
							input.setAttribute("id","mtr"+j+i);
							input.style.border = "none";
							input.style.backgroundColor = "#f4f4f4";
							input.setAttribute("type","number");
							input.setAttribute("step","any");
							input.setAttribute("min","-1");
							input.setAttribute("max","1");
							input.setAttribute("required","");
							input.style.width = "50px";
							if(window.adat === 1){
								if(j<=n){
									input.setAttribute("value",session[j+4][i]);
								}
							}	
                        }
                        else if (i===0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("C"+j);
                            
                            cell.appendChild(cellText);
                        }
                        else if (j===0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("C"+i);
                            
                            cell.appendChild(cellText);
                        }
                        else{
							var cell = document.createElement("td");
							var input = document.createElement("input");

							cell.appendChild(input);
							input.setAttribute("id","mtr"+j+i);
							input.style.border = "none";
							input.style.backgroundColor = "#f4f4f4";
							input.setAttribute("type","number");
							input.setAttribute("step","any");
							input.setAttribute("min","-1");
							input.setAttribute("max","1");
							input.setAttribute("required","");
							input.style.width = "50px";
							if(window.adat === 1){
								if(j<=n){
									input.setAttribute("value",session[j+4][i]);
								}
							}		
                        }
                        row.appendChild(cell);
          
                        cell.style.border = "1px solid black";
                        
                        if(i === number){
                            break;
                        }
                    }

                    //row added to end of table body
                    tblBody.appendChild(row);
                    if(j === number){
                       break;
                    }
                }

                // append the <tbody> inside the <table>
                tbl1.appendChild(tblBody);
                // put <table> in the <body>
                
                tbl1.style.border = "1px solid black";
                tbl1.style.borderCollapse = "collapse";
				
                var tablediv = document.createElement("div");
				tablediv.style.width = "100%";
				tablediv.style.float = "left";
				tablediv.style.margin = "10px 0px 0px";
				
				tablediv.appendChild(tbl1);
				
                var lambdatext = document.createElement("div");
                lambdatext.innerHTML = "Adja meg a lambda értékét!";
                document.getElementById("mtrform").appendChild(lambdatext);
                lambdatext.style.textAlign = "center";
                lambdatext.style.width = "100%";
                lambdatext.style.margin = "0px 0px 10px";
				
                var lambda = document.createElement("input");
                lambdatext.appendChild(lambda);
                lambda.setAttribute("id","lambda");
				lambda.setAttribute("type","number");
				lambda.setAttribute("step","1");
				lambda.setAttribute("required","");
				lambda.setAttribute("min","1");
                lambda.style.float = "initial";
                lambda.style.border = "1px solid black";
                lambda.style.margin = "20px 5px 10px";
				lambda.style.width = "50px";
                if(window.adat === 1){
					lambda.setAttribute("value",session[1][1]);
				}
                
                var text = document.createElement("div");
                text.innerHTML = "Adja meg az időlépések számát!";
                document.getElementById("mtrform").appendChild(text);
                text.style.textAlign = "center";
                text.style.width = "100%";
                text.style.margin = "0px 0px 0px";
                
                var timeinput = document.createElement("input");
                text.appendChild(timeinput);
                timeinput.setAttribute("id","timeinput");
				timeinput.setAttribute("type","number");
				timeinput.setAttribute("step","1");
				timeinput.setAttribute("width","50px");
				timeinput.setAttribute("required","");
				timeinput.setAttribute("min","1");
                timeinput.style.float = "initial";
                timeinput.style.border = "1px solid black";
                timeinput.style.margin = "10px 5px 0px";
				timeinput.style.width = "50px";
                if(window.adat === 1){
					timeinput.setAttribute("value",session[2][1]);
				}        
				document.getElementById("mtrform").appendChild(tablediv);
                var btn = document.getElementById("btn");
                btn.style.display = "none";
				
				var adatok = document.getElementById("adatok");
				adatok.style.display = "none";
				
				var upload = document.getElementById("upload");
				upload.style.display = "none";
				
				var szamit = document.createElement("button");
				szamit.setAttribute("id","szamit");
				szamit.setAttribute("type","submit");
				szamit.setAttribute("form","mtrform");
				szamit.textContent = "Szimuláció";
				szamit.style.margin = "10px 0px 0px";
				
				document.getElementById("selecttext").style.display = "block";
				document.getElementById("mySelect").style.display = "inline";
				document.getElementById("removebtn").style.display = "inline";
				document.getElementById("btndiv").style.display = "block";
				document.getElementById("mtrdiv").appendChild(szamit);				
            }
                else{
				   if(Number.isInteger(number) === false){
					   alert("Egész számnak kell lennie!");
				   }
				   else{
                   alert("Legalább 2 eleműnek kell lennie a mátrixnak!");
                   throw new Error("0-t nem adhat meg!");
                   }
                }
                //body reference
                var body = document.getElementsByTagName("body")[0];

                // create elements <table> and a <tbody>
                window.tbl = document.createElement("table");
                var tblBody = document.createElement("tbody");

                var fodiv = document.getElementById("fodiv");

                // cells creation
                for (var j = 0; j < number + 1; j++) {
                    // table row creation
                    var row = document.createElement("tr");

                    for (var i = 0; i < 2; i++) {
                        // put <td> at end of the table row
                        if(j===0 && i===0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("");

                            cell.appendChild(cellText);
                        }
                        else if (j===0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("Kezdeti állapotok");

                            cell.appendChild(cellText);	
                        }
                        else if (i===0 && j!==0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("C"+j);

                            cell.appendChild(cellText);
                        }
                        else{
                        var cell = document.createElement("td");
                        var input = document.createElement("input");

                        cell.appendChild(input);
                        input.setAttribute("id","initialvalue"+j);
						input.setAttribute("type","number");
						input.setAttribute("min","0");
						input.setAttribute("max","1");
						input.setAttribute("step","0.01");
						input.style.width = "100%";
						input.setAttribute("required","");
                        }
                        row.appendChild(cell);

                        cell.style.border = "1px solid black";

                        if(i === 2){
                            break;
                        }
                    }
                    //row added to end of table body
                    tblBody.appendChild(row);
                    if(j === number + 1){
                       break;
                    }
                }
                // append the <tbody> inside the <table>
                tbl.appendChild(tblBody);
				document.getElementById("mtrdiv").insertBefore(tbl, document.getElementById("btndiv"));
                // put <table> in the <body>

                tbl.style.border = "1px solid black";
                tbl.style.borderCollapse = "collapse";				
            }
            function createtimetable(lefutas){
			var details = document.createElement("details");
			details.setAttribute("id","details"+lefutas);
			var tag = document.createElement("summary");
			tag.innerHTML = lefutas+". szimuláció eredménye";
			var element = document.getElementById("lambda");
			element.setAttribute("readonly","readonly");
			element = document.getElementById("timeinput");
			element.setAttribute("readonly","readonly");
            var number = document.getElementById("num1").value;
            number = parseInt(number);
            var time = document.getElementById("timeinput").value;
            time = parseInt(time);
			var body1 = document.getElementById("container-login100");
			var diveredmeny = document.createElement("div");
			diveredmeny.setAttribute("id","diveredmeny");
			diveredmeny.setAttribute("width","100%");
			diveredmeny.setAttribute("margin-botton","10px");
			diveredmeny.style.textAlign = "center";	
			document.getElementById("szimdiv").appendChild(diveredmeny);
            //body reference 
            var body = document.getElementsByTagName("body")[0];
            document.getElementById("szimdiv").appendChild(details);
			details.appendChild(tag);
            // create elements <table> and a <tbody>
            var tbl = document.createElement("table");
            var tblBody = document.createElement("tbody");
			tblBody.setAttribute("id","tblBody"+(j+1));
            // cells creation
            for (var j = 0; j < time + 2; j++) {
                    // table row creation
                    var szam = j;
                    szam = parseInt(szam);
                    szam = szam - 1;
                    var row = document.createElement("tr");

                    for (var i = 0; i < number + 1; i++) {
                        // put <td> at end of the table row
                        if(j===0 && i===0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("Időszakaszok");
                            
                            cell.appendChild(cellText);
                        }
                        else if (j===1 && i!==0){
                            var initial = window.init[lefutas-1][i-1];
                            
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode(initial);
                            
                            cell.appendChild(cellText);
                        }
                        else if (i===0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("t"+szam);
                            cell.setAttribute("id","cell"+szamlalo+j+i);
                            cell.appendChild(cellText);
                        }
                        else if (j===0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("C"+i);
                            
                            cell.appendChild(cellText);
                        }
                        else{
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("0");
                            cell.setAttribute("id","cell"+szamlalo+j+i);
                            cell.setAttribute("value","0");
                           
                            cell.appendChild(cellText);
                            cell.style.width = "50px";
                        }
                        row.appendChild(cell);
                        
                        cell.style.border = "1px solid black";
                        
                    }

                    //row added to end of table body
                    tblBody.appendChild(row);
                    if(j === time + 1){
                       break;
                    }
                }
                // append the <tbody> inside the <table>
                tbl.appendChild(tblBody);
                // put <table> in the <body>
				details.appendChild(tbl);

                tbl.style.margin = "20px 0px 0px";
                tbl.style.borderCollapse = "collapse";
                tbl.style.allignItems = "center";
                
                var lambda = document.getElementById("lambda").value;
                lambda = parseFloat(lambda);
                
				var matrixszam = 0;
				window.matrix = new Array(number);
				for(var j=0;j<number;j++){
					matrix[j] = new Array(number);
					for (var i=0;i<number;i++){
						var k = j+1;
						var l = i+1;
						var read = document.getElementById("mtr"+k+l);
						read.setAttribute("readonly","readonly");
						matrixszam = document.getElementById("mtr"+k+l).value;
						matrixszam = parseFloat(matrixszam);
						matrix[j][i] = matrixszam;
					}
				}						
				window.eremat = new Array(number);
				for(var j=0;j<number;j++){
					window.eremat[j] = new Array(2);
				}
				window.diagram = new Array(time+2);
				for(var j=0;j<time+2;j++){
					window.diagram[j] = new Array(number);
				}
				for(var j=0;j<number;j++){
					window.diagram[0][j] = window.init[szamlalo-1][j];
				}
				var akt = 0;
				var summ = 0;
				var summary = 0;
                for (var j=2;j<time + 2;j++){
					summary = 0;
                    for (var i=1;i<number + 1;i++){
                        if (j===2){
							summ = 0;
							for(k=0;k<number;k++){
								akt=0;
								akt = matrix[k][i-1]*window.init[szamlalo-1][k];
								summ = summ + akt;
							}
							summary = 1/(1+Math.exp((-1)*lambda*summ));
							summary = summary.toFixed(2);
							var element = document.getElementById("cell"+szamlalo+j+i);
							element.innerHTML = summary;
							element.setAttribute("value",summary);
							window.eremat[i-1][0] = summary;
							window.diagram[j-1][i-1] = summary;
							window.diagram[time+1][i-1] = 1;
                        }
                        for(l=0;l<number;l++){
							eremat[l][1] = eremat[l][0];
						}
                        if(i === number){
                            break;
                        }
                    }
                    if(j === time + 1){
                       break;
                    }
                }
				
                for (var j=3;j<time + 2;j++){
					summary = 0;
                    for (var i=1;i<number + 1;i++){
						summ = 0;
						for(k=0;k<number;k++){
							akt = 0;
							akt = matrix[k][i-1] * window.eremat[k][1];
							summ = summ + akt;
						}
						summary = 1/(1+Math.exp((-1)*lambda*summ));
						summary = summary.toFixed(2);
						var element = document.getElementById("cell"+szamlalo+j+i);
                        element.innerHTML = summary;
                        element.setAttribute("value",summary);
						window.eremat[i-1][0] = summary;
						window.diagram[j-1][i-1] = summary;
						if (window.diagram[j-2][i-1] === window.diagram[j-1][i-1]){
							window.diagram[time+1][i-1] = window.diagram[time+1][i-1] + 1;
						}
						else{
							window.diagram[time+1][i-1] = 1;
						}
                    }
					for(l=0;l<number;l++){
						eremat[l][1] = eremat[l][0]
					}
            
					window.cut = 0;
					for(var k=0;k<number;k++){
						if(window.diagram[time+1][k] >= 3){
							cut = cut + 1;
						}					
					}
					if(cut===number){
						window.van = 1;
						fixponttomb[0] = new Array(number);
						fixponttomb[lefutas] = new Array(number);
						for(var n=0;n<number;n++){
							fixponttomb[0][n] = "C"+(n+1);
						}
						fixponttomb[szamlalo] = window.diagram[j-1];
						stabil = stabil + 1;
						window.break = j;
						break;
					}
                }
				if (cut!==number){
					nemstabil = nemstabil + 1;
				}
				if(j===time+2){
					window.break = j-1;
				}
                for (var k = j+1;k<time+2;k++){
                    for (var i=0; i<number+1; i++){
						var element = document.getElementById("cell"+szamlalo+k+i);
                        element.innerHTML = "";
                        element.style.border = "0px";
                    }
                }
				
				var iteration = (time+1) / 2;
				iteration = parseInt(iteration);
				
				for(var tombelem = iteration; tombelem > 1; tombelem--){
					
					var tomb = new Array(tombelem);
					for(var j=0;j<tombelem;j++){
						tomb[j] = new Array(number);
					}
					var utolsotomb = new Array(tombelem);
					for(var i=0;i<tombelem;i++){
						utolsotomb[i] = new Array(number);
					}
					for(var oszlop=0;oszlop<number;oszlop++){
						var a = 0;
						for(var s=time;s>time-tombelem;s--){
							tomb[a][oszlop] = window.diagram[s][oszlop];
							a++;
						}
						var b = 0;
						for(var y=time-tombelem;y>(time-tombelem)-tombelem;y--){
							utolsotomb[b][oszlop] = window.diagram[y][oszlop];
							b++;
						}
					}
					var miniciklus = 0;
					for(var oszlop=0;oszlop<number;oszlop++){
						for(var ellen=0;ellen<tombelem;ellen++){
							if(tomb[ellen][oszlop]==utolsotomb[ellen][oszlop]){
								miniciklus = miniciklus + 1;
							}
						}
					}	
					if(miniciklus == number*tombelem){
						var hatarciklus = hatarciklus + 1;
						break;
					}
				}
			window.eredmenyek = window.diagram;
			window.eredmenyek.splice(window.eredmenyek.length-1, 1);
			window.osszes.splice(window.osszes.length, 0, window.eredmenyek);
			
			for(var j=2; j<lefutas; j++){
				if(fixponttomb[j] != null && fixponttomb[j] === fixponttomb[0]){
					delete fixponttomb[j];
				}
			}
			eredmeny(lefutas);
			szamlalo = szamlalo + 1;
			}
	function eredmeny(lefutas){
		var details = document.getElementById("details"+lefutas);
		var fodiv = document.getElementById("fodiv");
		var diveredmeny = document.getElementById("diveredmeny");
		if (stabil !==0 || hatarciklus !==0 || nemstabil!==0){
			if(document.getElementById("szimered") === null){
                var element = document.createElement("p");
				element.setAttribute("id","szimered");
                element.innerHTML = "A szimulációk eredménye:";
                element.style.margin = "20px 0px 20px";
				diveredmeny.appendChild(element);
				var element4 = document.createElement("p");
				element4.setAttribute("id","pszazalekos");
                element4.innerHTML = lefutas+"db lefutás történt, amelyek százalékos formában:";
                element4.style.margin = "20px 0px 20px";
                diveredmeny.appendChild(element4);
                var element1 = document.createElement("p");
				element1.setAttribute("id","pstabil");
                element1.innerHTML = ((stabil/window.index)*100)+"%-ban ("+stabil+"db)"+" stabil eredményt adtak.";
                diveredmeny.appendChild(element1);
                var element2 = document.createElement("p");
				element2.setAttribute("id","phatarciklus");
                element2.innerHTML = ((hatarciklus/window.index)*100)+"%-ban ("+hatarciklus+"db)"+" végződött határciklusban.";
                diveredmeny.appendChild(element2);
                var element3 = document.createElement("p");
				element3.setAttribute("id","pnemstabil");
                element3.innerHTML = ((nemstabil/window.index)*100)+"%-ban ("+nemstabil+"db)"+" kaotikusan viselkedett.";
                diveredmeny.appendChild(element3);    
			}
			else{
				var element4 = document.getElementById("pszazalekos");
				element4.innerHTML = window.szamlalo+"db lefutás történt, amelyek százalékos formában:";
				var element1 = document.getElementById("pstabil");
				element1.innerHTML = ((stabil/window.index)*100)+"%-ban ("+stabil+"db)"+" stabil eredményt adtak.";
				var element2 = document.getElementById("phatarciklus");
				element2.innerHTML = ((hatarciklus/window.index)*100)+"%-ban ("+hatarciklus+"db)"+" végződött határciklusban.";
				var element3 = document.getElementById("pnemstabil");
				element3.innerHTML = ((nemstabil/window.index)*100)+"%-ban ("+nemstabil+"db)"+" kaotikusan viselkedett.";
			}
		}
		var number = document.getElementById("num1").value;
		number = parseFloat(number);
		
		var canvas = document.createElement("canvas");
		canvas.setAttribute("id","myChart"+lefutas);
		canvas.setAttribute("class","canvas");
		details.appendChild(canvas);
		var text = document.createElement("p");
		text.innerHTML = "Töltse le a(z) " + lefutas + ". szimuláció eredményét mutató diagramot innen:";
		details.appendChild(text);
		var kep = document.createElement("input");
		kep.setAttribute("id",lefutas);
		kep.setAttribute("type","image");
		kep.setAttribute("src","images/icons8-download-graph-report-30.png");
		kep.setAttribute("onclick","kepletoltes3(this.id)");
		kep.style.margin = "10px 0px 0px";
		text.appendChild(kep);
		
		if(document.getElementById("newChart") === null){
			var canvas2 = document.createElement("canvas");
			canvas2.setAttribute("id","newChart");
			diveredmeny.appendChild(canvas2);
			var text = document.createElement("p");
			text.innerHTML = "Töltse le a lefutások ábrázolása diagramot innen:";
			diveredmeny.appendChild(text);
			var kep = document.createElement("input");
			kep.setAttribute("id","kep1");
			kep.setAttribute("type","image");
			kep.setAttribute("src","images/icons8-download-graph-report-30.png");
			kep.setAttribute("onclick","kepletoltes()");
			kep.style.margin = "10px 0px 0px";
			text.appendChild(kep);
		}
		fixpontok[lefutas-1] = new Array(number);
		if(window.cut === number && c[0] == null){
			for(var i=0;i<number;i++){
				c.push(window.fixponttomb[0][i]);
			}
			for(var i=0;i<number;i++){
				if(window.fixponttomb[lefutas][i] != 'undefined'){
					fixpontok[lefutas-1][i] = window.fixponttomb[lefutas][i];
				}
			}
		}
		
		var canvas3 = document.createElement("canvas");
		canvas3.setAttribute("id","newChart"+lefutas);
		diveredmeny.appendChild(canvas3);
		var text = document.createElement("p");
		text.setAttribute("id","fixtext"+lefutas);
		text.innerHTML = "Töltse le a fixpontok diagramot innen:";
		diveredmeny.appendChild(text);
		var kep = document.createElement("input");
		kep.setAttribute("id","kep2"+lefutas);
		kep.setAttribute("type","image");
		kep.setAttribute("src","images/icons8-download-graph-report-30.png");
		kep.setAttribute("onclick","kepletoltes2()");
		kep.style.margin = "10px 0px 0px";
		text.appendChild(kep);
		window.newChart2 = document.getElementById('newChart'+lefutas).getContext('2d');
		
		let myChart = document.getElementById('myChart'+lefutas).getContext('2d');
		let newChart = document.getElementById('newChart').getContext('2d');
		var t = document.getElementById("timeinput").value;
		t = parseFloat(t);
		
		// Global Options
		const xlabels = [];
		const ylabels = [];
		
		for(var i = 0;i<t+1;i++){
			xlabels.push(window.diagram[i][0]);
		}
		for(var i = 0;i<window.break;i++){
			ylabels.push(i);
		}
		Chart.defaults.global.defaultFontFamily = 'Lato';
		Chart.defaults.global.defaultFontSize = 18;
		Chart.defaults.global.defaultFontColor = '#000';
		let barChart = {
			type:'bar',
			data:{
				labels: ['Stabil','Kaotikus viselkedés','Határciklus'],
				datasets:[{
					label: "Detektált állapotok száma",
					fill: false,
					backgroundColor: 'red',
					borderColor: 'red',
					data: [stabil,nemstabil,hatarciklus]
				}]
			},
			options:{
				title:{
					display:true,
					text:'A lefutások számának ábrázolása',
					fontSize:25
				},
				legend:{
					display:true,
					position:'right',
					labels:{
						fontColor:'#333333',
						fontStyle: 'bold'
					}
				},
				layout:{
					padding:{
						left:50,
						right:0,
						bottom:0,
						top:0
					}
				},
				tooltips:{
					enabled:true
				},
				scales:{
					xAxes: [{
						display: true,
						gridLines: {
							lineWidth: 2,
							color: 'black'
						},
						ticks:{
							fontStyle: 'bold'
						}
					}],
					yAxes: [{
						display: true,
						gridLines: {
							lineWidth: 2,
							color: 'black'
						},
						ticks:{
							fontStyle: 'bold'
						}
					}]
				}
			}
		};
		let fixChart = {
			type:'line',
			data:{
				labels: c,
				datasets:[{
					label: "Detektált fixpont értéke",
					fill: false,
					showLine: false,
					backgroundColor: 'red',
					borderColor: 'red',
					pointRadius: 10,
					data: fixpontok[lefutas-1]
				}]
			},
			options:{
				title:{
					display:true,
					text:'A fixpontok ábrázolása',
					fontSize:25
				},
				legend:{
					display:true,
					position:'right',
					labels:{
						fontColor:'#333333',
						fontStyle:'bold'
					}
				},
				layout:{
					padding:{
						left:50,
						right:0,
						bottom:0,
						top:0
					}
				},
				tooltips:{
					enabled:true
				},
				scales:{
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Conceptek',
							fontStyle: 'bold'
						},
						ticks:{
							fontStyle: 'bold'
						},
						gridLines: {
							color: 'black',
							lineWidth: 2
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Fixpontok',
							fontStyle: 'bold'
						},
						ticks: {
							min: -1,
							max: 1,
							stepSize: 1,
							fontStyle: 'bold'
						},
						gridLines: {
							color: 'black',
							lineWidth: 2
						}
					}]
				}
			}
		};
		let massPopChart =  {
		  type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
		  data:{
			title: "Időpillanatok",
			labels: ylabels,
			datasets:[{
			  label:'C1 concept értéke',
			  fill: false,
			  data:xlabels,
			  backgroundColor:window.chartColors.red,
			  borderColor:window.chartColors.red,
			}]
		  },
		  options:{
			title:{
			  display:true,
			  text:'A különböző conceptek értékei',
			  fontSize:25
			},
			legend:{
			  display:true,
			  position:'right',
			  labels:{
				fontColor:'#333333',
				fontStyle:'bold'
			  }
			},
			layout:{
			  padding:{
				left:50,
				right:0,
				bottom:0,
				top:0
			  }			  
			},
			tooltips:{
			  enabled:true
			},
			scales:{
			  xAxes: [{
				  display: true,
				  scaleLabel: {
					  display: true,
					  labelString: 'Időpillanatok',
					  fontStyle: 'bold'
				  },
				  ticks:{
						fontStyle: 'bold'
					},
				  gridLines: {
						color: 'black',
						lineWidth: 2
						}
			}],
			  yAxes: [{
				  display: true,
				  scaleLabel: {
					  display: true,
					  labelString: 'Értékek',
					  fontStyle: 'bold'
				  },
				  ticks:{
						fontStyle: 'bold'
						},
				  gridLines: {
						color: 'black',
						lineWidth: 2
						}
			}]
			}
		  }
		};
		
		window.myLine = new Chart(myChart, massPopChart);
		var colorNames = Object.keys(window.chartColors);
		var seged = 1;
		var mszam = document.getElementById("num1").value;
		mszam = parseFloat(mszam);
		for(var l=1;l<mszam;l++){
			var colorName = colorNames[massPopChart.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];
			var newDataset = {
				label: 'C'+(seged+1)+' concept értéke',
				backgroundColor: newColor,
				borderColor: newColor,
				data: [],
				fill: false
			};
			for (var i=0; i<t+1; i++){
				newDataset.data.push(window.diagram[i][seged]);
			}
			massPopChart.data.datasets.push(newDataset);
			window.myLine.update();
			seged = seged + 1;
		}
		window.myLine = new Chart(newChart, barChart);
		if(lefutas!==index){
			window.myLine.destroy();
		}
		
		window.myLine = new Chart(window.newChart2, fixChart);
	}
		</script>
	</body>
</html>