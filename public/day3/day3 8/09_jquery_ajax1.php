<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>jQuery Ajax 1</title>

    <style>

        #out {
            /* display: none; */
        }

    </style>

     <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  <script>

    // jQuery has FOUR ajax methods, or wrappers around vanilla ajax
    // 
    // .load() - used to load text/html onto the page
    // .get() - used to make a GET request, with or without query string
    // .post() - use to make a POST request
    // .ajax() - more powerful, but needs to be configured for each request

    $(document).ready(function(){

        // .load is the simplest jquery Ajax method
        // .load() used ONLY for GET request, only text/html (not data)
        // .load() only used to load text/html into DOM element
        // .load() has optional second parameter, a callback function
        // that can be used to execute code AFTER the request is completed
        $('#out').load('server1.php', function(response, status, xhr){
            console.log(response);
            console.log(status);
            console.log(xhr);
            // $('#out').show('slow');
        });

    });

  </script>

</head>
<body>

    <h1>First jQuery Ajax - load</h1>

    <div id="out"></div>

</body>
</html>