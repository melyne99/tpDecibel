// Fonction pour envoyer le commentaire en AJAX
function saveComment() {
    // Récupérer le texte du commentaire et l'ID de la chanson
    var commentText = $("#commentText").val();
    var songId = 1; // Remplacez 1 par l'ID de la chanson en cours d'écoute

    // Envoyer le commentaire en AJAX
    $.ajax({
        type: "POST",
        url: "Comments.php",
        data: { submit: true, song_id: songId, comment_text: commentText },
        success: function(response) {
          console.log(response); 

            // Afficher le commentaire dans la boîte de chat
            $("#chat-box").append(response);

            // Réinitialiser le champ de texte du commentaire
            $("#commentText").val("");
             
        }
    });
}