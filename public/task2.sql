 /*
Для заданного списка товаров получить названия всех категорий, в которых
представлены товары;
*/
 SELECT categories.name
 FROM categories
   JOIN products_categories ON products_categories.category_id = categories.id
 WHERE products_categories.product_id IN
       (547, 427, 131)
   GROUP BY categories.id;

 /*
Для заданной категории получить список предложений всех товаров из этой категории и
ее дочерних категорий;
*/
 SELECT products.* FROM products
   JOIN products_categories ON products.id = products_categories.product_id
   JOIN categories ON products_categories.category_id = categories.id
 WHERE categories.left_key >= 25 AND categories.right_key <= 30
 GROUP BY products.id;

 /*
Для заданного списка категорий получить количество предложений товаров в каждой
категории;
*/
 SELECT categories.*, COUNT(products_categories.product_id) FROM categories
   JOIN products_categories ON categories.id = products_categories.category_id
 WHERE categories.id IN (3, 5, 12)
 GROUP BY categories.id;

 /*
Для заданного списка категорий получить общее количество уникальных предложений
товара;
*/
 SELECT COUNT(DISTINCT products_categories.product_id) FROM categories
   JOIN products_categories ON products_categories.category_id = categories.id
 WHERE categories.id IN (3, 5, 12);

/*
Для заданной категории получить ее полный путь в дереве (breadcrumb, «хлебные
крошки»).
 */
 SELECT * FROM categories
 WHERE categories.left_key <= 25 AND categories.right_key >= 30
 ORDER BY left_key;
