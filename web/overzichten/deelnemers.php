<?php
ini_set("display_errors", true);
echo "line1";
$db = mysqli_connect("localhost", "Barning", "Barning81234", "rot");

$deelnames = mysqli_query($db, "SELECT * FROM `deelname` ORDER BY `id`");

$deelnames = mysqli_fetch_all($deelnames,MYSQLI_ASSOC);

echo "<table><thead><th>stuurman</th><th>fokkemaat</th><th>boot</th><th>zeilnummer</th></thead>";

foreach($deelnames as $deelname)
{

	$stuurman = mysqli_query($db, "SELECT `deelnemerid` FROM `stuurman` WHERE `id`=".$deelname['stuurmanid']" LIMIT 1");
	$stuurman = mysqli_fetch_all($stuurman,MYSQLI_ASSOC);
	$stuurman = mysqli_query($db, "SELECT `voornaam`,`tussenvoegsel`,`achternaam` FROM `deelnemer` WHERE `id`=".$stuurman['deelnemerid']" LIMIT 1");
	$stuurman = mysqli_fetch_all($stuurman,MYSQLI_ASSOC);
	
	$fokkemaat = mysqli_query($db, "SELECT `deelnemerid` FROM `fokkemaat` WHERE `id`=".$deelname['fokkemaatid']" LIMIT 1");
	$fokkemaat = mysqli_fetch_all($fokkemaat,MYSQLI_ASSOC);
	$fokkemaat = mysqli_query($db, "SELECT `voornaam`,`tussenvoegsel`,`achternaam` FROM `deelnemer` WHERE `id`=".$fokkemaat['deelnemerid']" LIMIT 1");
	$fokkemaat = mysqli_fetch_all($fokkemaat,MYSQLI_ASSOC);
	
	$boot = mysqli_query($db, "SELECT `type` FROM `boot` WHERE `id`=".$deelname['bootid']" LIMIT 1");
	$boot = mysqli_fetch_all($boot,MYSQLI_ASSOC);
	
	$zeilnummer = $deelname['zeilnummer'];
	
	
	echo "<tr><td>".$stuurman['voornaam']." ".$stuurman['tussenvoegsel']." ".$stuurman['achternaam']."</td><td>".$fokkemaat['voornaam']." ".$fokkemaat['tussenvoegsel']." ".$fokkemaat['achternaam']."</td><td>".$boot['type']."</td><td>".$deelname['zeilnummer']."</td></tr>"
}

echo "</table>";