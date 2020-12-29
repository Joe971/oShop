**Si composer n'est pas installé**

On va sur https://getcomposer.org/download/
On copie les lignes de code et on les colle dans le terminal

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Lorsque cette commande est executée, un fichier composer.phar est généré, il nous faut alors faire la ligne de commande suivante pour terminer l'installation et rendre notre commande globale : 

```
sudo mv composer.phar /usr/local/bin/composer
```


Tadaaaaaaa !!


ATTENTION VOIR AVEC JULIEN
**Pour installer le module var_dumper ave composer**

- Pour installer le module var_dumper, je suis allé sur le site https://packagist.org/ , j'ai cherché le module var_dumper, et la commande d'installation avec composer est indiqué tout en haut de la fiche du module
  ```composer require symfony/var-dumper```


**Informations importantes**

Plusieurs fichiers et un dossier on étés générés 
composer.json, composer.lock /vendor

- Le Dossier vendor : va contenir les modules et dépendances
- Composer.json : Contient entre autre la liste des modules installés 
- Composer.lock : lié au versioning, a voir plus tard.


**Et quand je partage un projet ?**

Grace au .gitignore, je vais faire en sorte que le dossier
vendor ne soit jamais pris en compte par mon git ! 

Donc, lorsque je partage un projet, il ne restera que composer.json et composer.lock a la racine de mon projet.

Ces deux fichiers contiennent la liste des modules et dependances qui ont étés installés 

Pour la personne qui récupère le projet, la seule commande
a taper (a la racine du projet) pour récupérer le dossier vendor sera :
```composer install```


**Pour utiliser un module fraichement installé ?**

Il faut require l'autoload du dossier vendor ! 
``` require __DIR__ . '/../vendor/autoload.php';```



**Pour altoRouteur***

https://packagist.org/packages/altorouter/altorouter

composer require altorouter/altorouter


**ATTENTION**

Si espace, ou accents dans les dossier => routage KO


**Pour les routes avec altoRouteur**

https://altorouter.com/usage/mapping-routes.html





























**BONUS**

- ```composer init``` à la racine de mon projet
Attention il nous est alors demandé, le nom du projet et tout un tas d'informations, je peux appuyer sur "entrée" si je ne veux pas renseigner ces informations, ATTENTION vous allez avoir un moment ou les dépendances vous seront demandés, vous pouvez repondre "no", pour les installer manuellement par la suite !