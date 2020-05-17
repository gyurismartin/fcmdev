function maxszimulal(){
	var number = document.getElementById("num1").value;
	var maxszim = document.getElementById("maxszim").value;
	maxszim = parseFloat(maxszim);
	
	if((maxszim < 1) || Number.isInteger(maxszim)==0){
		alert("Nem megfelelő számot adott meg! A megfelelő: 0-nál nagyobb egész szám!");
	}
	else{
		window.maxszimszam = maxszim+5;
		document.getElementById("maxszimulacio").disabled = true;
		/*document.getElementById("tbtn").disabled = false;
		document.getElementById("randombtn").disabled = false;
		document.getElementById("removebtn").disabled = false;
		document.getElementById("alapok").disabled = false;
		document.getElementById("tomegesbtn").disabled = false;*/
		document.getElementById("maxszim").setAttribute("readonly","readonly");
	}
	window.initszam = 0;
	window.init = new Array();
	/*for(var j=0;j<window.maxszimszam;j++){
		window.init[j] = new Array(number);			
	}*/
	/*window.segedtabla = new Array(window.maxszimszam);
	for(var j=0;j<window.maxszimszam;j++){
		window.segedtabla[j] = new Array(number);
	}*/
	window.segedtabla = new Array(5);
	for(var j=0;j<5;j++){
		window.segedtabla[j] = new Array(number);
		for(i=0;i<number;i++){
			if(j===0){
				window.segedtabla[j][i] = 0;
			}
			if(j===1){
				window.segedtabla[j][i] = 0.25;
			}
			if(j===2){
				window.segedtabla[j][i] = 0.5;
			}
			if(j===3){
				window.segedtabla[j][i] = 0.75;
			}
			if(j===4){
				window.segedtabla[j][i] = 1;
			}
		}
	}
	console.log(window.segedtabla);
}