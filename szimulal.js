function szimulal(){
	selectAll();
	for(var lefutas=0;lefutas<window.init.length;lefutas++){
		if(window.init[lefutas][1]==null){
			break;
		}
		else{
			createtimetable(lefutas+1);
		}
	}
	if(window.van != 1){
		document.getElementById("fixtext").remove();
		document.getElementById("newChart2").remove();
	}
	eredmenymentes();
	mentesfunction();
	var mentesform = document.createElement("form");
	mentesform.setAttribute("id","mentesform");
	mentesform.setAttribute("action","letolt.php");
	mentesform.setAttribute("method","post");
	mentesform.setAttribute("enctype","multipart/form-data");
	
	var p = document.createElement("p");
	p.innerHTML = "A megadott adatok letöltése:";
	
	var p2 = document.createElement("p");
	p2.innerHTML = "Az eredmények letölthetők:";
				
	var mentesbtn = document.createElement("input");
	mentesbtn.setAttribute("id","mentesbtn");
	mentesbtn.setAttribute("type","image");
	mentesbtn.setAttribute("src","icons8-export-csv-30.png");
	mentesbtn.style.margin = "10px 5px 0px";
	
	var letoltform = document.createElement("form");
	letoltform.setAttribute("action","letoltes.php");
	letoltform.setAttribute("id","letoltform");
	letoltform.setAttribute("method","post");
	letoltform.setAttribute("enctype","multipart/form-data");
				
	var letoltbtn = document.createElement("input");
	letoltbtn.setAttribute("id","letoltes");
	letoltbtn.setAttribute("type","image");
	letoltbtn.setAttribute("src","icons8-export-csv-30.png");
	letoltbtn.style.margin = "10px 5px 0px";
	
	p.appendChild(mentesbtn);
	p2.appendChild(letoltbtn);
	mentesform.appendChild(p);
	letoltform.appendChild(p2);
	document.getElementById("mtrdiv").appendChild(mentesform);
	document.getElementById("szimdiv").insertBefore(letoltform, document.getElementById("diveredmeny"));
	
	document.getElementById("szamit").disabled = true;
	document.getElementById("removebtn").disabled = true;
	document.getElementById("randombtn").disabled = true;
	document.getElementById("tbtn").disabled = true;
	document.getElementById("tomegesbtn").disabled = true;
	
	$(function() {
		$('#szimdiv').addClass('active');
		$('#mtrdiv').removeClass('active');
	});
}