function tableCreate() {
                //number of rows and columns
                var number = <?php echo json_encode($num) ?>;
                var number = parseFloat(number);
                
                if(number>=2 && Number.isInteger(number) === true){
                
                var ha = document.getElementById("num1");
                ha.setAttribute("readonly","readonly");
                
                //body reference 
                var body = document.getElementById("container-login100");
                // create elements <table> and a <tbody>
                var tbl = document.createElement("table");
                var tblBody = document.createElement("tbody");
                var fodiv = document.createElement("div");
                body.appendChild(fodiv);
                fodiv.setAttribute("id","fodiv");
                fodiv.style.position = "relative";
                fodiv.style.width = "100%";
                
                
                // cells creation
                for (var j = 0; j < number + 1; j++) {
                    // table row creation
                    var row = document.createElement("tr");

                    for (var i = 0; i < number + 1; i++) {
                        // put <td> at end of the table row
                        if(j===0 && i===0){
                            var cell = document.createElement("td");
                            var cellText = document.createTextNode("Source\\Destination");
                            
                            cell.appendChild(cellText);
                        }
                        else if (j===i){
                            var cell = document.createElement("td");
                            //var input = document.createElement("input");
                            var cellText = document.createTextNode("0");
                            
                            //cell.appendChild(input);
                            //input.setAttribute("id","mtr"+j+i);
							//input.setAttribute("type","number");
							//input.setAttribute("step","any");
                            //input.style.border = "none";
                            //input.style.backgroundColor = "#f4f4f4";
                        
                            cell.appendChild(cellText);
                            cell.setAttribute("id","mtr"+j+i);
                            cell.setAttribute("value","0");
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
						input.setAttribute("required","true");
						input.style.width = "50px";
                        }
                        row.appendChild(cell);
                        //input.style.border = "0px";
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
                tbl.appendChild(tblBody);
                // put <table> in the <body>
                fodiv.appendChild(tbl);

                tbl.style.margin = "20px 0px 0px";
                tbl.style.border = "1px solid black";
                tbl.style.borderCollapse = "collapse";
                
                var lambdatext = document.createElement("div");
                lambdatext.innerHTML = "Adja meg a lambda értékét!";
                fodiv.appendChild(lambdatext);
                lambdatext.style.textAlign = "left";
                lambdatext.style.width = "100%";
                lambdatext.style.float = "left";
                lambdatext.style.margin = "20px 0px 10px";
                
                var lambda = document.createElement("input");
                lambdatext.appendChild(lambda);
                lambda.setAttribute("id","lambda");
				lambda.setAttribute("type","number");
				lambda.setAttribute("step","any");
                lambda.style.float = "initial";
                lambda.style.border = "1px solid black";
                lambda.style.margin = "20px 5px 10px";
				lambda.style.width = "50px";
                
                var asd123 = document.createElement("br");
                fodiv.appendChild(asd123);
                
                var text = document.createElement("div");
                text.innerHTML = "Adja meg az idõlépések számát!";
                fodiv.appendChild(text);
                text.style.textAlign = "left";
                text.style.width = "100%";
                text.style.float = "left";
                text.style.margin = "0px 0px 30px";
                
                var timeinput = document.createElement("input");
                text.appendChild(timeinput);
                timeinput.setAttribute("id","timeinput");
				timeinput.setAttribute("type","number");
				timeinput.setAttribute("step","any");
				timeinput.setAttribute("width","50px");
                timeinput.style.float = "initial";
                timeinput.style.border = "1px solid black";
                timeinput.style.margin = "10px 5px 0px";
				timeinput.style.width = "50px";
                
                                
                var btn = document.getElementById("btn");
                btn.style.display = "none";
				var adatok = document.getElementById("adatok");
				adatok.style.display = "none";
				var upload = document.getElementById("upload");
				upload.style.display = "none";
				var uj = document.getElementById("uj");
				uj.style.display = "initial";
				var szamit = document.getElementById("szamit");
				szamit.style.display = "initial";
            }
                else{
				   if(Number.isInteger(number) === false){
					   alert("Egész számnak kell lennie!");
				   }
				   else{
                   alert("Legalább 2 elemûnek kell lennie a mátrixnak!");
                   throw new Error("0-t nem adhat meg!");
                   }
                }
                //body reference
                var body = document.getElementsByTagName("body")[0];

                // create elements <table> and a <tbody>
                var tbl = document.createElement("table");
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
                            var cellText = document.createTextNode("Initial Values");

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
						input.setAttribute("min","-1");
						input.setAttribute("max","1");
						input.setAttribute("step","any");
						input.style.width = "107px";
                        }
                        row.appendChild(cell);
                        //input.style.border = "0px";
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
                // put <table> in the <body>
                fodiv.appendChild(tbl);

                tbl.style.margin = "20px 0px 0px";
                tbl.style.border = "1px solid black";
                tbl.style.borderCollapse = "collapse";
                document.getElementById("szamit").disabled = false;
                //document.getElementById("button").disabled = true;
            }
            function createtimetable(){
			var details = document.createElement("details");
			details.setAttribute("id","details"+szamlalo);
			var tag = document.createElement("summary");
			tag.innerHTML = szamlalo+". szimuláció eredménye";
			var element = document.getElementById("lambda");
			element.setAttribute("readonly","readonly");
			element = document.getElementById("timeinput");
			element.setAttribute("readonly","readonly");
            var number = document.getElementById("num1").value;
            number = parseInt(number);
            var time = document.getElementById("timeinput").value;
            time = parseInt(time);
            //body reference 
            var body = document.getElementsByTagName("body")[0];
            fodiv.appendChild(details);
			details.appendChild(tag);
            // create elements <table> and a <tbody>
            var tbl = document.createElement("table");
            var tblBody = document.createElement("tbody");

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
                            var cellText = document.createTextNode("Idõszakaszok");
                            
                            cell.appendChild(cellText);
                        }
                        else if (j===1 && i!==0){
                            var initial = document.getElementById("initialvalue"+i).value;
                            
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
                        //input.style.border = "0px";
                        cell.style.border = "1px solid black";
                        
                        if(i === number){
                            break;
                        }
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
                //fodiv.appendChild(tbl);

                tbl.style.margin = "20px 0px 0px";
//                tbl.style.border = "1px solid black";
                tbl.style.borderCollapse = "collapse";
                tbl.style.allignItems = "center";
                
                var lambda = document.getElementById("lambda").value;
                lambda = parseFloat(lambda);
                
                var c1 = document.getElementById("mtr"+1+1).value;
                c1 = parseFloat(c1);
                var c2 = document.getElementById("mtr"+2+1).value;
                c2 = parseFloat(c2);
                var d1 = document.getElementById("mtr"+1+2).value;
                d1 = parseFloat(d1);
                var d2 = document.getElementById("mtr"+2+2).value;
                d2 = parseFloat(d2);
				var matrixszam = 0;
				var matrix = new Array(number);
				for(var j=0;j<number;j++){
					matrix[j] = new Array(number);
					for (var i=0;i<number;i++){
						if(i===j){
							matrixszam = 0;
							matrixszam = parseFloat(matrixszam);
							matrix[j][i] = matrixszam;
						}
						else{
							var k = j+1;
							var l = i+1;
							var read = document.getElementById("mtr"+k+l);
							read.setAttribute("readonly","readonly");
							matrixszam = document.getElementById("mtr"+k+l).value;
							matrixszam = parseFloat(matrixszam);
							matrix[j][i] = matrixszam;
						}
					}
				}						
				var initszam = 0;
				var init = new Array(number);
				for(var j=0;j<number;j++){
					initszam = document.getElementById("initialvalue"+(j+1)).value;
					initszam = parseFloat(initszam);
					init[j] = new Array(1);
					init[j][0] = initszam;
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
					window.diagram[0][j] = init[j][0];
				}
                //var init1 = document.getElementById("initialvalue"+1).value;
                //init1 = parseFloat(init1);
                //var init2 = document.getElementById("initialvalue"+2).value;
                //init2 = parseFloat(init2);
                var valami1 = 0;
                valami1 = parseFloat(valami1);
                var valami2 = 0;
                valami2 = parseFloat(valami2);
				var valami3 = 0;
                valami3 = parseFloat(valami3);
				var valami4 = 0;
                valami4 = parseFloat(valami4);
                var egyenlo = 0;
                var egyenlo2 = 0;
				var egyenlo3 = 0;
				var egyenlo4 = 0;
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
								akt = matrix[k][i-1]*init[k][0];
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
                            /*if(i===1){
                                var ertek1 = 1/(1+Math.exp((-1)*lambda*((matrix[i-1][0]*init[0][0])+(matrix[i][0]*init[1][0]))));
                                var element = document.getElementById("cell"+szamlalo+j+i);
                                element.innerHTML = ertek1.toFixed(2);
                                element.setAttribute("value",ertek1.toFixed(2));
                                valami1 = ertek1;
                                valami1 = parseFloat(valami1);
                                egyenlo = egyenlo + 1;
								eremat[0][1]=valami1;
                            }
                            else if(i===2){
                                var ertek2 = 1/(1+Math.exp((-1)*lambda*((matrix[i-2][1]*init[0][0])+(matrix[i-1][1]*init[1][0]))));
                                var element = document.getElementById("cell"+szamlalo+j+i);
                                element.innerHTML = ertek2.toFixed(2);
                                element.setAttribute("value",ertek2.toFixed(2));
                                valami2 = ertek2;
                                valami2 = parseFloat(valami2);
                                egyenlo2 = egyenlo2 + 1;
								eremat[1][1]=valami2;
                            }
							else if(i===3){
								var ertek3 = 1/(1+Math.exp((-1)*lambda*((matrix[i-3][2]*init[0][0])+(matrix[i-2][2]*init[1][0]))));
                                var element = document.getElementById("cell"+szamlalo+j+i);
                                element.innerHTML = ertek3.toFixed(2);
                                element.setAttribute("value",ertek3.toFixed(2));
                                valami3 = ertek3;
                                valami3 = parseFloat(valami3);
                                egyenlo3 = egyenlo3 + 1;
								eremat[2][1]=valami3;
							}
							else if(i===4){
								var ertek4 = 1/(1+Math.exp((-1)*lambda*((matrix[i-4][3]*init[0][0])+(matrix[i-3][3]*init[1][0]))));
                                var element = document.getElementById("cell"+szamlalo+j+i);
                                element.innerHTML = ertek4.toFixed(2);
                                element.setAttribute("value",ertek4.toFixed(2));
                                valami4 = ertek4;
                                valami4 = parseFloat(valami4);
                                egyenlo4 = egyenlo4 + 1;
								eremat[3][1]=valami4;
							}*/
                        }
                        for(l=0;l<number;l++){
						eremat[l][1] = eremat[l][0]
						}
                        if(i === number){
                            break;
                        }
                    }
                    if(j === time + 1){
                       break;
                    }
                }
				var elozo = 0;
				
                for (var j=3;j<time + 2;j++){
					summary = 0;
                    for (var i=1;i<number + 1;i++){
						summ = 0;
						for(k=0;k<number;k++){
							akt = 0;
							elozo = valami1;
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
                        /*if(i===1){
                            var ertek1 = 1/(1+Math.exp((-1)*lambda*((matrix[i-1][0]*valami1)+(matrix[i][0]*valami2))));
                            var kerekitett1 = ertek1.toFixed(2);
                            var element = document.getElementById("cell"+szamlalo+j+i);
                            element.innerHTML = ertek1.toFixed(2);
                            element.setAttribute("value",ertek1.toFixed(2));
                            if (valami1.toFixed(2) === kerekitett1){
                                egyenlo = egyenlo + 1;
                            }
                            else{
                                egyenlo = 0;
                            }
                        }
                        else if(i===2){
                            var ertek2 = 1/(1+Math.exp((-1)*lambda*((matrix[i-2][1]*valami1)+(matrix[i-1][1]*valami2))));
                            var kerekitett2 = ertek2.toFixed(2);
                            var element = document.getElementById("cell"+szamlalo+j+i);
                            element.innerHTML = ertek2.toFixed(2);
                            element.setAttribute("value",ertek2.toFixed(2));
                            if (valami2.toFixed(2) === kerekitett2){
                                egyenlo2 = egyenlo2 + 1;
                            }
                            else{
                                egyenlo2 = 0;
                            }
                        }*/
                    }
					for(l=0;l<number;l++){
						eremat[l][1] = eremat[l][0]
					}
                    /*valami1 = ertek1;
                    valami2 = ertek2;*/
					var cut = 0;
					for(var k=0;k<number;k++){
						if(window.diagram[time+1][k] >= 3){
							cut = cut + 1;
						}					
					}
					
					if(cut===number){
						stabil = stabil + 1;
						break;
					}
                    if(egyenlo >= 2 && egyenlo2 >= 2){
                        break;
                    }
                }
				if (cut!==number){
					nemstabil = nemstabil + 1;
				}
                for (var k = j+1;k<time+2;k++){
                    for (var i=0; i<number+1; i++){
						var element = document.getElementById("cell"+szamlalo+k+i);
                        element.innerHTML = "";
                        element.style.border = "0px";
                    }
                }
//                if (egyenlo === 2){
//                    var element = document.createElement("p");
//                    element.innerHTML = "C1 concept stabil állapotban van t="+(j-1)+" idõben!";
//                    element.style.margin = "20px 0px 0px";
//                    element.style.textAlign = "left";
//                    fodiv.appendChild(element);
//                }
//                if (egyenlo2 === 2){
//                    var element = document.createElement("p");
//                    element.innerHTML = "C2 concept stabil állapotban van t="+(j-1)+" idõben!";
//                    element.style.margin = "20px 0px 0px";
//                    element.style.textAlign = "left";
//                    fodiv.appendChild(element);
//                }
                //var stabil = 0;
                //var hatarciklus = 0;
                //var nemstabil = 0;
                
                /*if (szamlalo > 0){
                    if(egyenlo >= 2 && egyenlo2 >= 2){
                        stabil = stabil + 1;
                    }
                    else{
                        nemstabil = nemstabil + 1;
                    }
                }*/
//                document.getElementById("szamit").disabled =document true;
			
			eredmeny();
			szamlalo = szamlalo + 1;
            }
	function eredmeny(){
		var details = document.getElementById("details"+szamlalo);
		var fodiv = document.getElementById("fodiv");
		if (stabil !==0 || hatarciklus !==0 || nemstabil!==0){
                    var element = document.createElement("p");
                    element.innerHTML = "A lefuttatások eredménye:";
                    element.style.margin = "20px 0px 20px";
                    element.style.textAlign = "left";
                    details.appendChild(element);
                    var element4 = document.createElement("p");
                    element4.innerHTML = window.szamlalo+"db lefutás történt, amelyek százalékos formában:";
                    element4.style.margin = "20px 0px 20px";
                    element4.style.textAlign = "left";
                    details.appendChild(element4);
                    var element1 = document.createElement("p");
                    element1.innerHTML = ((stabil/window.szamlalo)*100)+"%-ban ("+stabil+"db)"+" stabil eredményt adtak.";
                    details.appendChild(element1);
                    element1.style.textAlign = "left";
                    var element2 = document.createElement("p");
                    element2.innerHTML = ((hatarciklus/window.szamlalo)*100)+"%-ban ("+hatarciklus+"db)"+" végzõdött határciklusban.";
                    details.appendChild(element2);
                    element2.style.textAlign = "left";
                    var element3 = document.createElement("p");
                    element3.innerHTML = ((nemstabil/window.szamlalo)*100)+"%-ban ("+nemstabil+"db)"+" kaotikusan viselkedett.";
                    details.appendChild(element3);
                    element3.style.textAlign = "left";                     
	}
		var canvas = document.createElement("canvas");
		canvas.setAttribute("id","myChart"+window.szamlalo);
		details.appendChild(canvas);
		var canvas2 = document.createElement("canvas");
		canvas2.setAttribute("id","newChart"+window.szamlalo);
		details.appendChild(canvas2);
		let myChart = document.getElementById('myChart'+window.szamlalo).getContext('2d');
		let newChart = document.getElementById('newChart'+window.szamlalo).getContext('2d');
		var t = document.getElementById("timeinput").value;
		t = parseFloat(t);
		// Global Options
		const xlabels = [];
		const ylabels = [];
		for(var i = 0;i<t+1;i++){
			xlabels.push(window.diagram[i][0]);
		}
		for(var i = 0;i<t+1;i++){
			ylabels.push(i);
		}
		Chart.defaults.global.defaultFontFamily = 'Lato';
		Chart.defaults.global.defaultFontSize = 18;
		Chart.defaults.global.defaultFontColor = '#000';
		let circleChart = {
			type:'bar',
			data:{
				labels: ['Stabil','Kaotikus viselkedés','Határciklus'],
				datasets:[{
					label: 'Állapotok elõfordulásának száma',
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
						fontColor:'#333333'
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
				}
			}
		};
		let massPopChart = /*new Chart(myChart,*/ {
		  type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
		  data:{
			title: "Idõpillanatok",
			labels: ylabels,
			datasets:[{
			  label:'C1 concept értéke',
			  fill: false,
			  data:xlabels,
			  //backgroundColor:'green',
			  backgroundColor:window.chartColors.red,
			  borderColor:window.chartColors.red,
			}]
		  },
		  options:{
			title:{
			  display:true,
			  text:'A különbözõ conceptek értékei',
			  fontSize:25
			},
			legend:{
			  display:true,
			  position:'right',
			  labels:{
				fontColor:'#333333'
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
					  labelString: 'Idõpillanatok'
				  }
			}],
			  yAxes: [{
				  display: true,
				  scaleLabel: {
					  display: true,
					  labelString: 'Értékek'
				  }
			}]
			}
		  }
		}/*)*/;
		
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
		window.myLine = new Chart(newChart, circleChart);
	}