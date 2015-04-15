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