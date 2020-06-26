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

                var data = ` first=${this.first.value}&last=${this.last.value}&email=${this.email.value}`;

                var params = {
                    method: "POST",
                    body: encodeURI(data),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                };

                fetch('server3.php', params)

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