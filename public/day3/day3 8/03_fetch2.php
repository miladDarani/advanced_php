<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Fetch 2</title>
    <script>

        fetch('server2.php')
        .then(function(response){
          if(!response.ok) {
            throw new Error('There was a problem loading your data');
          } else {
            return response.json();
          }
        })
        .then(function(data){
          console.log(data);
        })
        .catch(function(error){
            console.error(error);
        });




    </script>
</head>
<body>

    <h1>Reading Data with Fetch part 1</h1>

    <p>View console for output</p>

</body>
</html>