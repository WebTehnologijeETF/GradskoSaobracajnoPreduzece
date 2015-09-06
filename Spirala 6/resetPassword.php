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
</head>

<body class="background">
	<div class="site-part header">
		<span><img src="Content\Prevoz.gif" alt="Gradsko saobraćajno preduzeće" class="header-image"></span>
		<span class="header-font-main">Trams</span>
		<span class="header-font">Putujte brže</span>
		<span> &nbsp; &nbsp; &nbsp;</span>
		<span id="Username" class="display-inline float-right">Dunja Bla &nbsp; </span>
		<span class="display-inline float-right"><a href="#">Logout &nbsp; </a></span>
		<span class="display-inline float-right"><a href="#" onclick="prikaziPartial('login')">Login &nbsp; </a></span>
		<span class="display-inline float-right"><a href="#" onclick="prikaziPartial('admin')">Admin Panel  &nbsp;</a></span>

	</div>	
	<div id="main-container" class="main-container">	
	<form id="resetForm">
	<p>
	Vas novi password: <br />
	<input type="password" id="resertPass"></input><br />
	Potvrdite password: <br />
	<input type="password" id="resertPassConfirm"></input><br /><br />
	<button type="submit" form="resetForm" formmethod="post">Resetuj</button>
	</p>
	</form>
	</div>
</body>

</html>