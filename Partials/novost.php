<div class="no-decoration">
			<ul>
			<?php
				$novost = file("../News/".$_COOKIE["Filename"]);
				$duzinaFile = count($novost);
					print 
					"<li>
						<div class='news-container'>
							<span class='news-image'>
								<img src='".trim($novost[3])."' class='news-circle' alt='slika'>
							</span>						
							<span  class='news-text'>"
							.trim($novost[0]).
							"<h4>".ucfirst(strtolower(trim($novost[2])))."</h4>"
							.$novost[1]."<br />";
							print "<br /><br />";
							$i=4;
							while($i<$duzinaFile && strcmp(trim($novost[$i]),'--') != 0){
								print $novost[$i];
								$i++;
							}
							$i++;
							print "<br /><br />";
							while($i<$duzinaFile){								
								print $novost[$i];
								$i++;
							}
							
											
					print "</div></li>";

			?>
			
			</ul>
		</div>