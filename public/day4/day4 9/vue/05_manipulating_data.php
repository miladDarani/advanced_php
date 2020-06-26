<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Manipulating Data</title>
</head>
<body>

    <div id="main">

        <h1>{{ title }}</h1>

        <ul>
            <li v-for="name in names">{{ name }}</li>
        </ul>

        <p><input type="text" id="newname" />&nbsp;<button id="addname">Add Name</button></p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>

        var app = new Vue({
            el: '#main',
            data: {
                title: 'Manipulating Data',
                names: ['Aakash', 'Milad', 'Smily']
            }
        });


        document.getElementById('addname').addEventListener('click', function(e){

            var newname = document.getElementById('newname').value;
            document.getElementById('newname').value = '';

            app.names.push(newname);

        });

    </script>

</body>
</html>