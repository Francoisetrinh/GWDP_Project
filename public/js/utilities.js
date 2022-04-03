/**
 * Génération d'un entier aléatoire.
 * @param min - Minimal
 * @param max - Maximal
 * @returns {number}
 */
function getRandomInteger(min, max)
{
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}

/**
 * Installation de gestionnaire d'événement.
 *
 */
function installEventHandler(selector,type, eventHandler)
{
    // Récupération du premier objet DOM correspondant au sélecteur.
  const domObject = document.querySelector(selector);

  // Installation d'un gestionnaire d'évènement sur cet objet DOM.
  domObject.addEventListener(type, eventHandler);
}