var httpReq = new XMLHttpRequest();

function prikaziPartial(partialName) { 	
	httpReq.onreadystatechange = function() {
		if (httpReq.readyState == 4 && httpReq.status == 200) {
			document.getElementById("main-container").innerHTML = httpReq.responseText;
		}
    }	
	var parName = "Partials/"+partialName+".php";
	httpReq.open("GET",parName,true);
	httpReq.send();
}
function prikaziVijest(filename){
	document.cookie="Filename="+filename;
	prikaziPartial('novost');
}
