Un Modèle est une classe et donc un plan de fabrication représentant une entité de la BDD.

Pour fabriquer ce plan, on va se calquer sur le nom et les champs de la table correspondante dans la BDD.
Un modèle possède des proporétés et des méthodes.

Les modèles sont codés dans des classes spécifiques qui permettent de manipuler les données utilisées par notre site web.

Avec Active Records ce sont les modèles qui s'occupent d'aller chercher les informations dans la BDD (pour cela, on créé des methodes dans la classe du modèle)

Les objets sont des instanciations de classes. Des objets issus de la meme classes possedent les mêmes propriétés et ont acces aux même methodes mais ils peuvent avoir chacun des valeurs de proprétés differentes

Exemple pour le modele Brand : 
LEs objets crées à partir de la classe modèle Brand correspondent chacun a UNE LIGNE de la table 'brand' dans la BDD