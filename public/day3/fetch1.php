
<?php

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fetch 1</title>
    <script>
        
        window.onload = function (){
            //fetch works with promises
            //Step1
            fetch('fetch1_server.php') // fetch a URL
            //Step2
            .then(function(response){ // Handle the response in the first promise
                console.log(response);
                if(response.ok == true){
                    return response.text();
                } else {
                    throw new Error('There was a problem with ' + response.url);
                }
            })
            .then(function(data){ // handle the data in second promise
                console.log(data);
                document.getElementById('out').innerHTML = data;
            })
            .catch(function(error){ //handle any errors in the final catch
                console.log(error);
            })
        }



    </script>
</head>
<body>
    <h1>fetch1</h1>
    <div id="out">
        
    </div>
</body>
</html>