<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$dbh = new PDO('sqlite:booksite.sqlite');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if('GET' == $_SERVER['REQUEST_METHOD']) {
    if(empty($_GET['book_id'])) {
        $query = 'SELECT book.*,
                    author.name as author,
                    genre.name as genre

                    FROM book
                    
                    JOIN author USING(author_id)
                    JOIN genre USING(genre_id)';
        $stmt = $dbh->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $query = 'SELECT * FROM book WHERE book_id = :book_id';
        $stmt = $dbh->prepare($query);
        $params = array(':book_id' => (int) $_GET['book_id']);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

if('POST' == $_SERVER['REQUEST_METHOD']) {
    $results = [];
    $post = json_decode(file_get_contents('php://input'));
    $query = "UPDATE BOOK set
                title = :title,
                year_published = :year_published,
                price = :price,
                num_pages = :num_pages,
                description = :description
                WHERE
                book_id = :book_id";
    $params = array(
        ':title' => $post->title,
        ':year_published' => $post->year_published,
        ':price' => $post->price,
        ':num_pages' => $post->num_pages,
        ':description' => $post->description,
        ':book_id' => $post->book_id,
    );
    $stmt = $dbh->prepare($query);
    $stmt->execute($params);
    if($stmt->rowCount()) {
        $results['success'] = true;
    } else {
        $results['success'] = false;
    }
}

    header('Content-Type: application/json');
    echo json_encode($results);

