<?php
namespace Oshop\Controllers;

// CoreController start
class CoreController{
    // Methode show qui nous permet d'avoir un affichage dynamique des views
    protected function show($viewName, $viewData = []){

        // $absoluteURL sera disponible dans nos templates
        $absoluteURL = $_SERVER['BASE_URI']; 
        // Fais un pont de $router pour le rendre accessible partout
        global $router;

        // PHP Fournit une fonction qui créé une variable pour chaque élément d'un tableau associatif. Transformation des index de $viewData en variables
        extract($viewData);
        dump($viewData);
       
        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }

}
// CoreController end

?>