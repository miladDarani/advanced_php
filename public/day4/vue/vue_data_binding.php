<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data binding with Vue</title>
</head>
<body>
    <div id="main">
        <h1>{{ title }}</h1>

        <p><input type="text" v-model='title' placeholder="Enter a title"></p>
    </div>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    
    var app = new Vue({
        el:'#main',
        data:{
            title: "Main title"
        }
    })
</script>
</body>
</html>