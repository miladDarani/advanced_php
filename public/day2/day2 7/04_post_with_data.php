<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>POST with Data</title>
    <script>

        // Sending as urlencoded form data

        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'server2.php');

        // If we set the xhr object to expect JSON as a response
        // It will parse any received JSON string into an Object
        // we can use immediately
        xhr.responseType = 'json';
        
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            console.log(xhr);
            if(xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.response);
            }
        }

        var data = encodeURI('first=Dave&last=Jones&email=dave@example.com');

        xhr.send(data);

    </script>
</head>
<body>

    <h1>Get With Data</h1>

    <p>View console for more output</p>

</body>
</html>