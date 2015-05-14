		<div class="no-decoration">
			<ul>
			<?php
				session_start();
				$novosti = array();
				foreach(glob("../News/*.txt") as $fileName)
				{
					$nov = file($fileName);
					array_push($nov, $fileName);
					array_push($novosti, $nov);					
				}
				function sortingTime($a, $b)
				{
				    return strtotime($a[0])<strtotime($b[0]);
				}
				usort($novosti, "sortingTime");
				foreach($novosti as $novost){
					$duzinaFile=count($novost);
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
							$i=4;
							while($i<$duzinaFile-1 && strcmp(trim($novost[$i]),'--') != 0){
								print $novost[$i];
								$i++;
							}
							if($i<$duzinaFile-1){
								print "<br />";
							print "<span class='more'>";
							print "<a href='#' onclick='prikaziVijest('";
								$x = explode("/",$novost[$duzinaFile-1]);
								$l = $x[count($x)-1];
								print "'".trim($l)."'";
								print ")'>Opširnije...</a></span>													
							</span>";
							}
											
					print "</div></li>";	
				}				

			?>
			
			</ul>
		</div>