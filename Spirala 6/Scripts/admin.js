function dobaviPodatkeAdmin(){
	var httpRequest = new XMLHttpRequest();
	var html = "";

	httpRequest.onreadystatechange = function() {
		if (httpRequest.readyState == 4 && httpRequest.status == 200) {
			var jsonParse=JSON.parse(httpRequest.responseText);
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
		if (httpReq.readyState == 4 && httpReq.status == 200) {
			var jsonParse=JSON.parse(httpReq.responseText);
			if (jsonParse.hasOwnProperty("response") && jsonParse.response != "OK") {
				document.getElementById("AdminGreska").innerHTML = jsonParse.response;
			}
			else{
				document.getElementById("UserId").innerHTML= jsonParse.User.id;
				document.getElementById("Email").value = jsonParse.User.email;
				document.getElementById("Usr").value = jsonParse.User.userName;
				document.getElementById("IsAdmin").checked = jsonParse.User.isAdmin == 1;
				document.getElementById("AdminPassword").value = jsonParse.User.passHash;
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
		if (httpReqObrisi.readyState == 4 && httpReqObrisi.status == 200) {
			var jsonParse=JSON.parse(httpReqObrisi.responseText);
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
	if(document.getElementById("UserId").innerHTML == "" || document.getElementById("UserId").innerHTML == undefined || document.getElementById("UserId").innerHTML == null){
		dodajUsera();
	}else editujUsera();
}

function editujUsera(){
	var httpReqEdit = new XMLHttpRequest();
	var User = {};
		User.email = document.getElementById("Email").value;
		User.userName = document.getElementById("Usr").value;
		User.passHash = document.getElementById("AdminPassword").value;
		User.isAdmin = document.getElementById("IsAdmin").checked == true ? 1 : 0;
		User.id = document.getElementById("UserId").innerHTML;
		httpReqEdit.onreadystatechange = function() {
			if (httpReqEdit.readyState == 4 && httpReqEdit.status == 200) {
				var jsonParse=JSON.parse(httpReqEdit.responseText);
				alert("editovali ste korisnika");
				dobaviPodatkeAdmin();

			}
		}
		httpReqEdit.open("PUT", "/Services/ADMIN/AdminRest.php", true);
		httpReqEdit.send(JSON.stringify(User));

}
function dodajUsera(){
	var httpReqDodaj = new XMLHttpRequest();
	var User = {};
		User.email = document.getElementById("Email").value;
		User.userName = document.getElementById("Usr").value;
		User.passHash = document.getElementById("AdminPassword").value;
		User.isAdmin = document.getElementById("IsAdmin").checked == true ? 1 : 0;
		User.id = null;
		httpReqDodaj.onreadystatechange = function() {
			if (httpReqDodaj.readyState == 4 && httpReqDodaj.status == 200) {
				var jsonParse=JSON.parse(httpReqDodaj.responseText);
				alert("dodali ste korisnika");
				dobaviPodatkeAdmin();

			}
		}
		httpReqDodaj.open("POST", "/Services/ADMIN/AdminRest.php", true);
		httpReqDodaj.send(JSON.stringify(User));

}