<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Fetch 2a - Passing Data to the server</title>
    <script>

        var data = encodeURI('book_id=3');

        fetch('server2.php?' + data)
          .then(function(response){
            if(!response.ok) {
                throw new Error('There was a problem loading your data from ' + response.url);
            } else {
                return response.json();
            }
          })
          .then(function(data){
            console.log(data);
          })
          .catch(function(error) {
            console.error(error);
          });

    </script>
</head>
<body>

    <h1>Fetch 2a - Passing data to the server</h1>

    <p>Please see console for more output</p>

</body>
</html>