<?php
switch ($_POST['function']) {
    case 'clients':
        clients();
        break;    
    case 'documents':
        documents();
        break;   
    case 'voitures':
        voitures();
        break;        
    case 'reservations':
        reservations();
        break; 
        default:
        echo "Call to undefined function.";
        break;
}

function clients() {
    $msg="<h1 class='text-center titre '>Clients</h1>a la place de ce message vous deverez coller les balises de votre formulaire correspondant à la page";

    echo json_encode($msg);
}
function voitures() {
    //$msg="<h1 class='text-center titre '>Voitures</h1>a la place de ce message vous deverez coller les balises de votre formulaire correspondant à la page";

    $msg="
    <div id='cadre' style='margin-left:25%; margin-top:50px;'>

        <div class='form-row'>
        <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >Matricule</label>
          <input type='text' class='form-control' id='Matricule'>
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Marque</label>
          <select id='Marque' class='form-control'>
            <option selected>Choose...</option>
            <option> clio 2</option>
            <option> tesla Y</option>
            <option> 103</option>
          </select>
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Model</label>
          <input type='text' class='form-control' id='Model'>
        </div>
      </div>

      <div class='form-row' style='margin-top:20px;'>
        <div class='form-group col-md-2'   style='display: inline-block; margin-right:50px;'>
          <label >Prix</label>
          <input type='number' class='form-control' id='Prix'>
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Couleur</label>
          <input type='text' class='form-control' id='Couleur'>
        </div>
        <div class='form-group col-md-2'  style='display: inline-block; margin-right:50px;'>
          <label >Disponibilite</label>
          <select id='Disponibilite' class='form-control'>
            <option selected>Choose...</option>
            <option value='1'> oui</option>
            <option value='0'> non</option>
          </select>
        </div>
      </div>

        <div class='form-row' style='margin-top:30px; margin-left:15%'>
                <button id='ajouter'class='btn btn-success'> Ajouter </button>
                <button id='modifier'class='btn btn-primary'> Modifier </button>
                <button id='supprimer'class='btn btn-danger'> Supprimer </button>
                <button id='effacer'class='btn btn-warning'> Effacer </button>
                
        </div>

      </div>


        
<script type='text/javascript'> 
            $('#ajouter').click(function (event) {
                console.log('wa si l9lawi ');
                    //event.preventDefault();
                    //var formData = {
                     var Matricule= $('#Matricule').val();
                     var Marque= $('#Marque').val();
                     var Model= $('#Model').val();
                     var Prix= $('#Prix').val();
                     var Couleur= $('#Couleur').val();
                     var Disponibilite= $('#Disponibilite').val();

                      console.log('disp '+Disponibilite+' '+Marque);
                      $.post('../php/traitement.php',{
                        Matricule:Matricule,
                        Marque:Marque,
                        Model:Model,
                        Prix:Prix,
                        Couleur:Couleur,
                        Disponibilite:Disponibilite
                      },
                      function(data,statut)
                      {

                      }
                      );
                   // };
                     $('#Matricule').val('');
                     $('#Marque').val('');
                     $('#Model').val('');
                     $('#Prix').val('');
                     $('#Couleur').val('');
                     $('#Disponibilite').val('');
                  });

        </script>
     ";

    echo json_encode($msg);
}
function documents() {
    $msg="<h1 class='text-center titre '>Documents</h1>a la place de ce message vous deverez coller les balises de votre formulaire correspondant à la page";
    echo json_encode($msg);
}
function reservations() {
    $msg="<h1 class='text-center titre '>reservations</h1>a la place de ce message vous deverez coller les balises de votre formulaire correspondant à la page";
    echo json_encode($msg);
}

//////////////////////





?>