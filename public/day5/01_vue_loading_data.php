<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue loading data with php</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">
    <style>
        .container {
            margin:50px auto;
        }
        .user {
            margin-bottom: 50px;
            border-bottom: 2px solid black
        }
    </style>
</head>
<body>

    <div id="app" class="container">
        <h1 class="title">{{title}}</h1>

        <ul v-for="user in users" class="user">
            <li><strong>Users ID: {{user.id}}</strong></li>
            <li><strong>First name: </strong>{{user.first}}</li>
            <li><strong>Last Name:</strong>{{user.last}}</li>
            <li><strong>Email: </strong>{{user.email}}</li>
            <li><strong>Register Date: </strong>{{user.created_at}}</li>
            <li><button v-on:click = delteRecord(user.id) class="button is-danger">Delete</button></li>
        </ul>
    </div>


<!-- VUE -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!-- AXIOS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<!-- Milad JS -->
<script>
    var app = new Vue({
        el:"#app",
        data:{
            title: "Vue loading data with php",
            users:[
            ]
        },
        methods: {
            loadUsers: function(){
                var self = this;
                axios.get('server3.php')
                    .then(function(response){
                        self.users= response.data
                    })
                    .catch(function(errors){
                        console.error(error);
                    })
            },
            delteRecord: function(id){
                if(!confirm('Do you really wanna delete')){;
                return} 
                //axios,post,delete record;
               var self = this;
               axios.post('user_server_delete.php', {id: id})
                    .then(function(response){
                        self.loadUsers();
                    })
                    .catch(function(error){
                        console.error(error)
                    })
            }
        },
        mounted: function(){
            this.loadUsers();
        }
    })
</script>
</body>
</html>