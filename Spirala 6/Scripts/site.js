

function prikaziPartial(partialName) { 	
	var httpReq = new XMLHttpRequest();
	httpReq.onreadystatechange = function() {
		if (httpReq.readyState == 4 && httpReq.status == 200) {
			document.getElementById("main-container").innerHTML = httpReq.responseText;
		}
    }	
	var parName = "Partials/"+partialName+".php";
	httpReq.open("GET",parName,true);
	httpReq.send();
}
function prikaziVijest(id){
	document.cookie="IDvijesti="+id;
	prikaziPartial('novost');
}

function prikaziKomentare(id){
	document.cookie="IDvijesti="+id;
	prikaziPartial('komentari');
}
function logout(){
	document.cookie = "User" +'=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	document.getElementById("AdminPanel").style.display = "none";	
	document.getElementById("Username").style.display = "none";				
	document.getElementById("Logout").style.display = "none";
	document.getElementById("Login").style.display = "inline";
	alert("Uspjesno ste izlogovani!");
}
function authenticate(){
	var httpReqAuth = new XMLHttpRequest();
	var username = document.getElementById("UsernameLogin").value;
	var password = document.getElementById("PasswordLogin").value;

	if(!username){
    	return;
    }
    if(!password){
    	return;
    }

	httpReqAuth.onreadystatechange = function() {
		var tomorrow = new Date();
		tomorrow.setDate(tomorrow.getDate() + 1)
		var jsonParse=JSON.parse(httpReqAuth.responseText);
		if (httpReqAuth.readyState == 4 && httpReqAuth.status == 200) {
			if (jsonParse.hasOwnProperty("response") && jsonParse.response != "OK") {
				document.getElementById("greska").innerHTML = jsonParse.response;
			}
			else{
				document.cookie = "User="+httpReqAuth.responseText+"; expires" + tomorrow;
				document.getElementById("sakrij").style.display = "none";
				document.getElementById("greska").innerHTML = "Uspjesno ste logovani!"
				if(jsonParse.User.isAdmin){
					document.getElementById("AdminPanel").style.display = "inline";					
				}
				document.getElementById("Username").style.display = "inline";
				document.getElementById("Username").innerHTML = jsonParse.User.userName;				
				document.getElementById("Logout").style.display = "inline";
				document.getElementById("Login").style.display = "none";

			}
		}
	}
	//servis koji loguje
	httpReqAuth.open("GET", "/Services/USER/UserRest.php?username="+username+"&password="+password, true);
	httpReqAuth.send();	
}
function provjeriCookie(){
	if(document.cookie){
		var userCookie = getCookie("User");
		var User = JSON.parse(userCookie);
		if(User.User.isAdmin){
					document.getElementById("AdminPanel").style.display = "inline";					
				}
		document.getElementById("Username").style.display = "inline";
		document.getElementById("Username").innerHTML = User.User.userName;				
		document.getElementById("Logout").style.display = "inline";
		document.getElementById("Login").style.display = "none";
	}
}

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
