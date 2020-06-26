<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>jQuery Ajax 2 - Loading Data</title>

    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  <script>

    // Don't need document ready, because we are not outputting to the page
    // A simple get request that returns data
    
    // Parameters
    // 1. The url
    // 2. Data (plain object)
    // 3. Callback when request is complete
    // 4. Type of data that we can expect
    $.get('server2.php', null, function(response, status, xhr){
        console.log(response);
    }, 'json');

  </script>
</head>
<body>

    <h1>Loading Data with jQuery Ajax</h1>

    <div id="out"></div>

</body>
</html>