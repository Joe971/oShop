
## Route statique
1. déclarer une nouvelle route
2. Tester la route, ça plante car la méthode n'a pas encore été codée
3. Ecrire la méthode dans le bon controlleur
    1. Dans la méthode  appeller la méthode show() avec le nom de la vue -> ça plante, le template n'est pas encore créé
    2. Création du template
    3. Tester ; youpi ça marche


## Route dynamique
1. Toutes les étapes d'une route statique
2. Ajouter la partie variable dans la configuration de la route
3. Tester : c'est cassé, il faut ajouter la partie variable dans la barre d'adresse du navigateur
4. Retester avec la partie variable dans l'url => ça marche
5. Modifier la méthode qui affiche la page et lui ajouter dans sa déclaration le paramètre $parameters (ça aurait pu s'appeller autrement)
6. Débugger $parameter dans la méthode ; nous voyons la liste des variables qui ont été capturées par AltoRouter
7. Créer un tableau $viewVars et lui donner la liste des variables dont la vue aura besoin
8. Appeler la méthode show en lui passant cette fois ci la variable $viewVars
9. Dans le template de la page, modifier le code en fonction des besoins. Les variables utilisables dans la vue sont disponibles dans $viewVars

