<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>jQuery Ajax Review</title>

     <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

    <script>

        // Three jQuery ajax methods
        // .load() - simple get request, loads text or html only
        // .get() - standard get request, can load data
        // .post() - standard post request, can send data and receive data
        
        
        
        $(document).ready(function(){

            // Second optional parameter for .load() is a callback function
            // that is called regardless of whether or not the request
            // is a success.
            
            $('#out').load('review_server.txt', function(){
                // alert('Request complete');
            });


            var data = {id: 22};
            $.get('review_server.php', data, function(response, status, xhr){
                console.log(response);
                console.log(status);
                console.log(xhr);
            }, 'json');


            var data = {name: 'Mallory Waldo Klingdanger'};
            $.post('review_server.php', data, function(response, status, xhr){
                console.log(response);
                console.log(status);
                console.log(xhr);
            }, 'json');


        });
        

    </script>
</head>
<body>

    <h1>jQuery Ajax Review</h1>

    <p>Look at console for more output</p>

    <div id="out"></div>

</body>
</html>