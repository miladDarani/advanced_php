<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>First Vue File</title>
</head>
<body>

<div id="main">

    <h1>{{ title }}</h1>

    <h2>{{ subtitle }}</h2>

    <p>{{ content }}</p>

    <div v-show="optional">

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat posuere mauris, in molestie mi. Mauris ac risus convallis, condimentum felis nec, faucibus urna. Etiam nec magna nec sem dapibus pellentesque. Suspendisse pulvinar sapien sit amet diam lobortis consequat. Nulla eu velit elit. Nullam et sapien risus. Maecenas sagittis erat felis. Morbi tincidunt quam fermentum nibh sollicitudin suscipit. Duis iaculis dolor vitae augue feugiat, nec imperdiet ligula feugiat. Vivamus a erat velit. Fusce quis nisi augue. Maecenas at hendrerit tortor, id hendrerit ipsum. Nunc laoreet turpis nunc, nec mattis mi semper nec. Proin a metus suscipit, sagittis ligula in, finibus nibh.</p>

    </div>

</div>

<!-- Javascript here -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>

var app = new Vue({
    el: '#main',
    data: {
        title: "My First Vue Script!",
        subtitle: "Using Vue seems complex but it's not!",
        content: "This is the content for my page.",
        optional: false
    }
});

</script>

</body>
</html>