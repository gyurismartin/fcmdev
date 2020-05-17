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
			element.style.textAlign = "left";
			diveredmeny.appendChild(element);
			var element4 = document.createElement("p");
			element4.setAttribute("id","pszazalekos");
            element4.innerHTML = lefutas+"db lefutás történt, amelyek százalékos formában:";
            element4.style.margin = "20px 0px 20px";
            element4.style.textAlign = "left";
            diveredmeny.appendChild(element4);
            var element1 = document.createElement("p");
			element1.setAttribute("id","pstabil");
            element1.innerHTML = ((stabil/window.index)*100)+"%-ban ("+stabil+"db)"+" stabil eredményt adtak.";
            diveredmeny.appendChild(element1);
            element1.style.textAlign = "left";
            var element2 = document.createElement("p");
			element2.setAttribute("id","phatarciklus");
            element2.innerHTML = ((hatarciklus/window.index)*100)+"%-ban ("+hatarciklus+"db)"+" végződött határciklusban.";
            diveredmeny.appendChild(element2);
            element2.style.textAlign = "left";
            var element3 = document.createElement("p");
			element3.setAttribute("id","pnemstabil");
            element3.innerHTML = ((nemstabil/window.index)*100)+"%-ban ("+nemstabil+"db)"+" kaotikusan viselkedett.";
            diveredmeny.appendChild(element3);
            element3.style.textAlign = "left";               
		}
		else{
			var element4 = document.getElementById("pszazalekos");
			element4.innerHTML = window.szamlalo+"db lefutás történt, amelyek százalékos formában:";
			var element1 = document.getElementById("pstabil");
			element1.innerHTML = ((stabil/window.index)*100)+"%-ban ("+stabil+"db)"+" stabil eredményt adtak.";
            element1.style.textAlign = "left";
			var element2 = document.getElementById("phatarciklus");
			element2.innerHTML = ((hatarciklus/window.index)*100)+"%-ban ("+hatarciklus+"db)"+" végződött határciklusban.";
            element2.style.textAlign = "left";
			var element3 = document.getElementById("pnemstabil");
			element3.innerHTML = ((nemstabil/window.index)*100)+"%-ban ("+nemstabil+"db)"+" kaotikusan viselkedett.";
            element3.style.textAlign = "left";
		}
	}
	var number = document.getElementById("num1").value;
	var canvas = document.createElement("canvas");
	canvas.setAttribute("id","myChart"+lefutas);
	details.appendChild(canvas);
	if(document.getElementById("newChart") === null){
		var canvas2 = document.createElement("canvas");
		canvas2.setAttribute("id","newChart");
		diveredmeny.appendChild(canvas2);
	}
	if(document.getElementById("newChart2") === null){
		var canvas3 = document.createElement("canvas");
		canvas3.setAttribute("id","newChart2");
		diveredmeny.appendChild(canvas3);
	}
	let myChart = document.getElementById('myChart'+lefutas).getContext('2d');
	let newChart = document.getElementById('newChart').getContext('2d');
	let newChart2 = document.getElementById('newChart2').getContext('2d');
	var t = document.getElementById("timeinput").value;
	t = parseFloat(t);
	// Global Options
	const xlabels = [];
	const ylabels = [];
		
	for(var i=0;i<number;){
		if(fixpontok[0]==null){
			fixpontok.push(window.fixpont[0][0]);
			fixertekek[0] = 1;
			i++;
		}
		else{
			for(var j=0;j<number;j++){
				if(fixpontok[j]==window.fixpont[lefutas-1][i]){
					fixertekek[j]=fixertekek[j]+1;
					i++;
				}
				else {
					if(fixpontok[j]==null){
						fixpontok.push(window.fixpont[lefutas-1][i]);
						fixertekek[j] = 1;
						i++;
					}
				}
			}
		}
	}
	console.log(fixpontok);
	console.log(fixertekek);
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
	let fixChart = {
		type:'bar',
		data:{
			labels: fixpontok,
			datasets:[{
				label: "Detektált fixpontok",
				fill: false,
				backgroundColor: 'green',
				borderColor: 'green',
				data: fixertekek
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
						labelString: 'Fixpontok értéke'
					}
				}],
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Detektált számuk'
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
					  labelString: 'Időpillanatok'
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
		if(stabil!==0){
			window.myLine = new Chart(newChart2, fixChart);
			if(lefutas!==index){
				window.myLine.destroy();
			}
		}
	}