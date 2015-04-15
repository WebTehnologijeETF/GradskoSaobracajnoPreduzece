var tramvajskiLista;
var tramvajArray = [ false, false, false, false, false, false, false];

var AutobusskiLista;
var busArray = [ false, false, false, false, false, false, false];

function ShowTramvajskiList(){
	if(tramvajskiLista !== true){
		document.getElementById("tramvajskiList").style.display = "block";
		tramvajskiLista = true;
	}else{
		document.getElementById("tramvajskiList").style.display = "none";
		tramvajskiLista = false;
	}
}
function ShowTram(number){
	var el = document.getElementById("tram"+number);
	if(tramvajArray[number-1] !== true){
		el.style.display = "block";
		tramvajArray[number-1]  = true;
	}else{
		el.style.display = "none";
		tramvajArray[number-1] = false;
	}
}
function ShowAutobusskiList(){
	if(AutobusskiLista !== true){
		document.getElementById("AutobusskiList").style.display = "block";
		AutobusskiLista = true;
	}else{
		document.getElementById("AutobusskiList").style.display = "none";
		AutobusskiLista = false;
	}
}
function ShowBus(number){
	var el = document.getElementById("bus"+number);
	if(busArray[number-1] !== true){
		el.style.display = "block";
		busArray[number-1]  = true;
	}else{
		el.style.display = "none";
		busArray[number-1] = false;
	}
}