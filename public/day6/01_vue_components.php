<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <title>Task List Component</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
    <style>
        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>

    <div id="main" class="container">

        <h1 class="title">{{ title }}</h1>

        <h2 class="subtitle">User Emails</h2>
        
        <wdd-userlist></wdd-userlist>

    </div>

   
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>

    Vue.component('user', {
        template: `<li class="list-item"><slot></slot></li>`
    });

    Vue.component('wdd-userlist',{
        template: `<ul class="list">
            <user v-for="user in users">{{ user.email}}</user>
        </ul>`,
        data: function() {
            return {
                users: []
            }
        },
        methods: {
            getAllUsers: function(){
                var self = this;
                axios.get('users_server.php')
                    .then(function(response){
                        self.users = response.data;
                    })
                    .catch(function(error){
                        console.error(error);
                    });
            }
        },
        mounted: function(){
            this.getAllUsers();
        }
    });


    new Vue({
        el: '#main',
        data: {
            title: 'Loading Data From Component'
        }
    });

</script>
</body>
</html>