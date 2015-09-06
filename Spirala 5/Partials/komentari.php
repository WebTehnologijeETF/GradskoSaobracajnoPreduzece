<div class="no-decoration">
			<form action="Partials/komentar.php" class="news-text">
				Ime:
				<input type="text" id="autor" name="autor"/><br /><br />
				Email:
				<input type="text" id="email" name="email"/><br /><br />
				Komentar:<br />
				<textarea rows="6" cols="40" name="text"></textarea><br /><br />
				<input type="submit" name="ostaviKomentar" value="Ostavi Komentar" ></input><br /><br />
			</form>
			<ul>				
			<?php
					$veza = new PDO("mysql:dbname=trams;host=localhost;charset=utf8", "dbihorac", "password1");
				    $veza->exec("set names utf8"); 

				    $rezultat = $veza->query("select id, email, text, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor from komentar where vijest=".$_COOKIE["IDvijesti"]." order by vrijeme desc");
				    if (!$rezultat) {
				         $greska = $veza->errorInfo();
				          print "SQL greška: " . $greska[2];
				          exit();
				     }
				     $i = 0;
				     foreach ($rezultat as $komentar) {
				     	$i++;
						print 
						"<li>
							<div class='news-container'>
								<br />													
								<span  class='news-text'>
								Komentar ".$i.": <br/>"
								.date("d.m.Y. (h:i)", $komentar['vrijeme2']).
								"<br />"
								.$komentar['autor']."<br />";
						print "<br /><br />";
						print $komentar['text'];
						print "<br /><br />";										
						print "</div></li>";
					}
			?>
			
			</ul>
		</div>