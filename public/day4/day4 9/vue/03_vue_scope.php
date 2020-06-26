<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Vue Scope</title>
</head>
<body>

    <div id="one">
        <h1>{{ title }}</h1>
    </div>

    <div id="two">
        <h1>{{ title }}</h1>
    </div>

    <div id="three">
        <h1>{{ title }}</h1>
    </div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    var app1 = new Vue({
        el: '#one',
        data: {
            title: 'This is the first scope'
        }
    });

    var app2 = new Vue({
        el: '#two',
        data: {
            title: 'This is the second scope'
        }
    });

    var foobar = new Vue({
        el: '#three',
        data: {
            title: 'And this little piggie ran all the way home!'
        }
    })
</script>

</body>
</html>