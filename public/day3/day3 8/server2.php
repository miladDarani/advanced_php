<?php

// Server PHP

try {

$dbh = new PDO('sqlite:booksite.sqlite');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

header('Content-Type: application/json');

if(!empty($_GET['book_id'])) {

    /**
     * Return a list of ALL books
     */

    $query = "SELECT book.*,
                author.name as author,
                author.country as author_country,
                format.name as format,
                publisher.name as publisher,
                publisher.city as publisher_city,
                genre.name as genre 
                FROM 
                book 
                JOIN author using(author_id)
                JOIN format using(format_id) 
                JOIN genre using(genre_id) 
                JOIN publisher using(publisher_id) 
                WHERE 
                book_id = :book_id";

    $stmt = $dbh->prepare($query);

    $params = array(
        ':book_id' => intval( $_GET['book_id'] )
    );

    $stmt->execute($params);

    echo json_encode( $stmt->fetch(PDO::FETCH_ASSOC) );

    die;

} elseif(!empty($_GET['s'])) {

    /**
     * Return a list of search results
     */

     $query = "SELECT book.*,
                author.name as author,
                author.country as author_country,
                format.name as format,
                publisher.name as publisher,
                publisher.city as publisher_city,
                genre.name as genre 
                FROM 
                book 
                JOIN author using(author_id)
                JOIN format using(format_id) 
                JOIN genre using(genre_id) 
                JOIN publisher using(publisher_id)
                WHERE 
                book.title LIKE \"%{$_GET['s']}%\"
                OR
                author.name LIKE \"%{$_GET['s']}%\"
                ORDER BY book.title ASC";

    $stmt = $dbh->prepare($query);

    $stmt->execute();

    echo json_encode( $stmt->fetchAll(PDO::FETCH_ASSOC) );

    die;

} else {

    /**
     * Return a book detail
     */

    $query = "SELECT book.*,
                author.name as author,
                author.country as author_country,
                format.name as format,
                publisher.name as publisher,
                publisher.city as publisher_city,
                genre.name as genre 
                FROM 
                book 
                JOIN author using(author_id)
                JOIN format using(format_id) 
                JOIN genre using(genre_id) 
                JOIN publisher using(publisher_id)
                ORDER BY book.title ASC";

    $stmt = $dbh->prepare($query);

    $stmt->execute();

    echo json_encode( $stmt->fetchAll(PDO::FETCH_ASSOC) );

    die;
    
}


} catch (Exception $e) {
    $errors = ['error' => $e->getMessage()];
    echo json_encode($errors);
}