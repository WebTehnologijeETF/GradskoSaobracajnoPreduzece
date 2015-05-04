 function ValidirajEmail(){
	var valid = document.getElementById("emailVal").validity.valid;
	if(valid){
		document.getElementById("validEmail").style.display = "inline";
		document.getElementById("invalidEmail").style.display = "none";
		PotvrdiEmail();
	}else{
		document.getElementById("validEmail").style.display = "none";
		document.getElementById("invalidEmail").style.display = "inline";
		PotvrdiEmail();
	}
}
function ValidirajIme(){
	var valid = document.getElementById("imeVal").validity.valid;
	if(valid){
		document.getElementById("validIme").style.display = "inline";
		document.getElementById("invalidIme").style.display = "none";
	}else{
		document.getElementById("validIme").style.display = "none";
		document.getElementById("invalidIme").style.display = "inline";
	}
}
function PotvrdiEmail(){
	var value = document.getElementById("emailVal").value;
	var valuePotvrdi = document.getElementById("potvrdiEmailVal").value;
	var valid = document.getElementById("potvrdiEmailVal").validity.valid;
	if(valid && value === valuePotvrdi){
		document.getElementById("validPotvrdiEmail").style.display = "inline";
		document.getElementById("invalidPotvrdiEmail").style.display = "none";	
		document.getElementById("potvrdiEmailVal").validity.valid = true;
	}else{
		document.getElementById("validPotvrdiEmail").style.display = "none";
		document.getElementById("invalidPotvrdiEmail").style.display = "inline";
		document.getElementById("potvrdiEmailVal").validity.valid = false;
	}
}
function ValidirajText(){
	var valid = document.getElementById("textVal").validity.valid;
	if(valid){
		document.getElementById("validText").style.display = "inline";
		document.getElementById("invalidText").style.display = "none";		
	}else{
		document.getElementById("validText").style.display = "none";
		document.getElementById("invalidText").style.display = "inline";
	}
}

function validirajMjestoBroj(){
	var httpReq = new XMLHttpRequest();
	var mjesto =  document.getElementById('mjesto').value;
    var postanskiBroj =  document.getElementById('postanskiBroj').value;

    if(!mjesto){
    	return;
    }
    if(!postanskiBroj){
    	return;
    }

	httpReq.onreadystatechange = function() {
		var jsonParse=JSON.parse(httpReq.responseText);
		if (httpReq.readyState == 4 && httpReq.status == 200) {
			if (jsonParse.hasOwnProperty("greska")) {
				document.getElementById("validityText").innerHTML = jsonParse["greska"];
			}
			else{
				document.getElementById("validityText").innerHTML = jsonParse["ok"];
				document.getElementById("validMjestoBroj").style.display = "inline";
				document.getElementById("invalidMjestoBroj").style.display = "none";
			}
		}
	}
	httpReq.open("GET", "http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto="+mjesto+"&postanskiBroj="+postanskiBroj, true);
	httpReq.send();	
}