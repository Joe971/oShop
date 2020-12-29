## Jointure brute
```sql
SELECT
    `product`.`id`,
    `product`.`name`,
    `product`.`category_id`,
    `category`.`id`,
    `category`.`name`
FROM `product`
INNER JOIN `category`
```


## Jointure avec condition d'association
```sql
SELECT
    `product`.`id`,
    `product`.`name`,
    `product`.`category_id`,
    `category`.`id`,
    `category`.`name`
FROM `product`
INNER JOIN `category`
    ON `product`.`category_id` = `category`.`id`
    -- Le ON fonctionne comme un WHERE mais les jointures
```

## Jointure avec wondition WHERE
```sql
SELECT
    `product`.`id`,
    `product`.`name`,
    `product`.`category_id`,
    `category`.`id`,
    `category`.`name`
FROM `product`
INNER JOIN `category`
    ON `product`.`category_id` = `category`.`id`
WHERE `category`.`id` = 4
```