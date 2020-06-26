

$(document).ready(function(){

    $('#s').on('keyup', function(e){
        if(e.keycode != 13) {
            loadResults($(this).val());
        }
        
    });

    $('#search').on('submit', function(e){
        e.preventDefault();
        loadResults($('#s').val(), true);
    });

   loadInitialData();

});

function loadInitialData()
{
     axios.get('axios-server.php')
        .then(function(response){
            return response.data;
        })
        .then(function(data){
            loadListView(data);
        })
        .catch(function(error){
            console.error(error);
        });
}

function loadResults(search_string, full = false)
{

    // Settings for axios object
    var settings = {
        params: {
            s: search_string
        }
    };

    // Execute our axios Ajax call, and input the settings
    axios.get('axios-server.php', settings)
    .then(function(response){
        return response.data
    })
    .then(function(data){
        if(full == false) {
            outputResults(data);
        } else {
            loadListView(data);
        }
        
    })
    .catch(function(error){
        console.error(error);
    });
}

function outputResults(data)
{
    const MAX_RESULTS = 5;
    var html = '';
    for(var i = 0; i < MAX_RESULTS; i++) {
        if(data[i] != undefined){
            html += `<li class="list-group-item"><a onclick="loadBook(event, this);clearForm();" 
                    data-id="${data[i].book_id}" href="">${data[i].title}</a></li>`;
        }
        
    }
    $('#results').html(html);
}

function loadListView(books)
{

   var html = '<table class="table table-striped">';
   html += `
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Year</th>
        </tr>
   `;
   for(var i in books) {

      html += `
        <tr>
            <td><a onclick="loadBook(event, this)" class="book" href="" data-id="${books[i].book_id}">${books[i].title}</a></td>

            <td>${books[i].author}</td>
            <td>${books[i].genre}</td>
            <td>${books[i].year_published}</td>
        </tr>
      `;
   }
   
    html += "</table>";

    $('#list').html(html);

    setTimeout(clearForm, 200);
}

function loadBook(e, book)
{
    e.preventDefault();

    var settings = {
        params: {
            book_id: $(book).data('id')
        }
    }
     console.log(settings);
     
    axios.get('axios-server.php',settings)
        .then(function(response){
            return response.data;
        })
        .then(function(data){
            loadDetail(data);
        })
        .catch(function(error){
            console.error(error);
        });

}

function loadDetail(book)
{

    $('#detail').hide();
     var html = `<h3>${book.title}</h3>

        <img src="images/covers/${book.image}" alt="${book.title}" />

        <p>${book.description}</p>

        <ul>
            <li><strong>Author:</strong> ${book.author}</li>
            <li><strong>Author Country:</strong> ${book.author_country}</li>
            <li><strong>Number of pages:</strong> ${book.num_pages}</li>
            <li><strong>Year Published:</strong> ${book.year_published}</li>
            <li><strong>Price:</strong> \$${book.price}</li>
            <li><strong>Format:</strong> ${book.format}</li>
            <li><strong>Genre:</strong> ${book.genre}</li>
            <li><strong>Publisher:</strong> ${book.publisher}</li>
            <li><strong>Publisher City:</strong> ${book.publisher_city}</li>
        </ul>`;
     
     $('#detail').html(html);
     $('#detail').fadeIn('slow');

}

function clearForm()
{
    $('#results').html('');
    $('#s').val('');
}