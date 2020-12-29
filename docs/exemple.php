<?php



function helloWorld()
{
    return 'hello World';
}


echo helloWorld([
    'controller' => 'toto'
], 'titi');