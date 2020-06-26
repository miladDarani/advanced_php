<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Attribute Binding</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css" />
</head>
<body>

    <div id="app" class="container">

        <h1 class="title">{{ title }}</h1>

        <button class="button is-danger" :title="button1" :disabled="disabled">Hover over me!</button>&nbsp;
        <button class="button is-info" :title="button2" @click="disabled=true">Disable Button One</button>&nbsp;
        <button class="button is-warning" :title="button3" @click="disabled=false">Enable Button One</button>&nbsp;

    </div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>

    var app = new Vue({
        el: '#app',
        data: {
            title: "Attribute Binding",
            button1: "I am the best button!",
            button2: "Then why can I disable you?",
            button3: "Ha.  I am the best button!",
            disabled: false
        }
    });

</script>
</body>
</html>