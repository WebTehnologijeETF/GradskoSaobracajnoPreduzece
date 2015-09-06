<div class="no-decoration">
			<ul>
			<?php
					$veza = new PDO("mysql:dbname=wt8;host=127.11.231.130;charset=utf8", "dbihorac", "password1");
				    $veza->exec("set names utf8");
				    $rezultat = $veza->query("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, slika, skraceno from vijest where id=".$_COOKIE["IDvijesti"]." order by vrijeme desc");
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
								print "<br /><br />";
								print $vijest['skraceno'];
								print "<br /><br />";
								print $vijest['tekst'];
								print "<br /><br />";						
						$comentarCount = $veza->query("select count(*) BrojKomentara from komentar where vijest=".$vijest["id"]);
						foreach($comentarCount as $i){
							print "<a href='#' onclick=\"prikaziPartial('komentari')\"> Komentari (".$i['BrojKomentara'].") </a>";	
						}
						print "<br /><br />";

										
						print "</div></li>";
					}
			?>
			
			</ul>
		</div>