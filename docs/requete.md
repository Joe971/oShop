# Liste des requêtes dont nous allons avoir besoin

## Footer

### Récupérer 5 types de produits pour le footer
```sql
SELECT * FROM `type`
WHERE `footer_order` > 0
ORDER BY `footer_order` ASC
```

###  Récupérer 5 marques pour le footer
```sql
SELECT * FROM `brand`
WHERE `footer_order` > 0
ORDER BY `footer_order` ASC
```

## Page home

### Récupérer 5 catégories pour la home page
```sql
SELECT * FROM `category`
WHERE `home_order` > 0
ORDER BY `home_order` ASC
```

## Page catégorie

### Récupérer les informations d'une catégorie via son id
```sql
SELECT * FROM `category`
WHERE id={$id}
```

## Récupérer les produits appartenants à une catégorie
```sql
SELECT * FROM `product`
WHERE `category_id`={$id};
```



## Page type

## Récupérer les informations d'un type de produit via son id
```sql
SELECT * FROM `type`
WHERE `id`={$id};
```
## Récupérer les produits appartenants à un type
```sql
SELECT * FROM `product`
WHERE `type_id`={$id};
```

## Récupérer les informations d'une marque via son id
```sql
SELECT * FROM `brand`
WHERE `id`={$id};
```

### Récupérer les produit d'une marque
```sql
SELECT * FROM `product`
WHERE `brand_id`={$id};
```

### Récupérer les information d'un produit via son id
```sql
SELECT * FROM `product`
WHERE `id`={$id};
```
### Récupérer la marque d'un produit
```sql
SELECT
    *
FROM `product`
INNER JOIN `brand`  -- association à la table brand
    ON `product`.`brand_id`=`brand`.`id` -- sur la condition suivante
WHERE `product`.`id`= {$id} -- lorsque `product`.`id` vaut telle valeur
```

## Récupérer la catégorie d'un produit
```sql
SELECT
    *
FROM `product`
INNER JOIN `brand`
    ON `product`.`brand_id`=`brand`.`id`
INNER JOIN `category`
    ON `product`.`category_id`=`category`.`id`
WHERE `product`.`id`=1
```


