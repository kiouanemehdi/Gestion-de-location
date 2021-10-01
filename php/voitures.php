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
                                <p style="font-weight: bold;">Documents</p>
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
            $id_voiture="";
            $matricule="";
            $model="";
            $marque="";
            $categorie="";
            $prix_location="";
            $conn=new mysqli('localhost','root','','location') or die(mysqli_error($conn));

            if(isset($_GET['supprimer'])){
	
	
                $id_voiture=$_GET['supprimer'];
                $conn->query("DELETE FROM voiture WHERE id_voiture='$id_voiture'");
                header("location:voitures.php");
        
            }

    if(isset($_POST['ajouter']))
    {
            $matricule=$_POST['matricule'];
            $model=$_POST['model'];
            $marque=$_POST['marque'];
            $categorie=$_POST['categorie'];
            $prix_location=$_POST['prix_location'];
        $conn->query("INSERT INTO voiture (matricule,model,marque,categorie,prix_location) VALUES ('$matricule','$model','$marque','$categorie','$prix_location')") or die($conn->error);
        header("location:voitures.php");
    }


if(isset($_GET['editer']))
    {
        $id_voiture=$_GET['editer'];
        $_SESSION['id_voiture_edit']=$id_voiture;
        $update=true;
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

    if(isset($_POST['modifier']))
    {
            $id_voiture=$_SESSION['id_voiture_edit'];
            $matricule=$_POST['matricule'];
            $model=$_POST['model'];
            $marque=$_POST['marque'];
            $categorie=$_POST['categorie'];
            $prix_location=$_POST['prix_location'];
        $conn->query("UPDATE voiture SET matricule='$matricule',model='$model',marque='$marque',categorie='$categorie',prix_location='$prix_location' WHERE id_voiture=$id_voiture") or die($conn->error);
        header("location:voitures.php");

    }


?>



<div id="form">
    <h1 class="text-center titre ">Choisissez une page </h1>
    
    <div id='cadre' style='margin-left:25%; margin-top:50px;'>


<form action="voitures.php" method="POST">
        <div class='form-row'>
        <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >Matricule</label>
          <input type='text' name="matricule" class='form-control' id='Matricule' value="<?php echo $matricule ?>">
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Marque</label>
          <input type="text" name="marque" class='form-control' value="<?php echo $marque ?>">
          <!--<select id='Marque'  name="marque" class='form-control' value="<?php //echo $marque ?>">
             <option selected>Choose...</option>
            <option> peugeot</option>
            <option>renault</option>
            <option>Tesla</option>
            <option >volvo</option>
            
          </select>-->
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Model</label>
          <input type='text'  name="model" class='form-control' id='Model' value="<?php echo $model ?>">
        </div>
      </div>

      <div class='form-row' style='margin-top:20px;'>
        <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >Prix</label>
          <input type='number'  name="prix_location" class='form-control' id='Prix' value="<?php echo $prix_location ?>">
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Categorie</label>
          <input type='text'  name="categorie" class='form-control' id='Couleur' value="<?php echo $categorie ?>">
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Disponibilite</label>
          <select id='Disponibilite'  name="disponibilite" class='form-control' value="">
            <option selected >Choose...</option>
            <option value='1'> oui</option>
            <option value='0'> non</option>
        </select>
        </div>
    </div>

        <div class='form-row' style='margin-top:30px; margin-left:25%'>

            <?php if($update==true): ?>
                <button id='modifier' name="modifier" class='btn btn-success'> Modifier </button>
            <?php else: ?>
                <button id='ajouter' name="ajouter" class='btn btn-success'> Ajouter </button>
            <?php endif; ?>
                
                <button id='effacer'class='btn btn-warning'> Effacer </button>
                
        </div>
</form>
    </div>

     
</div>
        
<script type='text/javascript'> 

            $('#effacer').click(function (event) {
                
                    $('#Matricule').val('');
                    $('#Marque').val('');
                    $('#Model').val('');
                    $('#Prix').val('');
                    $('#Couleur').val('');
                    $('#Disponibilite').val('');

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
     <form method="POST"  action="voitures.php" style="display: inline-block;">

        <input type="text" name="search_input" style="margin-bottom: 10px; ">
        <button type="submit" value="chercher" name="search"class="btn btn-light"><i class="fas fa-search"></i></button>
        
     </form>
</div>
<div class="term_recherche" style="margin-left: 840px;" >
        <?php if ($recherche==true) { ?>

            <p> Votre derniere recherche est : " <?php echo $_SESSION['recherche']; ?> "</p>

            <a href="voitures.php" class="btn btn-warning"> Annuler votre recherche</a>

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
                                <a href="voitures.php?editer=<?php echo $row['id_voiture']; ?>"
                                    class="btn btn-info" ><i class="fas fa-edit"></i></a>
                                    
                                <a href="voitures.php?supprimer=<?php echo $row['id_voiture']; ?>"
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

