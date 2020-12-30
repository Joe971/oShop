<?php
// Require de l'autoload de composer qui permet de charger de maniere dynamique les librairies qu'on a installés. Permet de charger nos propres classes et de definir nos propres namespaces
require __DIR__ . '/../vendor/autoload.php';
// Require de views
require __DIR__ . '/../app/views/header.tpl.php';
require __DIR__ . '/../app/views/home.tpl.php';
require __DIR__ . '/../app/views/footer.tpl.php';

$toto = 'hello';
dump ($toto);



