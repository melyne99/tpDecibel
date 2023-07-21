function applyFadeEffect(audioElement, fadeInDuration, fadeOutDuration) {
    // Obtenir la durée totale de la piste audio
    const totalDuration = audioElement.duration;

    // Définir le volume initial à 0
    audioElement.volume = 0;

    // Augmenter progressivement le volume jusqu'à la valeur souhaitée (1) pendant fadeInDuration secondes
    const fadeInInterval = 10; // Interval de temps entre chaque augmentation du volume (en millisecondes)
    let fadeInStep = 1 / (fadeInDuration * 1000 / fadeInInterval);
    let currentVolume = 0;

    const fadeInIntervalId = setInterval(() => {
        currentVolume += fadeInStep;
        audioElement.volume = currentVolume;

        if (currentVolume >= 1) {
            clearInterval(fadeInIntervalId);
        }
    }, fadeInInterval);

    // Diminuer progressivement le volume à 0 pendant fadeOutDuration secondes, en commençant à (totalDuration - fadeOutDuration) secondes
    const fadeOutStart = totalDuration - fadeOutDuration;
    const fadeOutInterval = 10; // Interval de temps entre chaque diminution du volume (en millisecondes)
    let fadeOutStep = 1 / (fadeOutDuration * 1000 / fadeOutInterval);

    setTimeout(() => {
        let currentVolume = audioElement.volume;

        const fadeOutIntervalId = setInterval(() => {
            currentVolume -= fadeOutStep;
            audioElement.volume = currentVolume;

            if (currentVolume <= 0) {
                clearInterval(fadeOutIntervalId);
            }
        }, fadeOutInterval);
    }, fadeOutStart * 1000);
}
