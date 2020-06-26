
$(document).ready(function(){


    $('#s').on('keyup', function(e){
        loadResults($(this).val());
    });



    $('#search').on('submit', function(e){
        e.preventDefault();
    });


}); // END READY




/**
 * [loadResults description]
 * @param  {[type]} s [description]
 * @return {[type]}   [description]
 */
function loadResults(search_string)
{

    var settings = {
        params: {
            s: search_string
        }
    }

    // axios.get('axios-server.php', settings)
      axios.get('server.php', settings)
        .then(function(response){
            return response.data
        })

        .then(function(data){
            outputResults(data);

            document.getElementById('search').addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                loadListView(data);
                clearForm();
            }
            
        });
        })

        .catch(function(error){
            console.error(error)
        });

} // /loadResults

function clearForm(){
    
    $('#results').hide();
}

function outputResults(data)
{
    var html = ``;

    for(var i in data){
        html+=`<li class="list-group-item"><a onclick="loadBook(event, this);" 
        data-id="${data[i].book_id}" href="">${data[i].title}</a></li>`;
    }

    $('#results').html(html);


}
$('#search').on('submit', function(){
    $('#detail').html()
})