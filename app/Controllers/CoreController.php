<?php
namespace oShop\Controllers;

class CoreController{
   
    protected function show($viewName, $viewData = []){

        global $router;

        // PHP Fournit une fonction qui créé une variable pour chaque élément d'un tableau associatif. Transformation des index de $viewData en variables
        extract($viewData);
        // BASE URI sera disponible dans nos templates
        $absoluteURL    = $_SERVER['BASE_URI']; 

        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }

}// fin de class CoreController

?>