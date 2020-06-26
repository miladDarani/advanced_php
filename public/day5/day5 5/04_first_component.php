<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>First Component</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css" />
</head>
<body>

    <div id="main" class="container">

        <h1 class="title">{{ title }}</h1>

        <task>Go to store</task>
        <task>Go to school</task>
        <task>Go to lunch</task>
        <task>Go home</task>
        <task>Go to movie</task>
        <task>Go to bed</task>

    </div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>

    // First component.  The name of the component matches
    // the name we used in the HTML
    // The slot captures any text within the component tags
    Vue.component('task', {
        template: `<li><slot></slot></li>`
    });

    var app = new Vue({
        el: '#main'
    });

</script>
</body>
</html>