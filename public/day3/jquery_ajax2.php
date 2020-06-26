<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading Data</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        
    <script>
        
        //simple GET request that return data
        $.get('server2.php', null, function(response,status,xhr){
            console.log(response);

        }, 'json'); // /.get()

        $.get('server1.php', null , function(response){
            $('#out').html(response);
        })
    </script>

</head>
<body>
    <h1>Loading data with AJAX and JQUERY</h1>

    <div id="out"></div>
</body>
</html>