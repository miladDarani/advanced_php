<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>jQuery Ajax - ajax() method</title>
    
</head>
<body>
    <h1>jQuery Ajax() method</h1>

    <p>Look at console for output</p>


    <form id="register">

        <p><label for="first">First name</label><br />
        <input id="first" type="text" name="first" /></p>

        <p><label for="last">Last name</label><br />
        <input id="last" type="text" name="last" /></p>

        <p><label for="email">Email</label><br />
        <input id="email" type="text" name="email" /></p>

        <p><button type="submit">Submit</button></p>

    </form>


<!-- Javascripts below -->

<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  <script>

    // The final jQuery ajax method is called: ajax()
    // It's a little more complicated than load, get or post
    
    $(document).ready(function(){
        $('#register').on('submit', function(e){

            e.preventDefault();

            if(!$('#first').val() || !$('#last').val() || !$('#email').val()) {
                alert('All fields are required');
                return;
            }

            var data = {};
            data.first = $('#first').val();
            data.last = $('#last').val();
            data.email =  $('#email').val();

            var init = {
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response, status, xhr) {
                    console.log(response);
                    console.log(status);
                    console.log(xhr);
                },
                error: function(xhr, status, message) {
                    console.log(xhr);
                    console.log(status);
                    console.log(message);
                },
                complete: function() {
                    alert('Ajax Request is complete!');
                }
            }

            $.ajax('server1.php', init);

        });
    });
    
  </script>

  <!-- END JAVASCRIPTS -->
</body>
</html>



