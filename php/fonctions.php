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
    $msg="<h1 class='text-center titre '>Voitures</h1>a la place de ce message vous deverez coller les balises de votre formulaire correspondant à la page";
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
?>