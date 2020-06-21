<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ajax Form</title>

    <script>

        window.onload = function() {
            handleForm();
        }


        function handleForm()
        {
            var form = document.getElementById('register');

            form.addEventListener('submit', function(e){
                e.preventDefault();
                // console.log(this);
                var data = {};
                data.first = this.first.value;
                data.last = this.last.value;
                data.email = this.email.value;
                if(data.email.length == 0 || data.first.length == 0 || data.last.length == 0) {
                    alert('All form fields are required!');
                    return false;
                }
                // console.log(data);
                this.reset();
                sendData(data);
            });
        }



        function sendData(data)
        {
            var xhr = new XMLHttpRequest();

            xhr.open('POST', 'server6.php');

            xhr.onreadystatechange = function()
            {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.response);
                }
            }

            var json_data = JSON.stringify(data);

            xhr.send(json_data);
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