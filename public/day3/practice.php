<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>practice</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            // $("button").click(function(){
            //      $.post("server1.php",
            //         {
            //             name: "Donald Duck",
            //             city: "Duckburg"
            //         },

            //         function(data,status){
            //             alert("Data: " + data + "\nStatus: " + status);
            //         });

            //         });
            
            $('#btn').on('click', function(w){
                w.preventDefault();
                var $ul = $('#put');

            $.ajax({
                type: 'GET',
                url: 'server2.php',
                success: function (book){
                    console.log(book)
                    $.each(book, function(i,book){
                        $ul.append(`<h3>${book.title}</h3>
            <h5 class="colored-name">${book.author}</h5>
            <h3>$ ${book.price}</h3>
            <div class="right-side">
                <img src="Assignment_1_jQuery/images/covers/${book.image}" alt="${book.title}">
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
                <button type="button" class="btn btn-primary">Add To Cart</button>`
                );
                    })

                    
                }
            })
            })
            
            });
        // we are pullling info from server1.php (whatevr is in there)
        // $.get("server1.php", function(data){
        // $('#put').html("Data: " + data);
        // });


    </script>
</head>
<body>
    <h1>practice</h1>

    <div id="put">
        <button id="btn">Click</button>
    </div>
</body>
</html>