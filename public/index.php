<?php

// Require de l'autoload de composer qui permet de charger de maniere dynamique les librairies qu'on a installés. Permet de charger nos propres classes et de definir nos propres namespaces
require __DIR__ . '/../vendor/autoload.php';



// dump ($_SERVER); on obtient dans ce tableau l'index : "BASE_URI" => "/oShop/public"
// dump ($_SERVER["BASE_URI"]); // => "/oShop/public"


// Require de views
// require __DIR__ . '/../app/views/header.tpl.php';
// require __DIR__ . '/../app/views/home.tpl.php';
// require __DIR__ . '/../app/views/footer.tpl.php';

// Instanciation d'un router
$router = new AltoRouter();
$router->setBasePath($_SERVER["BASE_URI"]);

// Routes start
// Route pour HOME
$router->map(
  'GET', // la methode HTTP qui est autorisée
  '/', // url a laquelle cette route réagit
  //"target" : ce tableau stocke les noms de l'action et du controller 
  // qui vont se déclancher pour réagir a cette URL
  [
    'controller' => 'MainController',
    'action' => 'home'
  ],
  'home' // nom de la route
);


// Routes end


// Dispatcher start
// Demande à altorouter de "gerer" le routing en fontion de l'url rentrée par le visiteur
$match = $router->match();
/*
dump ($match);

 array:3 [▼
  "target" => array:2 [▼
    "controller" => "MainController"
    "action" => "home"
  ]
  "params" => []
  "name" => "home"
]
*/

// Si la route existe bien
if($match){
 
  $controllerToUse = '\Oshop\Controllers\\' . $match['target']['controller'];
  $methodToUse = $match['target']['action'];
  $controller = new $controllerToUse();
  $controller->$methodToUse($match['params']);
} 
// Gestion 404
else {
  $controller = new Oshop\Controllers\MainController();
  $controller->pageNotFoundAction();

}
// Dispatcher end