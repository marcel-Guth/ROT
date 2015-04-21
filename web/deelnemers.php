<head>
	<meta charset="UTF-8">
	<title>Ronde om Texel - deelname lijst</title>
</head>

<?php
$db = mysqli_connect("localhost", "Barning", "Barning81234", "rot");
$deelnames = array();
$deelnamessql = mysqli_query($db, "SELECT * FROM `deelname` ORDER BY `id`");

$deelnames = mysqli_fetch_all($deelnamessql,MYSQLI_ASSOC);
echo "<style>td { border: 1px solid black; } 
			 table { margin: auto auto; }
</style>";
echo "<table><thead><th>id</th><th>stuurman</th><th>fokkemaat</th><th>boot</th><th>zeilnummer</th></thead>";
$nr = 0;
foreach($deelnames as $deelname)
{
	$stuurman = array();
	$fokkemaat = array();
	$boot = array();
	$nr++;
	
	$stuurmansql1 = mysqli_query($db, "SELECT `deelnemerid` FROM `stuurman` WHERE `id`='".$deelname['stuurmanid']."'") or die(mysqli_error($db));
	$stuurman = mysqli_fetch_all($stuurmansql1,MYSQLI_NUM);
	$stuurmansql2 = mysqli_query($db, "SELECT `voornaam`, `tussenvoegsel`, `achternaam` FROM `deelnemer` WHERE id='".$stuurman[0][0]."'") or die(mysqli_error($db));
	$stuurman = mysqli_fetch_all($stuurmansql2,MYSQLI_NUM);
	
	$fokkemaatsql1 = mysqli_query($db, "SELECT `deelnemerid` FROM `fokkemaat` WHERE `id`='".$deelname['fokkemaatid']."' LIMIT 1") or die(mysqli_error($db));
	$fokkemaat = mysqli_fetch_all($fokkemaatsql1,MYSQLI_NUM);
	$fokkemaatsql2 = mysqli_query($db, "SELECT `voornaam`,`tussenvoegsel`,`achternaam` FROM `deelnemer` WHERE `id`='".$fokkemaat[0][0]."' LIMIT 1") or die(mysqli_error($db));
	$fokkemaat = mysqli_fetch_all($fokkemaatsql2,MYSQLI_NUM);
	
	$bootsql = mysqli_query($db, "SELECT `type` FROM `boot` WHERE `id`='".$deelname['bootid']."' LIMIT 1") or die(mysqli_error($db));
	$boot = mysqli_fetch_all($bootsql,MYSQLI_NUM);
	
	
	
	echo "<tr><td>".$nr."</td><td>".utf8_encode($stuurman[0][0])." ".utf8_encode($stuurman[0][1])." ".utf8_encode($stuurman[0][2])."</td><td>".utf8_encode($fokkemaat[0][0])." ".utf8_encode($fokkemaat[0][1])." ".utf8_encode($fokkemaat[0][2])."</td><td>".$boot[0][0]."</td><td>".$deelname['zeilnummer']."</td></tr>";
}

echo "</table>";