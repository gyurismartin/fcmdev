function tomeges() {
	var darabszam = prompt("Adja meg hány db kezdeti állapotot szeretne generálni!", "pl. 50");
	darabszam = parseFloat(darabszam)
	selectBox = document.getElementById("mySelect");

	for(var j=0; j<darabszam; j++){
		random();
		var number = document.getElementById("num1").value;
		number = parseFloat(number);
		var option = document.createElement("option");
		option.text = "";	
		var kezdeti = new Array(number);		
		var text = "";
		for(i=1;i<number+1;i++){
			kezdeti[i-1] = parseFloat(document.getElementById("initialvalue"+i).value);
			text = text + kezdeti[i-1] + " ";
		}
		option.text = option.text + text;
		seged = seged + 1;
		selectBox.add(option);
		window.segedtabla.splice(window.segedtabla.length, 0, kezdeti);		
		segedint++;
	}
}