<?php
//require_once('non_connect.php');
function connect(){
	$bdd=new PDO('mysql:host=localhost;dbname=location;charset=utf8','root', '') or die(mysqli_error($bdd));
	return $bdd;
}
$bdd = connect();
if(isset($_GET['supprimer'])){
	
	
    	$id_voiture=$_GET['supprimer'];
    	$req=$bdd->exec("DELETE FROM voiture WHERE id_voiture='$id_voiture'");
    	header("location:Accueil.php");

    }
?>