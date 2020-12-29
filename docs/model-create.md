## Etape de définition du skelette du modèle
1. Création d'une classe dans le dossier app/Models. Cette classe doit avoir le même nom que la table sur laquelle elle va travailler
2. Ecriture de la liste des colonnes de la table en tant que propriété de la classe. Les propriétés sont en private car nous souhaitons "protéger" nos objets contre des usages non prévus. Attention les propriétés doivent avoir strictement le même nom que les colonnes de la table
3. Génération ou écriture des getter/setter. En effet toutes nos propriétés sont private
4. Modifier en camelCase les méthodes dont le nom est en snake case. Ceci afin de garder un code propre

## Création d'une méthode (permettant de récupérer toutes les lignes d'une table en bdd. Ceci sous la forme d'objets)

1. Déclaration de la méthode (en public, il faut qu'elle soit appelable depuis l'extérieur de la classe)
2. Récupération d'un objet PDO
3. Ecriture de la requête SQL
4. Execution de la requête SQL
5. Récupération des résultats sous la forme d'un tableau d'objets
6. On retourne la liste d'objets

## Utilisation du modèle
**Les modèles s'utilisent dans les méthodes des controlleurs**
1. Intanciation du modèle qui va nous être utile. Ceci se fait dans les méthode de controller
2. Raffraichir la page. Attention de ne pas avoir oublié d'inclure la définition de la classe dans public/index.php (le point d'entrée/front controller)
3. Appel de la méthode qui va nous être utile, et récupération du résultat retournée
4. On débug le résultat retournée par la méthode appelée précédemment
5. Envoie des données récupérées depuis la BDD à la couche vue (méthode show)
6. Après avoir passé les variables à là vue, il faut débugger les variables qui sont sont disponible dans la vue. Ceci afin de s'assurer que tout s'est bien passé.