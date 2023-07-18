// DOM
let context = document.querySelector('.music-container');
let controls = document.querySelector('.controls');

//CONST
let audioFilePath = 'music/ACDC - Back In Black (Official Video).mp3'; // Remplacez cela par le chemin vers votre fichier audio

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

  audioPlayer = new Audio('<?php echo $audioFilePath; ?>');
  init();
}

// Ajoutez l'événement d'écouteur d'événement pour gérer l'hover sur l'élément context
context.addEventListener('mouseout', toggleHover);
context.addEventListener('mouseover', toggleHover);


  setTimeout(function() {
    controls.querySelector('input#btn-play').checked = true;
    audioPlayer.play();
  }, 1000);
  setTimeout(function() {
    context.classList.remove('is-hovering');
  }, 4000);

  controls.addEventListener('click', handleControlsClick);

  if (Modernizr.touch) {
    context.addEventListener('click', toggleHover);
  }


// Charger le fichier audio
audioPlayer = new Audio(audioFilePath);
init();
