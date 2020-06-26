<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>jQuery Forms</title>

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

                // How to get all form input field values
                // in a serialized URL encoded string
                var data = $(this).serialize();

            });
        }

    </script>

</head>
<body>

    <h1>jQuery Forms</h1>

     <form id="register">

        <p><label for="first">First name</label><br />
        <input type="text" name="first" /></p>

        <p><label for="last">Last name</label><br />
        <input type="text" name="last" /></p>

        <p><label for="email">Email</label><br />
        <input type="text" name="email" /></p>

        <p><button type="submit">Submit</button></p>

    </form>

</body>
</html>