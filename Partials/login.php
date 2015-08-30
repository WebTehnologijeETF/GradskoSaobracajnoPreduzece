<form id="Login"class="contact">
<div id="sakrij">
      <p id="us">Username: <br />
      <input id="UsernameLogin" type="text"></input>

       <p id="ps">Password: <br />
       <input id="PasswordLogin" type="password"></input>

      <button id="loginButton" type="submit" class="contact-button" form="Login" onclick="authenticate()">Login</button><br />
      
      <span class="partners"><a href="#" onclick="prikaziReset()">Zaboravljen password</a></span><br />
      <div class="display-none" id="zaboravljenPassword">
	      <p>Email: <br />
	      <input id="zaboravljeniEmail" type="text"></input>
	      <button type="submit" onclick="posaljiMail()">Posalji</button>
      </div>
</div>

      <span id="greska"></span>

</form>