<?php

namespace Revision;


class Toto // Revision\Toto
{
    public function __construct()
    {

    }

    // cette méthode permet à un objet de retourner de quel type de Classe il est
    public function quelEstMonType()
    {

        return static::class;
    }
}

class Titi extends Toto // Revision\Titi
{

}





$toto = new Toto();

echo '<div style="border: solid 2px #F00">';
    echo '<div style="; background-color:#CCC">@'.__FILE__.' : '.__LINE__.'</div>';
    echo '<pre style="background-color: rgba(255,255,255, 0.8);">';
    print_r($toto->quelEstMonType());
    echo '</pre>';
echo '</div>';

echo '<hr />';


$titi = new Titi();

echo '<div style="border: solid 2px #F00">';
    echo '<div style="; background-color:#CCC">@'.__FILE__.' : '.__LINE__.'</div>';
    echo '<pre style="background-color: rgba(255,255,255, 0.8);">';
    print_r($titi->quelEstMonType());
    echo '</pre>';
echo '</div>';

