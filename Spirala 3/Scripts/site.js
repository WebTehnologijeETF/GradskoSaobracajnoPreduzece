var httpReq = new XMLHttpRequest();

function prikaziPartial(partialName) { 	
	httpReq.onreadystatechange = function() {
		if (httpReq.readyState == 4 && httpReq.status == 200) {
			document.getElementById("main-container").innerHTML = httpReq.responseText;
		}
    }	
	var parName = "Partials/"+partialName+".html";
	httpReq.open("GET",parName,true);
	httpReq.send();
}
function prikaziVijest(id){
	document.cookie="IDvijesti="+id;
	prikaziPartial('novost');
}