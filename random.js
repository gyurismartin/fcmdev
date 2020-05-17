function random(){
	var number = document.getElementById("num1").value;
	number = parseFloat(number);
	for(j=0;j<number;j++){
		document.getElementById("initialvalue"+(j+1)).value = Math.random().toFixed(2);
	}
}