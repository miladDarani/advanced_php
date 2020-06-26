<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ajax Form</title>

    
    <script>
        window.onload = function (){
            handleForm();
        }

        function handleForm(){
            document.getElementById('register').addEventListener('submit', function(e){
                e.preventDefault();
                
                if(!this.first.value || !this.last.value || !this.email.value) {
                    alert('All fields are required');
                    return;
                } 

                var data = {};
                data.first = this.first.value
                data.last = this.last.value
                data.email = this.email.value

                var params = {
                    method: "POST",
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json' // tell PHP to put it in the head and let the programmer figure it out - it is NOT a form , it is JSON
                    }
                };

                fetch('server3a.php', params)

                    .then(function(response){
                        if(!response.ok){
                            throw new Error ('there was a problem instering thee data');
                        }else {
                            return response.json();
                        }
                    })


                    .then(function(data){
                        console.log(data);
                    })


                    .catch(function(error){
                        console.log(error);
                    });
            }); // addE
        }
    </script>
</head>
<body>

    <h1>Ajax Form</h1>


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