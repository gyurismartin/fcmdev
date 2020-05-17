function selectAll(){
	var number = document.getElementById("num1").value;
	number = parseFloat(number);
	selectBox = document.getElementById("mySelect");
	for (var i = 0; i < selectBox.options.length; i++){ 
		selectBox.options[i].selected = true;
		window.init.splice(window.init.length, 0, window.segedtabla[i]);		
	}
	index = window.init.length;
}