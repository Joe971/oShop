**Etape 1**

cloné le répo qui contient l'intégration HTML/CSS

**Etape 2**

 Restructuration des dossier : 
```
app
|
|-> Controllers
|
|-> views

public
|
|-> assets 
|     |
|     |-> css
|     |-> fonts
|     |-> images
|     |-> js
|     |-> index/product/products_list/cart.html
|
|-> index.php
|-> .htaccess
```
**Etape 3**

On a comparé nos fichiers html pour une refactorisation.
On a créé trois fichiers dans notre dossier /app/views :
- header.tpl.php
- footer.tpl.php
- home.tpl.php

**Etape 4**

On a fabriqué le MainController.php avec deux methode : 
- show()
- home()
  
**Etape 5**

On a fabriqué notre point d'entrée (index.php)
On a récupéré $_GET['_url'] (merci .htaccess)
On a fabriqué nos routes
On a fabriqué notre dispatcher

**Etape 6**

Tout est cassé, les liens d'images ne fonctionnent plus ! 
Pourquoi ? On a tout déplacé dans /assets ! 
Il nous faut donc éditer nos views pour changer deux choses : 
Le lien du link css pour tous les fichiers css
Les liens des images 
Les liens des scripts js





  