<?php

$bdd=new PDO('mysql:host=localhost;dbname=location;charset=utf8','root','');

// préparation requête
$req1 = $bdd->prepare('SELECT * FROM voiture');


// exécution de la requête
$req1->execute();


// récupération des résultats en une seule fois

$voitures = $req1->fetchAll();

//var_dump($voitures);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Liste voitures</title>
</head>
<body>
<form action="recherche.php" method="post">
	
		<label for="select-categorie">Sélectionner une catégorie de voiture :</label>
	<select name="categorie" id="select-categorie">
    	<option value="">--Choisir une option--</option>
    	<option value="berline">Berline</option>
    	<option value="citadine">Citadine</option>
    	<option value="SUV">SUV</option>
	</select>
	<input type="submit" value="Rechercher">
	
	

</form>

</body>
</html>
