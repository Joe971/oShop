**Les 5 types dans l'ordre dans le footer**

```sql
SELECT *
FROM `type`
WHERE footer_order > 0
ORDER BY footer_order
LIMIT 5
```

**Les 5 marques dans l'ordre dans le footer**

```sql
SELECT *
FROM `brand`
WHERE footer_order > 0
ORDER BY footer_order
LIMIT 5
```

**Les 5 catégories mises en avant**

```sql
SELECT *
FROM `category`
WHERE home_order > 0
ORDER BY home_order
LIMIT 5
```
**Tous les produits de la categorie 1 triées par nom croissants**

```sql
SELECT * 
FROM `product`
WHERE category_id = 1
ORDER BY name ASC
```
**Tous les produits de la catégorie 1 triés par prix croissant**

```sql
SELECT * 
FROM `product`
WHERE category_id = 1
ORDER BY price ASC
```

**Tous les produits de la marque 2 triés par nom croissant**

```sql
SELECT *
FROM `product`
WHERE brand_id = 2
ORDER BY name ASC
```

**Tous les produits de la marque 2 triés par prix croissant**

```sql
SELECT *
FROM `product`
WHERE brand_id = 2
ORDER BY price ASC
```

**Récupérer les données des produits ET de leur marque**

```sql
SELECT 
  product.id, 
  product.name, 
  product.price, 
  brand.name AS brand_name
FROM product
INNER JOIN brand 
  ON brand.id = product.brand_id
```


**récupérer la liste des produtis qui sont d'un type donné**



```sql
SELECT
  product.id,
  product.name,
  product.price,
  product.picture,
  type.name AS type_name
FROM product
INNER JOIN type
  ON type.id = product.type_id
WHERE
  product.type_id = $typeId
```