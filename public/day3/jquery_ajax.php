<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>jQuery & AJAX</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
        
    </script>
    <style>
        #out{
            display: none;
        }
    </style>
    <script>
        $(document).ready(function(){


            
            $('#out').load('server1.php', function(response, status, xhr){
                console.log(response)
                console.log(status)
                console.log(xhr)
                $('#out').show('slow');
            });


        }) // /JQUERY
    </script>
</head>
<body>
    <h1>jQuery AJAX 1</h1>
    
    <div id="out"></div>
</body>
</html>