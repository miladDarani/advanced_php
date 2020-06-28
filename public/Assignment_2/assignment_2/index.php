<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 2</title>

    <!-- BOOTSTRAP -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css" type="text/css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/977c9f68f6.js" crossorigin="anonymous"></script>

</head>
<body>

    <h1 class="mt-5">Milad Darani</h1>
    <h4>Assignment 2 - Adv PHP</h4>

    <div class="container mt-5">

        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 list">
                <div id="list-wrapper">
                <div id="list">
               
                    <h2 class="text-center">List view</h2>
                    <p><button @click="loadBooks()" class="btn btn-warning">RESET BOOKS</button></p>
                
                    <!-- <img  class="loader-gif" src="images/load1.gif" alt=""> -->
                    <table class=" table table-striped table-dark">
                         <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Format</th>
                            <th>Publisher</th>
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
                            <td class="milad-td" style=" cursor:pointer" @click="loadAuthor(book.author_id)">{{book.author}}</td>
                            <td class="milad-td" style=" cursor:pointer" class="genre" @click="loadGenre(book.genre_id)">{{book.genre}}</td>
                            <td class="milad-td" style=" cursor:pointer" @click="loadFormat(book.format_id)">{{book.format}}</td>
                            <td class="milad-td" style=" cursor:pointer" @click="loadPublisher(book.publisher_id)">{{book.publisher}}</td>
                            <td>{{book.num_pages}}</td>
                            <td>{{book.year_published}}</td>
                            <td><img v-bind:src=" 'images/covers/' + book.image  " /></td> 
                            <td>

                                <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      
                                        <button type="button" class="close" style="text-align:right; padding:0 10px;" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      
                                      <div class="modal-body" id="modal-body">
                                       
                                        <!-- Data For Modal is dynamically inserted here -->

                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            
                            </td>
                        </tr> 
                    </table>
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
            title: "Assignment 2",
            books:[
            ]
        },
        methods: {

            /**
             * [loadBooks description]
             * @return all books JSON
             */
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

            /**
             * [loadGenre description]
             * @param  
             * @return Selected Genre JSON
             */
            loadGenre: function(id){
                var self = this;
                axios.get('server.php?genre_id=' + id)
                    .then(function(response){
                        self.books= response.data;
                        console.log(self.books)

                    })
                    .catch(function(errors){
                        console.error(error);
                    })
            },
            /**
             * [loadFormat description]
             * @param  
             * @return Selected Format JSON
             */
            loadFormat: function(id){
                var self = this;
                axios.get('server.php?format_id=' + id)
                    .then(function(response){
                        self.books= response.data;
                        console.log(self.books)

                    })
                    .catch(function(errors){
                        console.error(error);
                    })
            },
            /**
             * [loadFormat description]
             * @param  
             * @return Selected Author JSON
             */
            loadAuthor: function(id){
                var self = this;
                axios.get('server.php?author_id=' + id)
                    .then(function(response){
                        self.books= response.data;
                        console.log(self.books)

                    })
                    .catch(function(errors){
                        console.error(error);
                    })
            },
            /**
             * [loadFormat description]
             * @param  
             * @return Selected Publisher JSON
             */
            loadPublisher: function(id){
                var self = this;
                axios.get('server.php?publisher_id=' + id)
                    .then(function(response){
                        self.books= response.data;
                        console.log(self.books)

                    })
                    .catch(function(errors){
                        console.error(error);
                    })
            },
            /**
             * [loadFormat description]
             * @param  
             * @return Selected Book (Single) JSON
             */
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
            /**
             * [loadFormat description]
             * @param  
             * @return Selected Book JSON
             */
            loadOneBook: function(data) {
              
                html = `
                 

                    <h3 style="color:black">${data.title}</h3>
                    <h6 class="author-head">By: ${data.author}</h6>

                    <div class="modal-wrap">    
                        <div id="left">
                            
                            <h5 style="text-align:left" class="mt-3">Price:  $${data.price}</h5>
                            <h6>Format: ${data.format}</h6>
                            <h6>Genre: ${data.genre}</h6>
                            <h6>Pages: ${data.num_pages}</h6>
                            <h6>Year : ${data.year_published}</h6>
                            <h6>Publisher: ${data.publisher}</h6>
                            
                        </div>


                        <div id="right">
                            <img class="modal-img" src="images/covers/${data.image}" />
                        </div>
                     
                    </div>

                    <div class="modal-p">
                        <p>${data.description}</p>
                    </div>
                       
                `
                document.getElementById('modal-body').innerHTML = html;
            },
        
        },// Methods

        mounted: function(){
            this.loadBooks();
        }

    })


</script> 
         
</body>
</html>