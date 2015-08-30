<h3>Users:</h3>
<div id="adminUsers">
</div>
<button onclick="showForm()">Dodaj usera</button>
<div id="editUserForma" class="display-none">
	<form class="partners" id="UserEdit">
		UserID: <br /><span id="UserId"></span><br />
		Username: <br /><input id="Usr" type="text"></input><br />
		Email: <br /><input id="Email" type="text"></input><br />
		<a href="#" onclick="showResetPassword()" >+ Dodaj/promijeni password:</a><br />
		<div id="resetPass" class="display-none">
		Password: <br /><input id="AdminPassword" type="password"></input><br />
		Potvrdi password:<br /><input id="Password" type="password"></input><br /><br />
		</div>
		<input id="IsAdmin" type="checkbox">Admin</input><br/>
		<button form="UserEdit" onclick="editujdodajUsera()">Pošalji</button><br /><br />
	</form>
</div>