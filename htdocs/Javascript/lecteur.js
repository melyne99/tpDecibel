

// Index de la chanson actuellement en cours de lecture
let currentIndex = 0;

// Fonction pour jouer le fichier audio
function playAudio(index) {
  let lecteurAudio = document.getElementById('lecteur-audio');
  let songImage = document.getElementById('song-image');
  lecteurAudio.src = cheminsAudio[index];
  songImage.src = imagesChansons[index]; // Charger l'image correspondante

  // Vérifier si l'audio est déjà en cours de chargement ou de lecture
  if (lecteurAudio.readyState === 4) {
    lecteurAudio.play();
  } else {
    // Écouter l'événement 'canplaythrough' pour attendre que le fichier audio soit prêt à être lu
    lecteurAudio.addEventListener('canplaythrough', function () {
      lecteurAudio.play();
    }, { once: true }); // Utiliser { once: true } pour que l'événement ne soit écouté qu'une seule fois
  }

  currentIndex = index;

  // Écouter l'événement 'ended' pour passer automatiquement à la piste suivante une fois que la piste actuelle est terminée
  lecteurAudio.addEventListener('ended', function () {
    nextAudio();
  });
}

// Fonction pour jouer la chanson suivante
function nextAudio() {
  currentIndex = (currentIndex + 1) % cheminsAudio.length;
  playAudio(currentIndex);
}

// Fonction pour jouer la chanson précédente
function previousAudio() {
  currentIndex = (currentIndex - 1 + cheminsAudio.length) % cheminsAudio.length;
  playAudio(currentIndex);
}

// Fonction pour jouer tous les fichiers audio à la suite
function playAllAudio() {
  currentIndex = 0; // Réinitialiser l'index pour commencer depuis le début
  playAudio(currentIndex); // Jouer la première piste audio
  currentIndex++; // Passer à l'index suivant pour la prochaine piste audio
}

// Fonction pour afficher ou masquer la liste déroulante des chansons
function toggleSongList() {
  var songListContainer = document.getElementById('song-list-container');
  if (songListContainer.style.display === 'block') {
    songListContainer.style.display = 'none';
  } else {
    songListContainer.style.display = 'block';
  }
}

// Fonction pour ouvrir la boîte de dialogue
function openCommentModal() {
  var modal = document.getElementById('commentModal');
  modal.style.display = 'block';
}

// Fonction pour fermer la boîte de dialogue
function closeCommentModal() {
  var modal = document.getElementById('commentModal');
  modal.style.display = 'none';
}

// Fonction pour enregistrer le commentaire
function saveComment() {
  var commentText = document.getElementById('commentText').value;
  // Ici, vous pouvez enregistrer le commentaire dans votre base de données ou effectuer toute autre action souhaitée avec le commentaire
  closeCommentModal(); // Ferme la boîte de dialogue après avoir enregistré le commentaire
}
