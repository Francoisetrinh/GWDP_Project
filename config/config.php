<?php

 //Connexion à la base de données.
 const DB_WEDS_BASE= 'wedsgreen';
 const DB_USER= 'root';
 const DB_PASSWORD= '';
 const DB_HOST = 'localhost';

 //A commenter en production
 const DB_SQL_DEBUG = true;


// Constantes des chemins.
 const PROJECT_DIR = __DIR__ . '/..';
 const CONTROLLER_DIR = PROJECT_DIR . '/appli/controller';
 const VIEWS_DIR = PROJECT_DIR . '/views';

// Définir une constante pour le stockage des images produits.
const DIR_PROD_IMG = './public/img/img_products';
// Définir les extensions autorisées
const EXT_AUTHORIZED = ['jpg','jpeg','png','gif','webm','webp','svg'];