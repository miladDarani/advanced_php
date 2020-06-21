<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>First Ajax</title>
    <script>

        //An Ajax requests has a number of steps.
        
        // 1 - create the Ajax object... XMLHttpRequest object
        
        var xhr = new XMLHttpRequest();

        console.log(xhr);

        // Where are we sending the request, and what type of request is it (GET or POST)
        xhr.open('GET', 'ajax_1.txt');
        // What kind of data are we expecting back
        // text (default... JSON, XML, html)
        // document (XML and HTML, but server must put header on it saying what it is)
        // json
        xhr.responseType = 'text';
        // How are we handling the request  once a response comes back
        // define the callback for handling the request and response
        xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && xhr.status == 200) {
                // We are good to go... 
                console.log(xhr.responseText);
                var out = document.getElementById('output');
                out.innerHTML = xhr.responseText;
            }
        }

        // we are DEFCON 0
        // 
        // Execute the request
        xhr.send(null);

        // 1
        // 2
        // 3
        // 4

        

    </script>
</head>
<body>

    <p>View console for more output</p>

    <h1 id="title"></h1>

    <div id="output"></div>

</body>
</html>
