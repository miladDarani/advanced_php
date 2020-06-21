<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get with data</title>
    <script>
        
        //1.create xhr
        var xhr = new XMLHttpRequest();
        //2.open
        xhr.open('GET', 'server1.php?first=Dave&last=Jones&email=dave@example.com');
        // tell it what type of data you are sending
        xhr.responseType = 'json';
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //3.ready function
        xhr.onreadystatechange = function (){
            if(xhr.readyState === 4 && xhr.status == 200) {
                console.log(xhr.response);
            }
        }

        // var data = "first=Dave&last=Jones&email=dave@example.com";
        //4.send
        xhr.send(null);

    </script>
</head>
<body>
    <h1>Get with Data</h1>
    <p>look at console</p>
</body>
</html>