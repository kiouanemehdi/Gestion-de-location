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
                         <!--<li>
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

    <center>
        <h2>La liste des reservations</h2>
    </center>

    <?php 
session_start();
$update=false;
            $id_reservation="";
            $id_client="";
            $id_voiture="";
            $date_location="";
            $date_retour="";
            $montant="";
            $matricule="";
            $mail="";
$conn=new mysqli('localhost','root','','location') or die(mysqli_error($conn));

            if(isset($_GET['supprimer'])){
    
    
                $id_reservation=$_GET['supprimer'];
                $conn->query("DELETE FROM reservation WHERE id_reservation='$id_reservation'");
                header("location:reservations.php");
        
            }

    if(isset($_POST['ajouter']))
    {
            $id_client=$_POST['id_client'];
            $id_voiture=$_POST['mat_voiture'];
            $date_location=$_POST['date_debut'];
            $date_retour=$_POST['date_fin'];
            $montant=$_POST['prix_location'];
        $conn->query("INSERT INTO reservation (id_client,id_voiture,date_location,date_retour,montant) VALUES ('$id_client','$id_voiture','$date_location','$date_retour','$montant')") or die($conn->error);
        header("location:reservations.php");
    }
    if(isset($_POST['contrat']))
    {
        $mat_voiture=$_POST['mat_voiture'];
        $date_location=$_POST['date_debut'];
        $date_retour=$_POST['date_fin'];
        $test=$_POST['test'];
        $res=$conn->query("SELECT * FROM voiture WHERE id_voiture='$mat_voiture'") or die($conn->error);

        $row=$res->fetch_array();
            $matricule=$row['matricule'];
            $model=$row['model'];
            $marque=$row['marque'];

        $test=fopen("$matricule.txt","w");
        header("location:reservations.php");
    }


if(isset($_GET['editer']))
    {
        $id_reservation=$_GET['editer'];
        $_SESSION['id_resevaion_edit']=$id_reservation;
        $update=true;
        $res=$conn->query("SELECT * FROM reservation WHERE id_reservation='$id_reservation'") or die($conn->error);

        if(mysqli_num_rows($res))
        {
            $row=$res->fetch_array();
            $id_voiture=$row['id_voiture'];
            $id_client=$row['id_client'];
            $date_location=$row['date_location'];
            $date_retour=$row['date_retour'];
            $montant=$row['montant'];
            
        }
    }

    if(isset($_POST['modifier']))
    {
            $id_reservation=$_SESSION['id_resevaion_edit'];
            $id_voiture=$_POST['mat_voiture'];
            $id_client=$_POST['id_client'];
            $date_location=$_POST['date_debut'];
            $date_retour=$_POST['date_fin'];
            $montant=$_POST['prix_location'];
            
        $conn->query("UPDATE reservation SET id_voiture='$id_voiture',id_client='$id_client',date_location='$date_location',date_retour='$date_retour',montant='$montant' WHERE id_reservation=$id_reservation") or die($conn->error);
        header("location:reservations.php");

    }
   

         $res_voiture=$conn->query("SELECT id_voiture,matricule FROM voiture ") or die($conn->error);
         $res_client=$conn->query("SELECT id_client,mail FROM client ") or die($conn->error);

?>


    

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
     
    $etat=false;
    if(isset($_POST['search']) and !empty($_POST['search_input']))
    {
        
        $inp=$_POST['search_input'];
        $res=$conn->query("SELECT * FROM reservation WHERE id_reservation LIKE '$inp%' OR id_client LIKE '$inp%' or id_voiture LIKE '$inp%' or date_location LIKE '$inp%' or date_retour LIKE '$inp%' or montant LIKE '$inp%' order by id_reservation DESC") or die($conn->error);
        $etat=true;
    }
    else
    {

     $res=$conn->query("SELECT * FROM reservation") or die($conn->error);
}

    ?>



    <div class="row justify-content-center " style="margin-left: 18%; margin-top: 5px;">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <div class="table-responsive" style="width: 900px;">
                <table class="table table-striped table-hover table-dark">
                    
                    <thead class="thead-dark">
                        <th scope="col">id_reservation</th>
                        <!--<th scope="col">id_client</th>-->
                        <th scope="col">id_voiture</th>
                        <th scope="col">date de location</th>
                        <th scope="col">date de retour</th>
                        <th scope="col">montant</th>
                        
                       <!-- <th scope="col" colspan="2" >action</th>-->
                    </thead>

                    <?php while ($row=$res->fetch_assoc()):?> 
                        
                        <tr scope="row">
                            <td><?php echo $row['id_reservation']; ?></td>
                            <!--<td><?php //echo $row['id_client']; ?></td>-->
                            <td><?php echo $row['id_voiture']; ?></td>
                            <td><?php echo $row['date_location']; ?></td>
                            <td><?php echo $row['date_retour']; ?></td>
                            <td><?php echo $row['montant']; ?></td>
                            <!--<td>
                                <a href="reservations.php?editer=<?php echo $row['id_reservation']; ?>"
                                    class="btn btn-info" ><i class="fas fa-edit"></i></a>
                                    
                                <a href="reservations.php?supprimer=<?php echo $row['id_reservation']; ?>"
                                onclick="return confirm('êtes-vous sûr de vouloir supprimer cette reservation?')" class="btn btn-warning" ><i class="fas fa-trash-alt"></i>
                                </a>
                            </td>-->
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
