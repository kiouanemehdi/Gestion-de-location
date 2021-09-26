<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title> Home </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">	
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/Accueil_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                            <a id="btn_voitures" class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-car fa-3x"></i><br>
                                <p style="font-weight: bold;">Voitures</p>
                            </a>
                        </li>
                        <li   class="menu-hover">
                            <a id="btn_clients"  class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-user fa-3x"></i><br>
                                <p style="font-weight: bold;">Clients</p>
                            </a>
                            
                        </li>
                        <li class="menu-hover">
                            <a id="btn_reservations" class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-key fa-3x"></i><br>
                                <p style="font-weight: bold;">Reservations</p>
                            </a>
                        </li>
                        <li class="menu-hover">
                            <a id="btn_documents" class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-file-alt fa-3x"></i><br>
                                <p style="font-weight: bold;">Documents</p>
                            </a>
                        </li>
                        <li>
                            <a id="log_out_logo" href="#" class="nav-link" style="color: #d30038;">
                                <i style="color: #d30038;" class="fas fa-sign-out-alt fa-3x"></i><br>
                                <p style="font-weight: bold;"> Deconnexion</p>
                            </a>
                        </li>
                        </ul>   
                </div>
            </div>
        </div>
        
    </header>
<div id="resultat">
    <h1 class="text-center titre ">Choisissez une page </h1>
</div>


<?php 
     $conn=new mysqli('localhost','root','','location') or die(mysqli_error($conn));

     
     /* $res=$conn->query("SELECT * FROM place ") or die($conn->error);*/
   //$id=$_SESSION['id'];
   $etat=false;
    if(isset($_POST['search']) and !empty($_POST['search_input']))
    {
        
        $inp=$_POST['search_input'];
        $res=$conn->query("SELECT idp,type,place.nom,latitude,longitude,id_fk FROM place JOIN users WHERE users.id='$id' AND users.id=place.id_fk AND place.nom LIKE '$inp%' order by idp DESC") or die($conn->error);
        $etat=true;
    }
    else
    {

     $res=$conn->query("SELECT * FROM voiture") or die($conn->error);
     }

     ?>

     <div class="row justify-content-center " style="margin-left: 18%; margin-top: 30px;">
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
                        
                        <th scope="col" colspan="2" >action</th>
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
                                <a href="form_ajouter.php?editer=<?php echo $row['id_voiture']; ?>"
                                    class="btn btn-info" ><i class="fas fa-edit"></i></a>
                                    
                                <a href="supprimer.php?supprimer=<?php echo $row['id_voiture']; ?>"
                                onclick="return confirm('êtes-vous sûr de vouloir supprimer cette voiture?')" class="btn btn-warning" ><i class="fas fa-trash-alt"></i>
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

