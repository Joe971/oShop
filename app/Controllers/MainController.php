<?php 
namespace Oshop\Controllers;

// CoreController start
// MainController herite des propriétés, méthodes... de CoreController
class MainController extends CoreController{
    // Methode home pour afficher la page d'acceuil
    public function home()
    {
        // Appel de la view home
        $this->show('home');
    }

    // Methode pageNotFoundAction pour afficher la page 404.tpl.php
    public function pageNotFoundAction(){
        // Rajoute l'erreur 404 aussi dans la console
        header('HTTP/1.0 404 Not Found');
        $this->show('404');
      }


}
// CoreController end