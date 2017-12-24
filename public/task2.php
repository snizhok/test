<h1>
    Задание 2
</h1>
<p style="font-style: italic;">
    Товары на сайт интернет-магазина сгруппированы по категориям. Категории организованы в
    древовидную структуру с уровнем вложенности до 4 включительно. Значимые атрибуты категории:
    название. Значимые атрибуты товара: название и цена. Один продукт может относиться к нескольким
    категориям.
<ol>
    <li>Разработать структуру базы данных MySQL для хранения дерева категорий, списка продуктов и
        информации о принадлежности продуктов к категориям.
    </li>
    <li>Заполнить таблицы тестовыми данными.</li>
    <li>Написать SQL-запросы для получения следующих данных:
        <ul>
            <li>Для заданного списка товаров получить названия всех категорий, в которых
                представлены товары;
            </li>
            <li>Для заданной категории получить список предложений всех товаров из этой категории и
                ее дочерних категорий;
            </li>
            <li>Для заданного списка категорий получить количество предложений товаров в каждой
                категории;
            </li>
            <li>Для заданного списка категорий получить общее количество уникальных предложений
                товара;
            </li>
            <li>Для заданной категории получить ее полный путь в дереве (breadcrumb, «хлебные
                крошки»).
            </li>
        </ul>
    </li>
    <li>Проверить и обосновать оптимальность запросов.</li>
</ol>
Предоставить дамп базы и sql-файл с заданиями согласно задаче и текстами запросов решений.
</p>

<h2>Решение</h2>
<p><a href="/dump.sql">Дамп базы данных</a></p>
<p><a href="/task2.sql">SQL файл с заданиями</a></p>

<p>Для построения дерева категорий выбрана архитектура Nested Sets.</p>

<p>Все запросы проверенны с помощью команды EXPLAIN.<br>
    Все выборки используют индексы, что обеспечивает быстродействие и снижение нагрузок при выполнении запросов.</p>