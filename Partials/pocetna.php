		<div class="no-decoration">
			<ul>
			 <?php
		     $veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "dbihorac", "password1");
		     $veza->exec("set names utf8");
		    $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, slika, skraceno from vijest order by vrijeme desc");
		    if (!$rezultat) {
		         $greska = $veza->errorInfo();
		          print "SQL greška: " . $greska[2];
		          exit();
		     }

		    foreach ($rezultat as $vijest) {
		    	print 
					"<li>
						<div class='news-container'>
							<span class='news-image'>
								<img src='".$vijest['slika']."' class='news-circle' alt='slika'>
							</span>						
							<span  class='news-text'>"
							.date("d.m.Y. (h:i)", $vijest['vrijeme2']).
							"<h4>".ucfirst(strtolower(trim($vijest['naslov'])))."</h4>"
							.$vijest['autor']."<br />";
							print $vijest['skraceno'];
							$comentarCount = $veza->query("select count(*) BrojKomentara from komentar where vijest=".$vijest["id"]);
							print "<br />";
							print "<span class='more'>";
							print "<a href='#' onclick=\"prikaziKomentare('";
							print trim($vijest['id']);	
							foreach($comentarCount as $i){
								print "')\">Komentari ".$i['BrojKomentara']."</a></br>";
							}
							if(strlen($vijest['tekst'])> 0){
								print "<br />";																							
								print "<a href='#' onclick=\"prikaziVijest('";								
								print trim($vijest['id']);
								print "')\">Opširnije...</a></span>";
							}
							
											
					print "</div></li>";
		     }
    		?>
			
			</ul>
		</div>