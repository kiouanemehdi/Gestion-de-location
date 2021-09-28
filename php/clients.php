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
                        <li   class="menu-hover">
                            <a href="clients.php"  class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-user fa-3x"></i><br>
                                <p style="font-weight: bold;">Clients</p>
                            </a>
                            
                        </li>
                        <li class="menu-hover">
                            <a href="reservations.php" class="nav-link " style="color: white;">
                                <i style="color: white;" class="fas fa-key fa-3x"></i><br>
                                <p style="font-weight: bold;">Reservations</p>
                            </a>
                        </li>
                        <li class="menu-hover">
                            <a id="documents.php" class="nav-link " style="color: white;">
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


<?php 
session_start();
$update=false;
            $id_client="";
            $mail="";
            $prenom="";
            $nom="";
            $adresse="";
            $tel="";
            $conn=new mysqli('localhost','root','','location') or die(mysqli_error($conn));

            if(isset($_GET['supprimer'])){
	
	
                $id_client=$_GET['supprimer'];
                $conn->query("DELETE FROM client WHERE id_client='$id_client'");
                header("location:clients.php");
        
            }

    if(isset($_POST['ajouter']))
    {
        
        //$id_client=$row['id_client'];
            $mail=$_POST['mail'];
            $prenom=$_POST['prenom'];
            $nom=$_POST['nom'];
            $adresse=$_POST['adresse'];
            $tel=$_POST['tel'];


        $conn->query("INSERT INTO client (mail,prenom,nom,adresse,tel) VALUES ('$mail','$prenom','$nom','$adresse','$tel')") or die($conn->error);


        header("location:clients.php");
    
    }


if(isset($_GET['editer']))
    {
        $id_client=$_GET['editer'];
        $_SESSION['id_client_edit']=$id_client;
        $update=true;
        $res=$conn->query("SELECT * FROM client WHERE id_client='$id_client'") or die($conn->error);

        if(mysqli_num_rows($res))
        {

            $row=$res->fetch_array();
            $id_client=$row['id_client'];
            $mail=$row['mail'];
            $prenom=$row['prenom'];
            $nom=$row['nom'];
            $adresse=$row['adresse'];
            $tel=$row['tel'];
        }
    }

    if(isset($_POST['modifier']))
    {
            $id_client=$_SESSION['id_client_edit'];
            $mail=$_POST['mail'];
            $prenom=$_POST['prenom'];
            $nom=$_POST['nom'];
            $adresse=$_POST['adresse'];
            $tel=$_POST['tel'];
        $conn->query("UPDATE client SET mail='$mail',prenom='$prenom',nom='$nom',adresse='$adresse',tel='$tel' WHERE id_client=$id_client") or die($conn->error);
        header("location:clients.php");

    }


?>



<div id="form">
    <h1 class="text-center titre ">Clients </h1>
    
    <div id='cadre' style='margin-left:25%; margin-top:50px;'>


<form action="clients.php" method="POST">
        <div class='form-row'>
        
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >nom</label>
          <input type="text" name="nom" class='form-control' value="<?php echo $nom ?>">
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >prenom</label>
          <input type='text'  name="prenom" class='form-control' id='prenom' value="<?php echo $prenom ?>">
        </div>
        <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >mail</label>
          <input type='text' name="mail" class='form-control' id='mail' value="<?php echo $mail ?>">
        </div>
      </div>

      <div class='form-row' style='margin-top:20px;'>
        <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >tel</label>
          <input type='number'  name="tel" class='form-control' id='tel' value="<?php echo $tel ?>">
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >adresse</label>
          <input type='text'  name="adresse" class='form-control' id='adresse' value="<?php echo $adresse ?>">
        </div>
        
    </div>

        <div class='form-row' style='margin-top:30px; margin-left:25%'>

            <?php if($update==true): ?>
                <button id='modifier' name="modifier" class='btn btn-success'> Modifier </button>
            <?php else: ?>
                <button id='ajouter' name="ajouter" class='btn btn-success'> Ajouter </button>
            <?php endif; ?>
                
                <!--<button id='modifier'class='btn btn-primary'> Modifier </button>
                <button id='supprimer'class='btn btn-danger'> Supprimer </button>-->
                <button id='effacer'class='btn btn-warning'> Effacer </button>
                
        </div>
</form>
    </div>


        
<script type='text/javascript'> 

            $('#effacer').click(function (event) {
                
                    $('#mail').val('');
                    $('#nom').val('');
                    $('#prenom').val('');
                    $('#tel').val('');
                    $('#adresse').val('');
                    $('#Disponibilite').val('');
                });

        </script>
     
</div>




<div class="search-container" style=" margin-top: 20px;">
	 <form method="POST"  action="clients.php" style="display: inline-block;">

	 	<input type="text" name="search_input" style="margin-bottom: 20px; ">
	 	<button type="submit" value="chercher" name="search"class="btn btn-light"><i class="fas fa-search"></i></button>
	 	
	 </form>
</div>


<?php 
     
    $etat=false;
    if(isset($_POST['search']) and !empty($_POST['search_input']))
    {
        
        $inp=$_POST['search_input'];
        $res=$conn->query("SELECT * FROM client WHERE adresse LIKE '$inp%' OR prenom LIKE '$inp%' or mail LIKE '$inp%' or nom LIKE '$inp%' or tel LIKE '$inp%' order by id_client DESC") or die($conn->error);
        $etat=true;
    }
    else
    {

     $res=$conn->query("SELECT * FROM client") or die($conn->error);
}

    ?>



    <div class="row justify-content-center " style="margin-left: 18%; margin-top: 5px;">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <div class="table-responsive" style="width: 1100px;">
                <table class="table table-striped table-hover table-dark">
                    
                    <thead class="thead-dark">
                        <th scope="col">id_client</th>
                        <th scope="col">prenom</th>
                        <th scope="col">nom</th>
                        <th scope="col">adresse</th>
                        <th scope="col">tel</th>
                        <th scope="col">mail</th>
                        
                        
                        <th scope="col" colspan="2" >action</th>
                    </thead>

                    <?php while ($row=$res->fetch_assoc()):?> 
                        
                        <tr scope="row">
                            <td><?php echo $row['id_client']; ?></td>
                            <td><?php echo $row['Prenom']; ?></td>
                            <td><?php echo $row['Nom']; ?></td>
                            <td><?php echo $row['adresse']; ?></td>
                            <td><?php echo $row['tel']; ?></td>
                            <td><?php echo $row['mail']; ?></td>
                            <td>
                                <a href="clients.php?editer=<?php echo $row['id_client']; ?>"
                                    class="btn btn-info" ><i class="fas fa-edit"></i></a>
                                    
                                <a href="clients.php?supprimer=<?php echo $row['id_client']; ?>"
                                onclick="return confirm('êtes-vous sûr de vouloir supprimer ce client?')" class="btn btn-warning" ><i class="fas fa-trash-alt"></i>
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

