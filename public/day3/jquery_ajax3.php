<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>jquery and ajax 3</title>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        
   <script>
       $(document).ready(function(){

            handleForm();
       }); // /JQUERY

       function handleForm(){
        $('#register').on('submit', function(e){
            e.preventDefault();
            var data = $(this).serialize();
            if(!$(this).first.val() || !$(this).last.val() || !$(this).email.val())
            {
            $.post('server3.php', data, function(response, status, xhr){
                console.log(response);
            })
        }
       }
   </script>

</head>
<body>
      <h1>Jquery POST and form handling</h1>


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