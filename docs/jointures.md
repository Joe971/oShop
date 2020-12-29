https://sql.sh/cours/jointures

Première commande démo jointures : 

SELECT *
FROM product
INNER JOIN brand ON product.brand_id = brand.id 


Deuxieme commande : 

SELECT product.id, product.name, product.brand_id, brand.id, brand.name
FROM product
INNER JOIN brand ON product.brand_id = brand.id



SELECT resultatsAffichés 
FROM table1
INNER JOIN table2 ON Condition
WHERE Filtre