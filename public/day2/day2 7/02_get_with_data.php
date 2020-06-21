<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Get with Data</title>
    <script>

        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'server1.php?first=Dave&last=Jones&email=dave@example.com');

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

        xhr.send(null);

    </script>
</head>
<body>

    <h1>Get With Data</h1>

    <p>View console for more output</p>

</body>
</html>