<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POST with data</title>
    <script>
        
        //sending as URL encoded form data
        //1.create xhr
        var xhr = new XMLHttpRequest();

        //2.open
        xhr.open('POST', 'server3.php');

        // tell it what type of data you are sending
        
        xhr.responseType = 'json';
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        //3.ready function
        xhr.onreadystatechange = function (){
            if(xhr.readyState === 4 && xhr.status == 200) {
                console.log(xhr.response);
            }
        }

        var data = {}

        data.first="Dave";
        data.last= "Jones";
        data.email="Dave@example.com";
        json_data = JSON.stringify(data);

        //4.send
        xhr.send(json_data);

    </script>
</head>
<body>
    <h1>Get with Data</h1>
    <p>look at console</p>
</body>
</html>