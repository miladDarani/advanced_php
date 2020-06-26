<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
        
    </script>

    <script >
    
        $(document).ready(function(){

            $('#title').html("Hello, JQUERY")
            $('.nav a').each(function(){
                console.log(this);
                console.log($(this).data('page'));
            })



            $('#hide').on('click', function(e){
            e.preventDefault();
            // $('.nav').fadeOut(3000)
            $('.nav').slideUp(200)

            });
        });



    </script>
</head>
<body>
    <h1 id="title"></h1>
    <p><button id="hide">Hide</button></p>

    <div id="main">
        
        <ul class="nav">
            <li><a  data-page="Google" href="https://google.ca">Google</a></li>
            <li><a  data-page="Yahoo" href="https://yahoo.ca">Yahoo</a></li>
            <li><a  data-page="Bing" href="https://bing.com">Bing</a></li>

        </ul>
    </div>
</body>
</html>