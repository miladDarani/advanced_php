<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 1</title>
    <!-- BOOTSTRAP -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        
        .loader-gif{
            text-align: center;
            margin: 0 auto;
        }

.active-cyan-2 input.form-control[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.active-cyan input.form-control[type=text] {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.active-cyan .fa, .active-cyan-2 .fa {
  color: #4dd0e1;
}

    </style>
    <script>
// ------------------------------------------------------------------- \\
    function getBookList(data)
        {
            var xhr  = new XMLHttpRequest();
            xhr.open('GET', 'server.php');
            xhr.responseType = 'json';
            xhr.onreadystatechange = function ()
            {
                if(xhr.readyState == 4 && xhr.status == 200 ) {
                    console.log(xhr.response);
                    loadListView(xhr.response);
                }
            }

            xhr.send(null);
        }

// ------------------------------------------------------------------- \\

    function loadListView(books) {
        var html = '<table class=" table table-striped">';
        html+= `
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Num pages</th>
                <th>Year </th>
            </tr>
        `;

        for(var i in books) {

            html+=
            `
                <tr>
                    <td><a onclick="loadBook(event, this)" class= "book" href="#" data-id="${books[i].book_id}"> ${books[i].title}</a></td>
                    <td>${books[i].author}</td>
                    <td>${books[i].genre}</td>
                    <td>${books[i].num_pages}</td>
                    <td>${books[i].year_published}</td>
                </tr>
            `;
        }
        html+= "</table>";
        setTimeout(function(){
            document.getElementById('list').innerHTML = html;
        },500)
        
    }
// ------------------------------------------------------------------- \\
    function loadBook(e, book){
        console.log(book);
        var book_id = book.getAttribute('data-id');

        var xhr = new XMLHttpRequest();

        var data = encodeURI('book_id=' + book_id);

        xhr.responseType = 'json';

        xhr.open('GET', 'server.php?' + data);

        xhr.onreadystatechange = function (){
            if(xhr.readyState == 4 && xhr.status == 200 ){
                loadDetail(xhr.response);
            }
        }

        xhr.send(null);
    }    

// ------------------------------------------------------------------- \\
    function loadDetail(book){
        var html = 
        `
            <h3>${book.title}</h3>
            <img src="images/covers/${book.image}" alt="${book.title}">
            <p>${book.description}</p>
            <ul>
                <li><strong>Author: </strong> ${book.author}</li>
                <li><strong>Author Country: </strong> ${book.author_country}</li>
                <li><strong>Number of pages: </strong> ${book.num_pages}</li>
                <li><strong>Year Published: </strong> ${book.year_published}</li>
                <li><strong>Price: </strong> ${book.price}</li>
                <li><strong>Format: </strong> ${book.format}</li>
                <li><strong>Genre: </strong> ${book.genre}</li>
                <li><strong>Publisher City: </strong> ${book.publisher_city}</li>
            </ul>

        `;
        document.getElementById('detail').innerHTML = html;
    }
// ------------------------------------------------------------------- \\


// ------------------------------------------------------------------- \\


    window.onload = function(){
        getBookList();

        var live_key;
        var s=document.getElementById('s');

        s.addEventListener('keyup', function() {
            loadRequest(s.value);
        })

        //gets the input search value everytime there is a keypress
        //creates ajax request
        //sends the search to server.php
        //
        function loadRequest(key){

            var xhr = new XMLHttpRequest();
            
            xhr.open('GET', "server.php?s=" + key);

            xhr.responseType = 'json';

            xhr.onreadystatechange = function() {
               
                if(xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.response);
                }
            }

            xhr.send(null);
        
        }

    } //window



// ------------------------------------------------------------------- \\
    


    </script>
</head>
<body>
    <div class="container mt-5">





        <div class="row">
            <div class="col-sm-12">


                <!-- put search form here -->
                <form class="mb-5 form-inline d-flex justify-content-center md-form form-sm active-cyan active-cyan-2 mt-2" action="server.php" method="get">

                <label for="search">Search</label>

                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search" id="s" name="s">
                </form>


            </div>
            <div class="col-sm-6 list">
                <div id="list">
                    <h2 class="text-center">List view</h2>
                    <img class="loader-gif" src="images/200.gif" alt="">
                </div>
            </div>

            <div class="col-sm-6 detail">
                <div id="detail">
                    <h2 class="text-center">Detail View </h2>
                    
                </div>
            </div>

        </div>

    </div>
</body>
</html>