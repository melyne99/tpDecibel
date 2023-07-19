// DOM
let context = document.querySelector('.music-container');
let controls = document.querySelector('.controls');

//CONST
let audioFilePath = 'Dossier personnel/devilbox/data/www/tpDecibel/htdocs/music'; // Remplacez cela par le chemin vers votre fichier audio

// letS
let audioPlayer;

function toggleHover() {
  context.classList.toggle('is-hovering');
}

// FN
function handleControlsClick(e) {
  let trgt = e.target;
  if (trgt.nodeName !== 'LABEL' && !audioPlayer) {
    return;
  }

  switch (trgt.className) {
    case 'lbl-btn-play':
      audioPlayer.play();
      break;
    case 'lbl-btn-pause':
      audioPlayer.pause();
      break;
    case 'lbl-btn-reset':
      audioPlayer.currentTime = 0;
      audioPlayer.play();
      break;
    default:
      return false;
  }
}

function init() {
  context.classList.add('is-hovering');

  audioPlayer = new Audio(); // Créer l'élément audio sans définir le chemin ici
  audioPlayer.src = audioFilePath; // Définir le chemin de la source audio ici

  setTimeout(function() {
    controls.querySelector('label.lbl-btn-play').click();
    // Pour déclencher l'événement "click" sur le bouton play, au lieu de définir l'attribut "checked"
  }, 1000);

  setTimeout(function() {
    context.classList.remove('is-hovering');
  }, 0);

  controls.addEventListener('click', handleControlsClick);

  if ('ontouchstart' in window || navigator.msMaxTouchPoints) {
    context.addEventListener('click', toggleHover);
  }
}

// Ajoutez l'événement d'écouteur d'événement pour gérer l'hover sur l'élément context
context.addEventListener('mouseout', toggleHover);
context.addEventListener('mouseover', toggleHover);

// Charger le fichier audio et initialiser
document.addEventListener('DOMContentLoaded', function() {
  audioPlayer.addEventListener('canplay', init);
  audioPlayer.load(); // Charger le fichier audio dès que possible
});
