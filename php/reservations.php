<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title> Home </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">	
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/Accueil_style.css">
</head>

<body>

<header style="position: relative;">
        <div style="background-color: #292b2c; height: 100px;" class="px-3 py-2 text-white">
            <div class="container">
                <div id="logo" style="position: absolute;margin-top: -70px;">
                    <img style="" src="../img/logo.png" height="240px" width="240px">
                </div>
                <div style="position: absolute;" id="menu" class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <ul id="nav" class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li class="menu-hover">
                            <a href="voitures.php" class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-car fa-3x"></i><br>
                                <p style="font-weight: bold;">Voitures</p>
                            </a>
                        </li>
                        <!--<li   class="menu-hover">
                            <a href="clients.php"  class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-user fa-3x"></i><br>
                                <p style="font-weight: bold;">Clients</p>
                            </a>
                            
                        </li>-->
                        <li class="menu-hover">
                            <a href="reservations.php" class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-key fa-3x"></i><br>
                                <p style="font-weight: bold;">Reservations</p>
                            </a>
                        </li>
                       <li class="menu-hover">
                            <a href="historique.php" class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-history fa-3x"></i><br>
                                <p style="font-weight: bold;">Historique</p>
                            </a>
                        </li>
                        <!-- <li>
                            <a id="log_out_logo" href="#" class="nav-link" style="color: #d30038;">
                                <i style="color: #d30038;" class="fas fa-sign-out-alt fa-3x"></i><br>
                                <p style="font-weight: bold;"> Deconnexion</p>
                            </a>
                        </li>-->
                        </ul>   
                </div>
            </div>
        </div>
        
    </header>

    <?php 
session_start();
$update=false;
$recherche=false;
            $id_reservation="";
            $id_client="";
            //$id_voiture="";
            $date_location="";
            $date_retour="";
            $montant="";
            //$matricule="";
            $mail="";

            $id_voiture="";
            $matricule="";
            $model="";
            $marque="";
            $categorie="";
            $prix_location="";


$conn=new mysqli('localhost','root','','location') or die(mysqli_error($conn));

            if(isset($_GET['supprimer'])){
    
    
                $id_reservation=$_GET['supprimer'];
                $conn->query("DELETE FROM reservation WHERE id_reservation='$id_reservation'");
                header("location:reservations.php");
        
            }

    if(isset($_POST['ajouter']))
    {
            $id_client=1;
            $id_voiture_add=$_SESSION['id_voiture_edit'];
            $date_location=$_POST['date_debut'];
            $date_retour=$_POST['date_fin'];
            $montant=$_POST['prix_voit'];



        
       /* header("location:reservations.php");
    }
    if(isset($_POST['contrat']))
    {*/

        


        $mat_voiture=$_POST['mat_voiture'];
        $date_location=$_POST['date_debut'];
        $date_retour=$_POST['date_fin'];
        $tel=$_POST['tel'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $montant=$_POST['prix'];
        $model=$_POST['model'];
        $marque=$_POST['marque'];
        $email=$_POST['email'];


        if (!file_exists("../Contrat/"."$nom")) 
        {
                mkdir("../Contrat/"."$nom", 0777, true);
        }


        $test=fopen("../Contrat/"."$nom"."/"."$mat_voiture"."_"."$date_location"."_"."$date_retour.txt","a+");
        file_put_contents("../Contrat/"."$nom"."/"."$mat_voiture"."_"."$date_location"."_"."$date_retour.txt", '*********Contrat de Location*********',FILE_APPEND);
        fwrite($test, "\n");
        file_put_contents("../Contrat/"."$nom"."/"."$mat_voiture"."_"."$date_location"."_"."$date_retour.txt", "Nom :$nom \n Prenom: $prenom \n   Permis: $tel \n   Email: $email",FILE_APPEND);
        fwrite($test, "\n\n");
        file_put_contents("../Contrat/"."$nom"."/"."$mat_voiture"."_"."$date_location"."_"."$date_retour.txt", "Marque: $marque  model: $model \n   prix_location: $montant",FILE_APPEND);
        fwrite($test, "\n\n");
        file_put_contents("../Contrat/"."$nom"."/"."$mat_voiture"."_"."$date_location"."_"."$date_retour.txt", "Date de location: $date_location \n   Date de retour: $date_retour",FILE_APPEND);
        fwrite($test, "\n\n");
        file_put_contents("../Contrat/"."$nom"."/"."$mat_voiture"."_"."$date_location"."_"."$date_retour.txt", "Prix de location par jour : $montant",FILE_APPEND);
        fwrite($test, "\n\n");
        file_put_contents("../Contrat/"."$nom"."/"."$mat_voiture"."_"."$date_location"."_"."$date_retour.txt", "Merci de votre confiance: \n\n Signature Client  :                    cachet Agence:",FILE_APPEND);
        
        
        header("location:reservations.php");
    }

   if(isset($_GET['reserver']))
    {
        $id_voiture=$_GET['reserver'];
        $_SESSION['id_voiture_edit']=$id_voiture;
       // $update=true;
        $res=$conn->query("SELECT * FROM voiture WHERE id_voiture='$id_voiture'") or die($conn->error);

        if(mysqli_num_rows($res))
        {
            $row=$res->fetch_array();
            $id_voiture=$row['id_voiture'];
            $matricule=$row['matricule'];
            $model=$row['model'];
            $marque=$row['marque'];
            $categorie=$row['categorie'];
            $prix_location=$row['prix_location'];
        }
    }



         $res_voiture=$conn->query("SELECT id_voiture,matricule FROM voiture ") or die($conn->error);
         $res_client=$conn->query("SELECT id_client,mail FROM client ") or die($conn->error);

?>


    
    <div id='cadre' style='margin-left:25%; margin-top:50px;'>

        <form action="reservations.php" method="POST">
        <div class='form-row'>
       <!-- <input type="text" name="test" >-->
 <h3> Info Voiture</h3>

        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Matricule de Voiture</label>
          <input type="text" name="mat_voiture" id='mat_voiture' class='form-control' readonly="readonly"  value="<?php echo $matricule;  ?>">
      
        </div>

        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
            <label >Prix</label>
             <input type="text" id='prix'  name="prix" class='form-control' readonly="readonly"  value="<?php echo $prix_location;  ?>">
        </div>

        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
            <label >Marque</label>
            <input type="text" id='marque'  name="marque" class='form-control' readonly="readonly"  value="<?php echo $marque;  ?>">

        </div>
    </div>
<div class='form-row'>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
            <label >Model</label>
             <input type="text" id='model'  name="model" class='form-control' readonly="readonly"  value="<?php echo $model;  ?>">

        </div>

        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
            <label >Categorie</label>
             <input type="text" id='Categorie'  name="categorie" class='form-control' readonly="readonly"  value="<?php echo $categorie;  ?>">

        </div>
</div>

<div class='form-row'>

 <h3> Info reservation</h3>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Date de debut</label>
          <input type='date'  name="date_debut" class='form-control' id='date_debut' value="<?php echo $date_location;  ?>">
        </div>
      

      <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Date de fin</label>
          <input type='date'  name="date_fin" class='form-control' id='date_fin' value="<?php echo $date_retour;  ?>">
        </div>
      </div>


<h3 > Info Client</h3>
<div class='form-row' >

    <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >Nom</label>
          <input type='text'  name="nom" class='form-control' id='Prix' value="<?php //echo $ ?>">
    </div>
    <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >Prenom</label>
          <input type='text'  name="prenom" class='form-control' id='Prix' value="<?php //echo $ ?>">
    </div>
 </div>
    <div class='form-row'>
<div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >Permis</label>
          <input type='text'  name="tel" class='form-control' id='tel' value="<?php //echo $ ?>">
    </div>
    <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >Email</label>
          <input type='email'  name="email" class='form-control' id='email' value="<?php //echo $ ?>">
    </div>

    <!-- <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >Email</label>
          <input type='email'  name="email" class='form-control' id='email' value="<?php //echo $ ?>">
    </div> -->


</div>

</div>

        <div class='form-row' style='margin-top:30px; margin-left:25%'>

            <?php if($update==true): ?>
                <button id='modifier' name="modifier" class='btn btn-success'> Modifier </button>
            <?php else: ?>
                <button id='ajouter' name="ajouter" class='btn btn-success'> Ajouter </button>
                <!--<button id='contrat' name="contrat" class='btn btn-primary'> contrat </button>-->
            <?php endif; ?>
                
                <button id='effacer'class='btn btn-warning'> Effacer </button>
                
        </div>
</form>

</div>
<script type='text/javascript'> 

            $('#effacer').click(function (event) {
                
                    $('#mat_voiture').val('');
                    $('#client').val('');
                    $('#date_debut').val('');
                    $('#date_fin').val('');
                    $('#Prix').val('');

            });

        </script>


        <?php 
     
   
    if(isset($_POST['search']) and !empty($_POST['search_input']))
    {
         $recherche=true;
        $inp=$_POST['search_input'];
        $_SESSION['recherche']=$inp;
        $res=$conn->query("SELECT * FROM voiture WHERE categorie LIKE '$inp%' OR model LIKE '$inp%' or matricule LIKE '$inp%' or marque LIKE '$inp%' or prix_location LIKE '$inp%' order by id_voiture DESC") or die($conn->error);
        $etat=true;
    }
    else
    {

     $res=$conn->query("SELECT * FROM voiture") or die($conn->error);
}

    ?>

<div style="">
    
<div class="search-container" style="margin-top: 20px; ">
     <form method="POST"  action="reservations.php" style="display: inline-block;">

        <input type="text" name="search_input" style="margin-bottom: 10px; ">
        <button type="submit" value="chercher" name="search"class="btn btn-light"><i class="fas fa-search"></i></button>
        
     </form>
</div>
<div class="term_recherche" style="margin-left: 840px;" >
        <?php if ($recherche==true) { ?>

            <p> Votre derniere recherche est : " <?php echo $_SESSION['recherche']; ?> "</p>

            <a href="reservations.php" class="btn btn-warning"> Annuler votre recherche</a>

        <?php } ?>
    </div>
</div>


    <div class="row justify-content-center " style="margin-left: 18%; margin-top: 5px; display:block;">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <div class="table-responsive" style="width: 900px;">
                <table class="table table-striped table-hover table-dark">
                    
                    <thead class="thead-dark">
                        <th scope="col">id_voiture</th>
                        <th scope="col">matricule</th>
                        <th scope="col">model</th>
                        <th scope="col">marque</th>
                        <th scope="col">categorie</th>
                        <th scope="col">prix</th>
                        
                        <th scope="col" colspan="1" >action</th>
                    </thead>

                    <?php while ($row=$res->fetch_assoc()):?> 
                        
                        <tr scope="row">
                            <td><?php echo $row['id_voiture']; ?></td>
                            <td><?php echo $row['matricule']; ?></td>
                            <td><?php echo $row['model']; ?></td>
                            <td><?php echo $row['marque']; ?></td>
                            <td><?php echo $row['categorie']; ?></td>
                            <td><?php echo $row['prix_location']; ?></td>
                            <td>
                                <!--<a href="reservations.php?editer=<?php echo $row['id_voiture']; ?>"
                                    class="btn btn-info" ><i class="fas fa-edit"></i></a>
                                    
                                <a href="reservations.php?supprimer=<?php echo $row['id_voiture']; ?>"
                                onclick="return confirm('êtes-vous sûr de vouloir supprimer cette voiture?')" class="btn btn-warning" ><i class="fas fa-trash-alt"></i>
                                </a>-->

                                <a href="reservations.php?reserver=<?php echo $row['id_voiture']; ?>"
                                class="btn btn-success" ><i class="fas fa-key"></i>
                                </a>


                            </td>
                        </tr>
                    <?php endwhile; ?>
                    
                </table>
                </div>
            </div>
    </div>







    <script src="../js/main.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/all.js"></script>
    <script src="../js/menu.js"></script>
    </body>

</html>
