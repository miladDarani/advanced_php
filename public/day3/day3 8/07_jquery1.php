<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>jQuery 1</title>

    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  <script>

    console.log($);
    console.log(jQuery);

    // Wait for the DOM - equivalent of window.onload
    $(document).ready(function(){
        // document.getElementById('title').innerHTML = 'Hello, jQuery!';
        $('#title').html('Hello, jQuery!');

        // var links = document.getElementsByTagName('a');
        // 
        // This is the equivalent of a loop, going over the
        // collection of links
        $('.nav a').each(function(){

            // vanilla js
            console.log(this);
            console.log(this.getAttribute('data-page'));

            // jquery
            console.log($(this));
            console.log($(this).data('page'));
        });

        /*

        document.getElementById('hide').click = function(){ 
        }

        $('#hide').click(function(e){
        });

        */
    

        /* document.getElementById('hide').addEventListener('click', function(e){

        }); */

       $('#hide').on('click', function(e){
            // Multiple ways to hide things jQuery
            e.preventDefault();
            // $('.nav').hide();
            // $('.nav').fadeOut();
            $('.nav').slideUp();
       });

       $('#show').on('click', function(e){
            e.preventDefault();
            // $('.nav').show();
            // $('.nav').fadeIn();
            $('.nav').slideDown();
       });

    });

  </script>

</head>
<body>

    <h1 id="title"></h1>

    <p><button id="hide">Hide</button>&nbsp;<button id="show">show</button></p>

    <div id="main">

        <ul class="nav">
            <li><a data-page="google" href="https://google.ca">Google</a></li>
            <li><a data-page="Yahoo" href="https://yahoo.ca">Yahoo</a></li>
            <li><a data-page="Bing" href="https://bing.com">Bing</a></li>
            <li><a data-page="Dogpile" href="https://dogpile.com">Dogpile</a></li>
        </ul>

    </div>

</body>
</html>