<?php
    $exemple = [
        'un' => 'Lundi',
        'deux' => 'Mardi',
        'trois' => 'Mercredi',
    ];

    // =======================================================
    // Boucle foreach manuelle
    // extraction des indexes d'un tableau ($exemple)
    $indexes = array_keys($exemple);
    echo '<ul>';
    for($i = 0 ; $i < count($indexes) ; $i++) {
        $index = $indexes[$i];
        $value = $exemple[$index];
        echo '<li>' . $index . '=>' .  $value . '</li>';
    }
    echo '</ul>';

    echo '<hr />';
    //===========================================================
    // avec un foreach
    echo '<ul>';
    foreach($exemple as $index => $value) {
        echo '<li>' . $index . '=>' .  $value . '</li>';
    }
    echo '</ul>';
