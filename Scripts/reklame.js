function kreirajReklamu(slika, opis){
	var html = "<div class='reklama'><span class='reklamaSlika'><img src='"+slika+"' alt='reklama'></span>	<span class='reklamaOpis'>"+opis+"</span></div>";
	return html;
}

function getReklame() {
	var httpReq = new XMLHttpRequest();

	httpReq.onreadystatechange = function() {
		if (httpReq.readyState == 4 && httpReq.status == 200) {
			var result = JSON.parse(httpReq.responseText);
			for(var i = 0; i < result.length; i++) { 
				var temp = kreirajReklamu(result["slika"], result["opis"]); 
				document.getElementById("reklame").innerHTML += temp;
			}
		}
    }
	
	httpReq.open("GET", "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=15833", true);
	httpReq.send();

}