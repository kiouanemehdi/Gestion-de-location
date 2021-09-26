$("#btn_clients").click(function() {
    $.ajax({
        url:'../php/fonctions.php',
        type: 'POST',
        dataType: 'JSON',
        data: {'function':'clients'},

        success: function (resultat, statut) {
            $("#resultat").html(resultat) ;
            },
        error: function(resultat,statut,erreur){

            console.log(erreur);
        }

        });
});

$("#btn_voitures").click(function() {
    $.ajax({
        url:'../php/fonctions.php',
        type: 'POST',
        dataType: 'JSON',
        data: {'function':'voitures'},

        success: function (resultat, statut) {
            console.log("ca entre");
            
            $("#resultat").html(resultat) ;
            },
        error: function(resultat,statut,erreur){

            console.log(erreur);
        }

        });
});

$("#btn_reservations").click(function() {
    $.ajax({
        url:'../php/fonctions.php',
        type: 'POST',
        dataType: 'JSON',
        data: {'function':'reservations'},

        success: function (resultat, statut) {
            $("#resultat").html(resultat) ;
            },
        error: function(resultat,statut,erreur){
            console.log(erreur);
        }

        });
});

$("#btn_documents").click(function() {
    $.ajax({
        url:'../php/fonctions.php',
        type: 'POST',
        dataType: 'JSON',
        data: {'function':'documents'},

        success: function (resultat, statut) {
            $("#resultat").html(resultat) ;
            },
        error: function(resultat,statut,erreur){
            console.log(erreur);
        }

        });
});


//traitement du formulaire de voiture
/*$(document).ready(function (){
  $("#ajouter").click(function (event) {
console.log("wa si l9lawi ");
    //event.preventDefault();
    //var formData = {
     var test1= $("#test1").val();
     var test2= $("#test2").val();
      console.log("zabi "+test1+" "+test2);
      $.post("../php/traitement.php",{
        test1:test1,
        test2:test2
      },
      function(data,statut)
      {

      }
      );
   // };

  });

        });*/