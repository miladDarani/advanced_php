<?php
try{
// adding Databse
$dbh = new PDO('sqlite:booksite.sqlite');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Type = JSON
header('Content-Type: application/json');



if(!empty($_GET['book_id'])) {

    //gets one book
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

    //search result
    $search_term = $_GET['s'];
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
                WHERE `title` LIKE '%{$search_term}%'
                OR author.name LIKE '%{$search_term}%'
                ORDER BY title ASC";      


    $stmt = $dbh->prepare($query);
    
    $stmt->execute();

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    //search query in here
    //search agaisnt author and , use 'like'
} else {

    // otherwise get all books
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

} catch (Exception $e) {
    $errors = ['error' => $e->getMessage()];
    echo json_encode($errors);
}