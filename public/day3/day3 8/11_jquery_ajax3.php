<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>jQuery Ajax3 - POST</title>

     <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  <script>

    $(document).ready(function(){
        handleForm();
    });

    function handleForm()
    {
        $('#register').on('submit', function(e){

            e.preventDefault();

            if(!$('#first').val() || !$('#last').val() || !$('#email').val()) {
                alert('All fields are required');
                return;
            }

            var data = $(this).serialize();

            $.post('server3.php', data, function(response, status, xhr){
                console.log(response);
            }, 'json');
        });
    }

  </script>
</head>
<body>

    <h1>jQuery POST and Form Handling</h1>

    <form id="register">

        <p><label for="first">First name</label><br />
        <input id="first" type="text" name="first" /></p>

        <p><label for="last">Last name</label><br />
        <input id="last" type="text" name="last" /></p>

        <p><label for="email">Email</label><br />
        <input id="email" type="text" name="email" /></p>

        <p><button type="submit">Submit</button></p>

    </form>

</body>
</html>