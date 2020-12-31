<?php 
namespace oShop\Controllers;

class MainController extends CoreController
{
    public function home()
    {
        echo __FILE__.':'.__LINE__; exit();
         // appel de la vue (méthode héritée du CoreController)
         $this->show('home');
    }

    public function pageNotFoundAction(){
        header('HTTP/1.0 404 Not Found');
        $this->show('404');
      }





}