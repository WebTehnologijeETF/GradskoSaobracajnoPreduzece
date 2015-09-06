
 //svrha samo valid
 //email required regex
 //ime required regex
 //text samo required
 //potvrdi email 

function ValidirajPolje(name, required, regex, crossValidateWith){	
	var reg = new RegExp(regex);
 	var value = document.getElementById(name+"Val").value;
 	var requiredValid = !required ? true : value != "" && value.valueOf() != undefined;
 	var patternValid = !regex ? true : value == "" || value.valueOf() == undefined || reg.test(value);
 	var crossValid = !crossValidateWith ? true : isMatch(value, document.getElementById(crossValidateWith+"Val").value);
 	if(requiredValid && (value == "" || value.valueOf() == undefined)){
 		if(document.getElementById("valid"+name)) document.getElementById("valid"+name).style.display = "none";
		if(document.getElementById("invalid"+name)) document.getElementById("invalid"+name).style.display = "none";
		if(document.getElementById("required"+name)) document.getElementById("required"+name).style.display = "none";
		if(document.getElementById("pattern"+name)) document.getElementById("pattern"+name).style.display = "none";
		if(document.getElementById("cross"+name)) document.getElementById("cross"+name).style.display = "none";
 	}
	else if(requiredValid && patternValid && crossValid){
		if(document.getElementById("valid"+name)) document.getElementById("valid"+name).style.display = "inline";
		if(document.getElementById("invalid"+name)) document.getElementById("invalid"+name).style.display = "none";
		if(document.getElementById("required"+name)) document.getElementById("required"+name).style.display = "none";
		if(document.getElementById("pattern"+name)) document.getElementById("pattern"+name).style.display = "none";
		if(document.getElementById("cross"+name)) document.getElementById("cross"+name).style.display = "none";
	}else{
		if(document.getElementById("valid"+name)) document.getElementById("valid"+name).style.display = "none";
		if(document.getElementById("invalid"+name)) document.getElementById("invalid"+name).style.display = "inline";
		if(!requiredValid){
			if(document.getElementById("pattern"+name)) document.getElementById("pattern"+name).style.display = "none";
			if(document.getElementById("required"+name)) document.getElementById("required"+name).style.display = "inline";
			if(document.getElementById("cross"+name)) document.getElementById("cross"+name).style.display = "none";

		}
		if(!patternValid){
			if(document.getElementById("pattern"+name)) document.getElementById("pattern"+name).style.display = "inline";
			if(document.getElementById("required"+name)) document.getElementById("required"+name).style.display = "none";
			if(document.getElementById("cross"+name)) document.getElementById("cross"+name).style.display = "none";
		}
		if(!crossValid){
			if(document.getElementById("pattern"+name)) document.getElementById("pattern"+name).style.display = "none";
			if(document.getElementById("required"+name)) document.getElementById("required"+name).style.display = "none";
			if(document.getElementById("cross"+name)) document.getElementById("cross"+name).style.display = "inline";
		}
	}
}
function isMatch(string1, string2){
	if(!string1 || !string2) return true;
	return string1 === string2;
}