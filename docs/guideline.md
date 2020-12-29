# MVC, oShop

## Episode 2


### Création du dossier public

### Création de index.php dans le dossier public

_Nous avons placé le fichier index.php dans le dossier public, car ce dernier nous permet d'isoler tous les fichiers qui sont accessible par le visiteur_

### Création du fichier .htaccess
- Le fichier .htaccess permet de rediriger toutes les url demandée vers index.php
- ce fichier nous injecte dans la variable GET _url, l'url demandée par le visiteur

```
# Activer la fonctionnalité Apache de réécriture d'URL.
RewriteEngine On

# Récupérer la fin de l'URL (morceau tapé par l'internaute après /)
# et le stocker dans la variable spéciale $1 pour utilisation
# ultérieure.
RewriteCond %{REQUEST_URI}::$1 ^(/.+)/(.*)::\2$
RewriteRule ^(.*) - [E=BASE_URI:%1]

# Mais activer la réécriture d'URL SEULEMENT si l'URL demandée
# n'est pas un dossier qui existe.
RewriteCond %{REQUEST_FILENAME} !-d

# Mais activer la réécriture d'URL SEULEMENT si l'URL demandée
# n'est pas un fichier qui existe.
RewriteCond %{REQUEST_FILENAME} !-f

# Réécrire l'URL pour renseigner le script PHP, en remplaçant la
# fin par index.php?page=/morceau-d-url-tape-par-l-internaute
RewriteRule ^(.*)$ index.php?_url=/$1 [QSA,L]

# Exemple :
# localhost/mon/site/products => localhost/mon/site/index.php?page=products

```

### Enregistrement des assets (ressources) dans le dossier /public/assets
 Nous avons copier/coller le dossier css/js/images/font dans le dossier /public/assets

### Copier/coller du contenu d'index.html dans /public/index.php
Une fois le html copié/collé dans index.php , il faut corriger toutes les urls vers les css/images/font/js/... (les assets). Nous avons fait ceci afin d'avoir un template propre

### Création du dosser /app
Ce dossier contient tous les fichiers qui ne seront pas accessible par les visiteurs

### Création du dossiers /app/views
Ce dossier stocke nos "vues" (template)

### Création du dossier /app/views/partials
Les partials sont des fragement de template

### Découpage du HTML en partials et partie contenu
- /app/view/partials/header.tpl.php
- /app/view/partials/footer.tpl.php
- /app/view/home.tpl.php


____

### Ecriture du /app/Controllers/MainController.php
Ce contrôleur  gère l'affichage des pages "génériques". Par exemple la home page.

```php
<?php
class MainController
{
    // méthode pour afficher la home page
    public function home()
    {
        $this->show('home');
    }

    private function show($viewName, $viewVars = [])
    {
        require __DIR__ . '/../views/partials/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/partials/footer.tpl.php';
    }
}
```

### require dans index.php du fichier /app/Controllers/MainController.php

```php
require __DIR__ . '/../app/Controllers/MainController.php';
```
### Squelette du fichier /public/index.php
```php
// récupération de la variable "_url"  dans les varibles GET
// le fichier .htaccess nous "transforme" l'url demandée en variable GET : ceci va vous permettre de pouvoir selectionner la page à afficher
$url = filter_input(INPUT_GET, '_url');

// gérons le cas où $url est vide (car qui arrive lorsque nous sommes sur la home page)
// si $url est vide ; nous donnons arbitrairement la valeur "/" à $url
if($url == '') {
    $url = '/';
}
```

### Configuration des routes dans /public/index.php
```php
$routes = [

    // lorsque le visiteur demande la home page ($url vaut alors "/")
    // nous allons instancier un objet MainController puis appeler la méthode  home()
    '/' => [
        'controllerName' => 'MainController',
        'methodName' => 'home'
    ],
    '/category' => [
        'controllerName' => 'CatalogController',
        'methodName' => 'category'
    ],
    // ajouter les routes qui vous font plaisir
];
```

### Gestion de l'affichage de la bonne page en fonction de l url demandée
Cette partie s'appelle faire le dispatcher
```php
// nous voulons vérifier si l'url demandée par le visiteur existe dans notre tableau de configuration
if(isset($routes[$url])) {
    // récupération des informations pour l'url demandée
    $routeData = $routes[$url];

    $controllerName = $routeData['controllerName'];

    // instanciation d'un objet du type demandé (le type demandé est stocké dans la variable $controllerName)
    $controller = new $controllerName();

    // récupération du nom de la méthode à appeller
    $methodName = $routeData['methodName'];

    // appel de la méthode "dynamiquement"
    // pour la home page c'est comme si nous faisions $controller->home();
    $controller->$methodName();
}
else {
    echo 'GERER LA PAGE 404';
    echo __FILE__.':'.__LINE__; exit();
}
```






