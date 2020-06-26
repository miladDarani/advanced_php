<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 1</title>

    <!-- BOOTSTRAP -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css" type="text/css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <style>
        .form-control, #results {
            width: 50%;
            margin:0 auto;
        }
    </style>
    <script>
// ------------------------------------------------------------------- \\
    /**
     * [getBookList description]
     * @param  {[text]} 
     * @return {[json]}      
     */
    function getBookList(data)
        {
            // var xhr  = new XMLHttpRequest();
            // xhr.open('GET', 'server.php');
            // xhr.responseType = 'json';
            // xhr.onreadystatechange = function ()
            // {
            //     if(xhr.readyState == 4 && xhr.status == 200 ) {
            //         console.log(xhr.response);
            //         loadListView(xhr.response);
            //     }
            // }

            // xhr.send(null);


    // axios.get('axios-server.php', settings)
      axios.get('server.php')
        .then(function(response){
            return response.data
        })

        .then(function(data){
            loadListView(data);
        })

        .catch(function(error){
            console.error(error)
        });
        }

// ------------------------------------------------------------------- \\
    /**
     * [loadListView description]
     * @param  {[text]} books 
     * @return {[html]}   
     * Authomatically refreshes results through ajax    
     */
    function loadListView(books) {
        var html = '<table class=" table table-striped table-dark">';
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
        },700)
        
    }
// ------------------------------------------------------------------- \\
    /**
     * [loadBook description]
     * @param  {[event]} e    [description]
     * @param  {[text]} book [description]
     * @return {[json]}      [description]
     */
    function loadBook(e, book){
        e.preventDefault();
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
    /**
     * [loadDetail description]
     * @param  {[text]} book 
     * @return {[type]}      [description]
     */
    function loadDetail(book){
        var html = 
        `
            <h3>${book.title}</h3>
            <h5 class="colored-name">${book.author}</h5>
            <h3>$ ${book.price}</h3>
            <div class="right-side">
                <img src="images/covers/${book.image}" alt="${book.title}">
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
            </div>
                <p>${book.description}</p>
                <button type="button" class="btn btn-primary">Add To Cart</button>
                
            
        `;
        document.getElementById('detail').innerHTML = html;
    }
// ------------------------------------------------------------------- \\


// ------------------------------------------------------------------- \\


    window.onload = function(){
        
        getBookList();

        
        var s = document.getElementById('s');

        s.addEventListener('keyup', function() {
            loadRequest(s.value);
        })

        //gets the input search value everytime there is a keypress
        //creates ajax request
        //sends the search to server.php
        //gets the resonse back ( xhr.response )
        function loadRequest(key){



            var settings = {
                params: {
                    s: key
                }
            }

            // axios.get('axios-server.php', settings)
              axios.get('server.php?=' + key, settings)
                .then(function(response){
                    return response.data
                })

                .then(function(data){
                    outputResults(data);
                })

                .catch(function(error){
                    console.error(error)
                });

                //     $.get('server.php?s=' + key, null, function(response,status,xhr){
                //     loadListView(response);

                // }, 'json'); 

                
                }

    } //window



// ------------------------------------------------------------------- \\
    </script>

</head>
<body>

    <h1 class="mt-5">Milad Darani</h1>
    <h4>Assignment 1 - Adv PHP</h4>
            <div class="row">
            <div class="col-sm-12">
                <form id="search" novalidate autocomplete='off'>
                    
                    <div class="form-group">
                        <input type="text" class="form-control text-center" name="s" id="s" placeholder="Search">
                    </div>

                </form>
                <ul class="list-group" id="results">
                    <!-- item will be displyed here -->
                  <!--   <li class="list-group-item"><a href="">Under the Dome</a></li>
                    <li class="list-group-item"><a href="">Carrie</a></li> -->
                </ul>
            </div>
        </div>
    <div class="container mt-5">

        <div class="row">
            <div class="col-sm-12">



            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 list">
                <div id="list">
                    <h2 class="text-center">List view</h2>
                    <img  class="loader-gif" src="images/load1.gif" alt="">
                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 detail mb-5">
                <div id="detail">
                    <h2 class="text-center">Detail View </h2>
                    
                </div>
            </div>

        </div> <!-- /row -->

    </div> <!-- /container -->
    <!-- SCRIPTS -->
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"> 
    </script>
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <!-- milad script -->
    <script src="/day4/axios-search.js"></script>
</body>
</html>