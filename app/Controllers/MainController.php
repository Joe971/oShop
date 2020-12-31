<?php 
namespace Oshop\Controllers;

// CoreController start
class MainController extends CoreController{
    // Methode home pour afficher la page d'acceuil
    public function home()
    {
        //echo __FILE__.':'.__LINE__; exit();
        // appel de la vue (méthode héritée du CoreController)
        $this->show('home');
    }

    // Methode pageNotFoundAction pour afficher la page 404.tpl.php
    public function pageNotFoundAction(){
        // Rajoute erreur 404 aussi dans la console
        header('HTTP/1.0 404 Not Found');
        $this->show('404');
      }


}
// CoreController end