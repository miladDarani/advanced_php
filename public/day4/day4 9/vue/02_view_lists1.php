<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>

<div id="app">

    <h1>{{ title }}</h1>

    <ul id="list-1">
       <li v-for="name in names">{{ name }}</li>
    </ul>

    <ul id="list-2">
        <li v-for="value in names" v-text="value"></li>
    </ul>

</div>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>

    var app = new Vue({
        el: '#app',
        data: {
            title: 'Simple lists with Vue',
            names: ['Tom', 'Dave', 'Bill', 'Sally', 'Bonnie', 'Chuck']
        }
    });

</script>
</body>
</html>