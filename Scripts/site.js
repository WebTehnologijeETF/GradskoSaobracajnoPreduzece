function prikaziPartial(partialName) { 
	var httpReq = new XMLHttpRequest();
	httpReq.onreadystatechange = function() {
		if (httpReq.readyState == 4 && httpReq.status == 200) {
			document.getElementById("main-container").innerHTML = httpReq.responseText;
		}
    }
	
	var parName = "Partials/"+partialName+".html";
	httpReq.open("GET",parName,true);
	httpReq.send();
}