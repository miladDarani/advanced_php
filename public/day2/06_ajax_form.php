<?php




?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajax Form</title>

    <script>
        
        window.onload = function (){

            handleForm();

        }

        function handleForm(){

            var form = document.getElementById('register');

            form.addEventListener('submit', function(e){
                e.preventDefault();
                console.log(this);

                var data = {};
                data.first = this.first.value;
                data.last = this.last.value;
                data.email = this.email.value;
                console.log(data);
                this.reset();
                sendData(data);
                if(!data.email || !data.first || !data.last) {
                    alert("issue");
                    return false;
                }

            }) //addEventListener
        }


        function sendData(data)
        {
            var xhr  = new XMLHttpRequest();
            xhr.open('POST', 'server6.php');
            xhr.onreadystatechange = function ()
            {
                if(xhr.readyState == 4 && xhr.status == 200 ) {
                    console.log(xhr.response);
                }
            }
            var json_data = JSON.stringify(data);
            xhr.send(json_data);
        }
    </script>
</head>
<body>
   <h1>AJAX Form</h1> 
   <form id="register">
       <p><label for="first">First Name</label>
       <input type="text" name="first"></p>

       <p><label for="last">Last Name</label>
       <input type="text" name="last"></p>

       <p><label for="email">Email</label>
       <input type="text" name="email"></p>

       <p><button type="submit">SEND</button></p>
   </form>
</body>
</html>