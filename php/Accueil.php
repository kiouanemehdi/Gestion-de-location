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
	<script src="../js/main.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/all.js"></script>
    <script src="../js/menu.js"></script>

</body>

</html>

