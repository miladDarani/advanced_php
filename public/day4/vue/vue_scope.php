<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue Scope</title>
</head>
<body>
    <h1>Vue Scope</h1>

    <div id="one">
        
        <h1>{{ title }}</h1>        



    </div>
    <div id="two">
        

        <h1>{{ title }}</h1>
         <h1>{{ array }}</h1>

    </div>
    <div id="three">
        

        <h1>{{ title }}</h1>

    </div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    var app1 = new Vue({
        el: '#one',
        data : {
            title: 'This is the first scope'
        }
    });

    var app2 = new Vue({
        el: '#two',
        data : {
            title: 'This is the second scope',
            array:[1,2,3,4,5]
        }
    });

    var app3 = new Vue({
        el: '#three',
        data : {
            title: 'This is the third scope'
        }
    });


</script>
</body>
</html>