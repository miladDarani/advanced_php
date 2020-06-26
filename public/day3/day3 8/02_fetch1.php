<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Fetch 1</title>
    <script>

       /* 
        // Simplest verison of Fetching and outputting data
       fetch('server1.php')
            .then(response => {
                return response.text();
            })
            .then(data => {
                document.getElementById('out').innerHTML = data;
            });
        */

        window.onload = function()
        {
            // fetch works with promises
            fetch('server1.php') // fetch a URL
              .then(function(response){ // handle response in the first promise
                console.log(response);
                if(response.ok == true) {
                    return response.text();
                } else {
                    throw new Error('There was a problem loading ' + response.url);
                }
                
            })
           .then(function(data){ // handle the data in the second promise
              console.log(data);
              document.getElementById('out').innerHTML = data;
           })
           .catch(function(error){ // handle any errors in the final catch
                console.log(error);
           });

        }

    </script>
</head>
<body>

    <h1>Fetch 1</h1>

    <div id="out"></div>

</body>
</html>
