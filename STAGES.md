# Révisions S5

## Structure

```
/app
|
|-> /Controllers
|-> /Models
|-> /views
|
/public
|
|-> /assets
|     |
|     |-> /css
|     |-> /fonts
|     |-> /images
|     |-> /js
|     |-> index/product/products_list/cart.html
|
|-> index.php
|-> .htaccess
```

### Dossier public

- Créer le index.php (le point d'entrée)
- Récupérer le fichier .htaccess qui redirige les pages demandées vers index.php

**Optionnellement**

- Créer le dossier assets dans public
- dans le dossier assets création d'un dossier css, images, fonts, js

### Dossier app

Ce dossier va stocker les fichiers source de notre application. Ce dossier devrait être protégé contre les accès depuis le navigateur

Dans le dossier app, optionnellement, créer un fichier .htaccess pour interdire l'accès au dossier depuis un navigateur

```
Deny fom all
```

**Attention au minuscules et aux majuscule !!!**

- Création du dossier `Controllers`
- Création du dossier `Models`
- Création du dossier `views`

---

## Initialisation

### Initialisation du composer.json

- Appeller la commande qui initialise un nouveau fichier composer.json

```sh
composer init
```

### Inclusion d'altorouter avec composer

Tapper la commande suivante

```sh
composer require altorouter/altorouter
```

### Optionnel mais pratique, inclusion de symfony var-dumper

```sh
composer require symfony/var-dumper
```

### Inclusion du fichier autoload.php créé par composer dans public/index.php

Composer est un gestionnaire de dependance pour php. Dispose d'un autoloader qui permet d'inclure automatiquement les fichiers dont on a besoin sans faire de multiple require. On peut utiliser cet autoloader pour nos propre librairie egalement. autoload que les classes.

```php
<?php
require __DIR__ . '/../vendor/autoload.php';
```

---

## Préparation du code

### Découpage des templates

- header.tpl.php
- footer.tpl.php
- (optionnellement) création d'un fichier tpl de test

**Etapes suivante sur les templates :**

- Modifier les urls pour charger les css/image/js/etc

**Etapes optionnelle : tester les templates directement dans index.php**

```php
<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/views/header.tpl.php';
require __DIR__ . '/../app/views/test.tpl.php';
require __DIR__ . '/../app/views/footer.tpl.php';
```

### Initialisation d'AltoRouter dans index.php

<strong style="color:red">
Attention de ne pas oublier de configurer le basePath d'AltoRouter !
</strong>

```php
$router = new AltoRouter();
$router->setBasePath($\_SERVER["BASE_URI"]);
```

---

## Configuration des routes et lancement d'AltoRouter

### Création d'une route pour la home (afin de tester)

```php
// route HOME
$router->map(
  'GET', // la methode HTTP qui est autorisée
  '/', // url a laquelle cette route réagit
  //"target" : ce tableau stocke les noms de l'action et du controller
  // qui vont se déclancher pour réagir a cette URL
  [
    'controller' => 'MainController'
    'action' => 'home',
  ],
  'home' // nom de la route
);
```

### Coder (ou copier/coller) la partie dispatcher

```php
// DISPATCHER START

// Demande à altorouter de "gerer" le routing ("que dois je faire" en fontion de l'url rentrée par le visiteur)
$match = $router->match();
dump ($match);
/*
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
if($match){ // <=> if ($match == true)

  $controllerToUse = '\Oshop\Controllers\\' . $match['target']['controller'];
  $methodToUse = $match['target']['action'];
  $controller = new $controllerToUse();
  $controller->$methodToUse($match['params']);
} else {
  $controller = new Oshop\Controllers\MainController();
  $controller->pageNotFoundAction();
}
// DISPATCHER END
```

<strong style="color:red">
Attention à la partie qui gère le namespace en dur !
</strong>

```php
$controllerName = 'ORevision\Controllers\\'. $routeData['controllerName'];
```

## Mettre à jour le composer pour l'autoloading de nos classe

### Configuration de composer.json

Exemple

```js
"autoload": {
    "psr-4": {
        "ORevision\\": "app/"
    }
}
```

On dit à composer qu'il va autoloader des classes en respectant le standard psr-4 et que le namesapce oShop est stocké dans le dossier /app
Maintenant on va creer des classe et elle seront autoloadés. Plus besoin de require ces classes.

### Génération de l'autoload

```sh
composer install
```

Ou

```sh
composer dumpautoload
```

---

## Partie Core Controller

### Créer le code Controller avec la méthode show

```php
<?php
namespace ORevision\Controllers;
class CoreController
{
    public function show($viewName, $viewVars = [])
    {
        global $router;
        //transformation des index de $viewVars en variables
        extract($viewVars);
        // ne pas oublier le $baseURI, il faut cette variable pour charger les assets
        $baseURI = $_SERVER['BASE_URI'];
        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }
}
```

### Modifier les templates pour corriger le chargement des assets !

Exemple dans header.tpl.php:

```php
<link  rel="stylesheet" href="<?=$baseURI?>/assets/css/style.css"/>
```

---

## Custom Controllers

### Créer le controller MainController (ou autre nom) dans le dossier Controllers

**Ne pas oublier de spécifier le namespace en début de fichier**

**Ne pas oublier d'extends le CoreController**

```php
<?php
namespace ORevision\Controllers;
```

### Coder la méthode qui nous interesse

```php
    public function home()
    {
        // appel de la vue (méthode héritée du CoreController)
        $this->show('home');
    }
```

### Créer le template home.tpl.php dans le dossier views

---

## Initialisation de la couche Model

### Récupérer le fichier Database.php et le plader dans le dossier Utils

<strong style="color:red">
Attention au namespace dans la classe Database !!!!
</strong>

```php
<?php
namespace ORevision\Utils;
use PDO;
// Retenir son utilisation  => Database::getPDO()
// Design Pattern : Singleton
class Database {
    /** @var PDO */
    private $dbh;
    private static $_instance;
    private function __construct() {
        // Récupération des données du fichier de config
        // la fonction parse_ini_file parse le fichier et retourne un array associatif
        $configData = parse_ini_file(__DIR__.'/../config.ini');
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        }
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }
    // the unique method you need to use
    public static function getPDO() {
        // If no instance => create one
        if (empty(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance->dbh;
    }
}
```

### Créer le fichier config.ini dans le dossier app

```ìni
; fichier de configuration d'exemple
; il faut créer une copie de ce fichier et la nommer config.ini
; c'est ce fichier app/config.ini qui est utilisé par notre code pour récupérer la configuration de la machine courante
; ensuite, il faut remplir les paramètres ci-dessous dans le fichier app/config.ini
DB_HOST=localhost
DB_USERNAME=explorateur
DB_PASSWORD=Ereul9Aeng
DB_NAME=oshop
```
