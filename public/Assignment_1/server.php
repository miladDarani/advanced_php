<?php

// Server PHP



$dbh = new PDO('sqlite:booksite.sqlite');

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

header('Content-Type: application/json');

function searchResults($term){

    //get one book
    $query = "SELECT book.*,
                author.name as author,
                author.country as author_country,
                format.name as format,
                publisher.name as publisher,
                publisher.city as publisher_city,
                genre.name as genre
                FROM
                book
                JOIN author using( author_id)
                JOIN format using( format_id)
                JOIN genre using( genre_id)
                JOIN publisher using( publisher_id)
                WHERE
                book.title LIKE :term1";

    $stmt = $dbh->prepare($query);

    $params = array(
        ':term1' => "%{$term}%"
    );

    $stmt->execute($params);

    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));

    die;  
}

if(!empty($_GET['book_id'])) {

    //get one book
    $query = "SELECT book.*,
                author.name as author,
                author.country as author_country,
                format.name as format,
                publisher.name as publisher,
                publisher.city as publisher_city,
                genre.name as genre
                FROM
                book
                JOIN author using( author_id)
                JOIN format using( format_id)
                JOIN genre using( genre_id)
                JOIN publisher using( publisher_id)
                WHERE
                book_id = :book_id";

    $stmt = $dbh->prepare($query);

    $params = array(
        ':book_id' => intval($_GET['book_id'])
    );

    $stmt->execute($params);

    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));

    die;
//-------------------------------- /if ------------------------
} elseif(!empty($_GET['s'])){
    $search_term = $_GET['s'];
    $query = "SELECT * FROM `book`
    JOIN author USING(author_id) 
    WHERE `title` LIKE '%{$search_term}%'
    OR author.name LIKE '%{$search_term}%'

    ";

    $stmt = $dbh->prepare($query);
    $stmt->execute();

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    //search query in here
    //search agaisnt author and , use 'like'
} else {
    //get all books
    $query = "SELECT book.*,
                author.name as author,
                author.country as author_country,
                format.name as format,
                publisher.name as publisher,
                publisher.city as publisher_city,
                genre.name as genre
                FROM
                book
                JOIN author using( author_id)
                JOIN format using( format_id)
                JOIN genre using( genre_id)
                JOIN publisher using( publisher_id)
                ORDER BY title ASC";

    $stmt = $dbh->prepare($query);

    $stmt->execute();

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

// } catch (Exception $e) {
//     $errors = ['error' => $e->getMessage()];
//     echo json_encode($errors);
// }