<?php


function connect(){
	$bdd=new PDO('mysql:host=localhost;dbname=location;charset=utf8','root', '') or die(mysqli_error($bdd));
	return $bdd;
}

       // echo "test 1 ".$_POST['test1']." test 2 ".$_POST['test2'];
$bdd = connect();
        $Matricule=$_POST['Matricule'];
        $Marque=$_POST['Marque'];
		$Model=$_POST['Model'];
        $Prix=$_POST['Prix'];
        $Couleur=$_POST['Couleur'];
        $Disponibilite=$_POST['Disponibilite'];

	
	$req=$bdd->exec("INSERT into voiture(matricule,model,marque,categorie,prix_location) values('$Matricule','$Model','$Marque','$Couleur','$Prix') ");