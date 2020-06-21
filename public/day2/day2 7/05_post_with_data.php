<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>POST with Data</title>
    <script>

        // Sending without URL encoding
        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'server3.php');

        // If we set the xhr object to expect JSON as a response
        // It will parse any received JSON string into an Object
        // we can use immediately
        xhr.responseType = 'json';

        xhr.onreadystatechange = function() {
            console.log(xhr);
            if(xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.response);
            }
        }
        
        // Create an object to hold our data
        var data = {};

        data.first = 'Dave';
        data.last = 'Jones';
        data.email = 'dave@example.com'

        // Convert object to String
        json_data = JSON.stringify(data);

        // console.log(data);
        // 
        // console.log(json_data);

        xhr.send(json_data);

    </script>
</head>
<body>

    <h1>Get With Data</h1>

    <p>View console for more output</p>

</body>
</html>