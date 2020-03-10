# SQL

![](images/sql-diagram.png)

## 1. Query

Based on the SQL diagram above, write the following queries:

**A.** Get authors with a last name beginning with "M" or who are born after 1950.

**Answer:**
```mysql
SELECT *
FROM author
WHERE (last_name LIKE 'M%') AND (Year(birth_date) > 1950);
```

**B.** Count the number of books per category (empty categories too).

**Answer:**
```mysql
SELECT category.name, COUNT(*) AS 'number of books'
FROM category, book
WHERE category.id = book.category_id;
```

**C.** Find authors who wrote at least 2 books.

**Answer:**
```mysql
SELECT author.first_name
FROM author, book
WHERE ( SELECT count(*) FROM book,author WHERE book.author_id = author.id ) >= 2 
```

**D.** Get 50 authors with at least one event between the start and the end of this year.

**Answer:**
```mysql
SELECT TOP 50 * 
FROM author, author_event, event
WHERE (event.date BETWEEN (DATEADD(yy, DATEDIFF(yy, 0, GETDATE()), 0)) AND DATEADD(yy, DATEDIFF(yy, 0, GETDATE()) + 1, -1))
AND (author.id = author_event.author_id)
AND (event.id = author_event.event_id);
```

**E.** Get the average number of books written by authors.

**Answer:**
```mysql
SELECT AVG(COUNT(*))
FROM book
WHERE book.author_id IS NOT NULL
```

**F.** Get authors, sorted by the date of their **latest** event.

**Answer:**
```mysql
SELECT author.first_name,  author.last_name
FROM author, author_event, event
WHERE (author.id = author_event.author_id) AND (event.id = author_event.event_id)
ORDER BY event.date;
```

## 2. Database Structure

**A.** Based on the SQL diagram above, what can be done to improve the performance of this query ?

```mysql
SELECT id, name FROM book WHERE YEAR(published_date) >= '1973';
```

**Answer:** 
$date = '1973';
SELECT id, name FROM book WHERE YEAR(published_date) >= '$date';


**B.** Give 3 common good practice on a database structure to optimize queries.

**Answer:** 
 - try to avoid 'SELECT *'
 - use 'LIMIT 1' when getting a unique row
 - use the index to Search Fields
