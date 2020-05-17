function bead(){
	if(index==window.init.length){
		alert("Elérte a maximális kezdeti értékek számát!");
	}
	else{
		selectAll();
		document.getElementById("szamit").disabled = false;
	}
}