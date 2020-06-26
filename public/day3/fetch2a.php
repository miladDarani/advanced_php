<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fetch 2 A</title>
    <script>
        
        
        var data = encodeURI('book_id=3');

        fetch('server2.php?' + data )
            .then(function(response){
                if(!response.ok){
                    throw new Error ('There was a problem' );
                } else {
                    return response.json();
                }
            })

            .then(function(data){
                console.log(data);
            })
            .catch(function(error){
                console.log(error);
            });

    </script>
</head>

<body>
    <h1>Fetch2a - Passing data to the server</h1>
    <p>see console</p>


</body>
</html>