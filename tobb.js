function tobb(){
	var number = document.getElementById("num1").value;
	number = parseFloat(number);
	var selectBox = document.getElementById("mySelect");
	
	var option = document.createElement("option");
	option.text = "";	
	var kezdeti = new Array(number);
	var hiba = 0;
	var rossz = 0;
	var text = "";
	for(i=1;i<number+1;i++){
		if(document.getElementById("initialvalue"+i).value === ""){
			hiba = 1;
		}
		else if(document.getElementById("initialvalue"+i).value < 0 || document.getElementById("initialvalue"+i).value > 1){
			rossz = 1;
		}
		console.log(document.getElementById("initialvalue"+i).value);
		kezdeti[i-1] = parseFloat(document.getElementById("initialvalue"+i).value);
		text = text + kezdeti[i-1] + " ";
	}
	if(hiba === 1){
		alert("Üres mezőt nem adhat meg!");
	}
	else if(rossz === 1){
		alert("Nem megfelelő számot adott meg! Az érték 0 és 1 között lehet.");
	}
	else{
		option.text = option.text + text;
		seged = seged + 1;
		selectBox.add(option);
		window.segedtabla.splice(window.segedtabla.length, 0, kezdeti);
				
		segedint++;
	}
}