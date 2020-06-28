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
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/977c9f68f6.js" crossorigin="anonymous"></script>
    <script>
// ------------------------------------------------------------------- \\
    /**
     * [getBookList description]
     * @param  {[text]} 
     * @return {[json]}      
     */
    // function getBookList(data)
    //     {
    //         var xhr  = new XMLHttpRequest();
    //         xhr.open('GET', 'server.php');
    //         xhr.responseType = 'json';
    //         xhr.onreadystatechange = function ()
    //         {
    //             if(xhr.readyState == 4 && xhr.status == 200 ) {
    //                 console.log(xhr.response);
    //                 loadListView(xhr.response);
    //             }
    //         }

    //         xhr.send(null);
    //     }

// ------------------------------------------------------------------- \\
    /**
     * [loadListView description]
     * @param  {[text]} books 
     * @return {[html]}   
     * Authomatically refreshes results through ajax    
     */
    // function loadListView(books) {
    //     var html = '<table class=" table table-striped table-dark">';
    //     html+= `
    //         <tr>
    //             <th>Title</th>
    //             <th>Author</th>
    //             <th>Genre</th>
    //             <th>Num pages</th>
    //             <th>Year </th>
    //         </tr>
    //     `;

    //     for(var i in books) {

    //         html+=
    //         `
    //             <tr>
    //                 <td><a onclick="loadBook(event, this)" class= "book" href="#" data-id="${books[i].book_id}"> ${books[i].title}</a></td>
    //                 <td>${books[i].author}</td>
    //                 <td>${books[i].genre}</td>
    //                 <td>${books[i].num_pages}</td>
    //                 <td>${books[i].year_published}</td>
    //             </tr>
    //         `;
    //     }
    //     html+= "</table>";
    //     setTimeout(function(){
    //         document.getElementById('list').innerHTML = html;
    //     },700)
        
    // }
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
    var number  =3;
// ------------------------------------------------------------------- \\


// ------------------------------------------------------------------- \\


    // window.onload = function(){
    //     getBookList();

        
    //     var s = document.getElementById('s');

    //     s.addEventListener('keyup', function() {
    //         loadRequest(s.value);
    //     })

    //     //gets the input search value everytime there is a keypress
    //     //creates ajax request
    //     //sends the search to server.php
    //     //gets the resonse back ( xhr.response )
    //     function loadRequest(key){

    //         var xhr = new XMLHttpRequest();
            
    //         xhr.open('GET', "server.php?s=" + key);

    //         xhr.responseType = 'json';

    //         xhr.onreadystatechange = function() {
               
    //             if(xhr.readyState == 4 && xhr.status == 200) {
    //                 console.log(xhr.response);
    //                 loadListView(xhr.response);
    //             }
    //         }

    //         xhr.send(null);
        
    //     }

    // } //window



// ------------------------------------------------------------------- \\
    


    </script>
</head>
<body>

    <h1 class="mt-5">Milad Darani</h1>
    <h4>Assignment 1 - Adv PHP</h4>

    <div class="container mt-5">

        <div class="row">
            <div class="col-sm-12">

                <!-- put search form here -->
                <form class="mb-5 form-inline d-flex justify-content-center md-form form-sm active-cyan active-cyan-2 mt-2" action="server.php" method="get">

                <label for="s">Search</label>

                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search" id="s" name="s">
                </form>


            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 list">
                <div id="list-wrapper">
                <div id="list">
               
                    <h2 class="text-center">List view</h2>
                
                    <!-- <img  class="loader-gif" src="images/load1.gif" alt=""> -->
                    <table class=" table table-striped table-dark">
                         <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Pages</th>
                            <th>Year </th>
                            <th>Image </th>

                        </tr>
                        
                        <tr v-for="book in books" class="book" id="books1">
                            
                            <td>
                                <button @click="bookModal(book.book_id)" type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    {{book.title}}
                                </button>
                            </td>


                            <td>{{book.author}}</td>
                            <td>{{book.genre}}</td>
                            <td>{{book.num_pages}}</td>
                            <td>{{book.year_published}}</td>
                            <td><img v-bind:src=" 'images/covers/' + book.image  " /></td> 
                            <td>
                            <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body" id="modal-body">
                                   
                                    



                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </td>

       
                        </tr> 


                        
                        
                        

                            

                    </table>



                </div>
                <div id="myModal1"></div>
                
                    
                        

                    

               

                


                





            </div>
            </div>



        </div> <!-- /row -->

    </div> <!-- /container -->

    <!-- VUE -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- AXIOS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.16.0/js/md5.min.js"></script>
<!-- My Script -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
<script>







var app = new Vue({
        el:"#list",
        data:{
            title: "Vue loading data with php",
            books:[
            ]
        },
        methods: {


            loadBooks: function(){
                var self = this;
                axios.get('server.php')
                    .then(function(response){
                        self.books= response.data;
                        

                    })
                    .catch(function(errors){
                        console.error(error);
                    })
            },
            

            bookModal: function(id){
                
              var self = this;
                axios.get('server.php?book_id='+id)
                .then(function(response){

                    //RESULT OF ONE BOOK
                    var one_book = response.data;
                    self.loadOneBook(one_book);
                    document.getElementById('myModal1').style.display = 'block';
                  
                    console.log(response.data)
                })
                .catch(function(error){
                    console.error(error)
                })
                 
                
            },

            loadOneBook: function(data) {
              
                html = `
                 
                    <p style="color:black">${data.title}</p>



        
                    
                `
                document.getElementById('modal-body').innerHTML = html;
            },
            

        
            },// Methods




        mounted: function(){
            this.loadBooks();
            
            


        }

    })


</script>
<script>
    $(document).ready(function(){

    })
</script>  
         
</body>
</html>