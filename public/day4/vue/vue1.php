<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue 1</title>
</head>
<body>

<div id="main">

    <h1>{{ title }} </h1>

    <h2>{{ subtitle }}</h2>

    <p>{{ content }}</p> 

    <div v-show='optional'>
        <p>This is a sentence ####</p>
    </div>

</div>


    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#main',
            data:{
                title: "My first vuew script",
                subtitle:" Using vue seem complex ",
                content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, aut corporis animi, autem consequatur sed, quaerat deleniti inventore odio eveniet velit voluptatibus cupiditate distinctio ex ducimus, nesciunt optio quo asperiores.",
                optional: true
            }
        });
    </script>
</body>
</html>