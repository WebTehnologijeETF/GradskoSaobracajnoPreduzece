      <form id="Contact"class="contact">

      <p>Svrha kontaktiranja naseg preduzeca: <br />
        <input id="svrhaVal" list="svrha"><span id="validSvrha" class="display-inline"><img src="Content\valid.png" alt="validan unos"></span>
      <datalist id="svrha">        
        <option value="Primjedba">
        <option value="Zalba">
        <option value="Pitanje">
        <option value="Pohvala">
        <option value="Prijedlog">
      </datalist><br />

      <!--Required---regex za email-->
       Vas email: <br />      
       <input id="emailVal" type="text" onchange="ValidirajEmail()" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
       <span id="validEmail" class="display-none"><img src="Content\valid.png" alt="validan unos"><br /></span>
       <span id="invalidEmail" class="display-inline"><img src="Content\novalid.png" alt="nije validan unos"><br /></span>

       <!--Required---regex za email-->
       Potvrdite vas email: <br />      
       <input id="potvrdiEmailVal" type="text" onchange="PotvrdiEmail()" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
       <span id="validPotvrdiEmail" class="display-none"><img src="Content\valid.png" alt="validan unos"><br /></span>
       <span id="invalidPotvrdiEmail" class="display-inline"><img src="Content\novalid.png" alt="nije validan unos"><br /></span>

       <!--Not Required---regex za samo slova razmak-->
       Vase ime i prezime:<br />
       <input id="imeVal" type="text" onchange="ValidirajIme()" pattern="^[a-zA-Z ,.'-]+$" required>
       <span id="validIme" class="display-none"><img src="Content\valid.png" alt="validan unos"><br /></span>
       <span id="invalidIme" class="display-inline"><img src="Content\novalid.png" alt="nije validan unos"><br /></span>
       
       <!--Required-->
       <p>Text:
       <span id="validText" class="display-none"><img src="Content\valid.png" alt="validan unos"><br /></span>
       <span id="invalidText" class="display-inline"><img src="Content\novalid.png" alt="nije validan unos"><br /></span>
       <textarea id="textVal" rows="4" cols="50" class="contact-textearea" onchange="ValidirajText()" placeholder="Ovdje upišite text vaše poruke..." maxlength="100" required></textarea>

       Vase mjesto i postanski broj: <br /></p>
       <input id="mjesto" type="text" placeholder="Mjesto" onchange="validirajMjestoBroj()"><input id="postanskiBroj" type="text" placeholder="postanski broj" onchange="validirajMjestoBroj()">
       <span id="validMjestoBroj" class="display-none"><img src="Content\valid.png" alt="validan unos"><br /></span>
       <span id="invalidMjestoBroj" class="display-inline"><img src="Content\novalid.png" alt="nije validan unos"><br /></span>
       <span id="validityText"></span><br /><br />
       
       <button type="submit" class="contact-button" form="Contact" formmethod="post">Pošalji</button>
       
       <button type="reset" class="contact-button" form="Contact">Obriši sve</button>
      </form>