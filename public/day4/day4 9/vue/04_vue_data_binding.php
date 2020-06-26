<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Vue Data Binding</title>
</head>
<body>

<div id="main">

    <h1>{{ title }}</h1>


    <p><input type="text" v-model="title" placeholder="Enter a title" /></p>

</div>



<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>

    var app = new Vue({
        el: '#main',
        data: {
            title: 'This is the title',
            
        }
    });

</script>

</body>
</html>