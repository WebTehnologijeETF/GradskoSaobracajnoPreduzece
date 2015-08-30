<?php
$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "dbihorac", "password1");
$autor = $email = $text = "";
$autor = $_GET['autor'];
$email = $_GET['email'];
$text = $_GET['text'];
print "Uspjesno ste ostavili komentar, vratite se nazad na pocetnu stranicu";
$var = $veza->query("insert into komentar (kom_email, kom_text, kom_autor, vijest) values ('".$email."', '".$text."', '".$autor."', '".$_COOKIE["IDvijesti"]."');");
if (!$var) {
	$greska = $veza->errorInfo();
	print "SQL greška: " . $greska[2];
	exit();
}
?>