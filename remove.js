function remove(){
	var number = document.getElementById("num1").value;
	number = parseFloat(number);
	var selectBox = document.getElementById("mySelect");
	
	
	var y = selectBox.selectedIndex;
	window.segedtabla.splice(y, 1);
	selectBox.remove(selectBox.selectedIndex);
}