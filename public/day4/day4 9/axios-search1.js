

$(document).ready(function(){

    $('#s').on('keyup', function(e){
        loadResults($(this).val());
    });

    $('#search').on('submit', function(e){
        e.preventDefault();
        // still do complete
    });


});


function loadResults(search_string)
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
        outputResults(data);
    })
    .catch(function(error){
        console.error(error);
    });
}

function outputResults(data)
{

    var html = '';
    for(var i in data) {
        html += `<li class="list-group-item"><a onclick="loadBook(event, this);clearForm();" 
                    data-id="${data[i].book_id}" href="">${data[i].title}</a></li>`;
        }
    $('#results').html(html);
}
