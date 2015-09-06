<!DOCTYPE html>
<html>
<head>
  <title>Gradsko Saobraćajno Preduzeće</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="Style\site.css">
  <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <script src="Scripts/stablo.js"></script>
  <script src="Scripts/forma.js"></script>
  <script src="Scripts/site.js"></script>
  <script src="Scripts/admin.js"></script>
</head>

<body class="background" onload="prikaziPartial('pocetna'); provjeriCookie()">
	<div class="site-part header">
		<span><img src="Content\Prevoz.gif" alt="Gradsko saobraćajno preduzeće" class="header-image"></span>
		<span class="header-font-main">Trams</span>
		<span class="header-font">Putujte brže</span>
		<span> &nbsp; &nbsp; &nbsp;</span>
		<span id="Username" class="display-none float-right">Dunja Bla &nbsp; </span>
		<span id="Logout" class="display-none float-right"><a href="#" onclick="logout()">Logout &nbsp; </a></span>
		<span id="Login" class="display-inline float-right"><a href="#" onclick="prikaziPartial('login')">Login &nbsp; </a></span>
		<span id="AdminPanel" class="display-none float-right"><a href="#" onclick="prikaziPartial('admin'); dobaviPodatkeAdmin()">Admin Panel  &nbsp;</a></span>

	</div>
	<div class="site-part main-menu">
		<ul>
		  <li><a href="#" onclick="prikaziPartial('pocetna')">Naslovnica</a></li>
		  <li><a href="#" onclick="prikaziPartial('redvoznje')">Red Vožnje</a></li>
		  <li><a href="#" onclick="prikaziPartial('onama')">O nama</a></li>
		  <li><a href="#" onclick="prikaziPartial('saznajvise')">Saznaj više</a></li>
		  <li><a href="#" onclick="prikaziPartial('kontakt')">Kontakt</a></li>
		</ul>
	</div>
	<div id="main-container" class="main-container">			
	</div>
</body>

</html>