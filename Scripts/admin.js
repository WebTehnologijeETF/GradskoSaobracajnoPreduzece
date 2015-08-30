function dobaviPodatkeAdmin(){
	var httpRequest = new XMLHttpRequest();
	var html = "";

	httpRequest.onreadystatechange = function() {
		if(httpRequest.responseText == "") return;
		var jsonParse=JSON.parse(httpRequest.responseText);
		if (httpRequest.readyState == 4 && httpRequest.status == 200) {
			if (jsonParse.hasOwnProperty("response") && jsonParse.response != "OK") {
				document.getElementById("AdminGreska").innerHTML = jsonParse.response;
			}
			else{
				jsonParse.User.forEach(function (user) {
					html+="<div id='"+user.id+"'>&nbsp;&nbsp;<span>"+user.userName+"&nbsp;&nbsp;</span>|<span>&nbsp;&nbsp;"+user.email+"&nbsp;&nbsp;<button onclick=\"loadUser('"+user.userName+","+ user.passHash+"')\">Edit</button>&nbsp;<button onclick=\"obrisiUser('"+user.id+"')\">Brisi</button></div><br />";
				});
				document.getElementById("adminUsers").innerHTML = html;
			}
		}
	}
	//rest servis koji geta sve usere
	httpRequest.open("GET", "/Services/ADMIN/AdminRest.php", true);
	httpRequest.send();	
}

function loadUser(userName){
	showForm();
	var arr = userName.split(",");
	var httpReq = new XMLHttpRequest();
	var html = "";

	httpReq.onreadystatechange = function() {
		if(httpReq.responseText == "") return;
		var jsonParse=JSON.parse(httpReq.responseText);
		if (httpReq.readyState == 4 && httpReq.status == 200) {
			if (jsonParse.hasOwnProperty("response") && jsonParse.response != "OK") {
				document.getElementById("AdminGreska").innerHTML = jsonParse.response;
			}
			else{
				document.getElementById("UserId").innerHTML= jsonParse.User.id;
				document.getElementById("Email").value = jsonParse.User.email;
				document.getElementById("Usr").value = jsonParse.User.userName;
				document.getElementById("IsAdmin").checked = jsonParse.User.isAdmin == 1;
			}
		}
	}
	//rest servis koji geta sve usere
	httpReq.open("GET", "/Services/USER/UserRest.php?username="+arr[0]+"&password="+arr[1], true);
	httpReq.send();	
}
function obrisiUser(userid){
	var httpReqObrisi = new XMLHttpRequest();
	httpReqObrisi.onreadystatechange = function() {
		var jsonParse=JSON.parse(httpReqObrisi.responseText);
		if (httpReqObrisi.readyState == 4 && httpReqObrisi.status == 200) {
			document.getElementById(userid).style.display = "none";
		}
	}
	httpReqObrisi.open("DELETE", "/Services/ADMIN/AdminRest.php?id=" + userid, true);
	httpReqObrisi.send();	
}
function showForm(){
	document.getElementById("editUserForma").style.display = "block";
	document.getElementById("UserId").innerHTML= "";
	document.getElementById("Email").value = "";
	document.getElementById("Usr").value = "";
	document.getElementById("IsAdmin").checked = false;
}
function editujdodajUsera(){
	if(document.getElementById("UserId").innerHTML == ""){
		var User = {};
		User.email = document.getElementById("Email").value;
		User.userName = document.getElementById("UserId").innerHTML;
		User.passHash = document.getElementById("AdminPassword").innerHTML;
		User.isAdmin = document.getElementById("IsAdmin").checked == true ? 1 : 0;
		var httpReqDodaj = new XMLHttpRequest();
	httpReqDodaj.onreadystatechange = function() {
		if(httpReqDodaj.responseText == "") return;
		var jsonParse=JSON.parse(httpReqDodaj.responseText);
		if (httpReqDodaj.readyState == 4 && httpReqDodaj.status == 200) {
			alert("dodali ste usera");
			dobaviPodatkeAdmin();

		}
	}
	httpReqDodaj.open("POST", "/Services/ADMIN/AdminRest.php", true);
	httpReqDodaj.send(JSON.stringify(User));
	}

}