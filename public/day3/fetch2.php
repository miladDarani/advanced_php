<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fetch 2</title>
    <script>

        //1. Step 1
        fetch('server2.php')
            // Step 2
            .then(function(response){
                if(!response.ok){
                    throw new Error('There was a problem');
                }else {
                    return response.json();
                }
            })

            //Step.3
            .then(function(data){
                console.log(data);
            })
            .catch(function(error){
                console.error(error);
            })
    </script>
</head>
<body>
    <h1>Reading data with fetch</h1>
    <p>view console</p>
</body>
</html>