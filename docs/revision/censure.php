<?php
$sentence = "putin con c'est trop bien php ! C'est de la balle !";


// le but de la fonction va être de remplacer certains mot dans une phrase par des "****"

function filterSentence($sentence)
{
    // liste des mot interdits
    $forbiddenWords = [
        'putin' => true,
        'con' => true,
        'php' => true,
    ];

    // découpage de la chaine en un tableau ; le sérateur utilisé est le caractère espace
    $words = explode(' ', $sentence);

    // nous allons avoir besoin de "balayer" les mots (parcourir le tableau words)

    // cette variable va nous permettre de stocker la phrase nettoyée. IL est normal au début de la boucle que cette variable soit vide
    $cleanedSentence = '';
    foreach($words as $word) {

        // testons si le mot est interdit.
        // pour ce faire, nous allons voir si le mot existe en tant que clé dans le tableau $forbiddenWords

        if(isset($forbiddenWords[$word])) {

            // ensuite pour chaque mot contenu dans le tableau forbiddenWords ; il faut remplacer par "****"
            $cleanedSentence = $cleanedSentence.' *****';
        }
        else {
            $cleanedSentence = $cleanedSentence .' ' . $word;
        }
    }

    // on enlève l'espace en début de chaine
    $cleanedSentence = trim($cleanedSentence);

    return $cleanedSentence;
}


echo filterSentence($sentence);





