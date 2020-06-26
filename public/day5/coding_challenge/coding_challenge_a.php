<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Coding Challenge</title>
</head>
<body>

    <div id="main">

        <h1>Saving Data to Database</h1>

        <form id="register" v-on:submit="handleForm($event)">

        <p><label for="first">First name</label><br />
        <input id="first" type="text" name="first" v-model="first" /></p>

        <p><label for="last">Last name</label><br />
        <input id="last" type="text" name="last" v-model="last" /></p>

        <p><label for="email">Email</label><br />
        <input id="email" type="text" name="email" v-model="email" /></p>

        <p><button type="submit">Submit</button></p>

    </form>

    </div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>

    var app = new Vue({
        el: '#main',
        data: {
            first: '',
            last: '',
            email: ''
        },
        methods: {
            handleForm: function(e) {

                e.preventDefault();

                var self = this;

                axios.post('register.php', JSON.stringify(self.$data))
                .then(function(response){
                    console.log(self);
                    return response.data;
                })
                .then(function(data){
                    console.log(data)
                })
                .catch(function(error){
                    console.log(error);
                });
                
            }
        }

    });

    /*
    document.getElementById('register').addEventListener('submit', function(e){

        e.preventDefault();

        axios.post('register.php', JSON.stringify(app.$data))
        .then(function(response){
            return response.data;
        })
        .then(function(data){
            console.log(data)
        })
        .error(function(error){
            console.log(error);
        });

    })

    */

</script>
</body>
</html>