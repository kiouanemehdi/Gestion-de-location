<?php 

$bdd=new PDO('mysql:host=localhost;dbname=location;charset=utf8','root','');
	
if (isset($_POST['categorie'])) {

	$req1 = $bdd->prepare('SELECT * FROM voiture WHERE categorie LIKE :cat');

	$req1->bindValue(':cat', $_POST['categorie']);

	// exécution de la requête
	$executeIsOk = $req1->execute();

	// récupération des résultats en une seule fois
	$voitures = $req1->fetchAll();
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<h1>Liste des voitures</h1>
	<table border="1">
	<tr>
        <th>Catégorie</th>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Prix de location en €</th>
        <th>Matricule</th>

      </tr>

	<?php foreach ($voitures as $voiture): ?>	

      <tr>
        <td><?= $voiture["categorie"] ?></td>
        <td><?= $voiture['marque'] ?></td>
        <td><?= $voiture['model'] ?></td>
        <td><?= $voiture['prix_location'] ?></td>
        <td><?= $voiture['matricule'] ?></td>

      </tr>

	<?php endforeach; ?>
</body>
</html>
