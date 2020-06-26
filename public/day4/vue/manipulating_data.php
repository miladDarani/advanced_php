<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manupilating Data</title>
</head>
<body>
    <h1>Manipulating Data</h1>
    <div id="main">
        
        <h1>{{ title }}</h1>

        <ul>
            <li v-for="name in names">{{ name }}</li>
        </ul>
        
        <p><input type="text" id="newname">&nbsp;<button id="btn">Add Name</button></p>&nbsp;
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        var app = new Vue({
            el:"#main",
            data: {
                title: "Manupliatinf Data with Vue",
                names:['Aakash', "Milad", "Smily"]
            }
        });

        document.getElementById('btn').addEventListener('click', function(){
            var newname = document.getElementById('newname').value;
            document.getElementById('newname').value = '';
            
            app.names.push(newname);
        })

    </script>
</body>
</html>