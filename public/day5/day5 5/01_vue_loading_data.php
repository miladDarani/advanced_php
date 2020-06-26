<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Vue Loading Data (with Axios)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css" />
    <style>
        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .user {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #cfcfcf;
        }

        .link {
            color: #3498eb;
            text-decoration: underline;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div id="app" class="container">

        <h1 class="title">{{ title }}</h1>

        <table class="table">

            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Registered</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="user in users">
                    <td v-text="user.id"></td>
                    <td v-text="user.first"></td>
                    <td v-text="user.last"></td>
                    <td class="link" v-text="user.email" v-on:click="showRecord(user)"></td>
                    <td v-text="user.created_at"></td>
                    <td><img v-bind:src="pic(user.email)" /></td>
                    <td><button class="button is-danger" v-on:click="deleteRecord(user.id)">Delete Record</button></td>
                </tr>

            </tbody>

        </table>

        

        <div v-show="user" class="modal is-active">
          <div class="modal-background"></div>
          <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <h1 class="title">{{ user.first}} {{ user.last }}</h1>

                    <p><img v-bind:src="pic(user.email)" /></p>

                </div>
          </div>
          </div>
          <button class="modal-close is-large" aria-label="close" v-on:click="user=false"></button>
        </div>

    </div><!-- /.container -->

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.16.0/js/md5.min.js"></script>
<script>

    var app = new Vue({
        el: '#app',
        data: {
            title: "Vue Loading Data (with Axios)",
            users: [],
            user: false
        },
        methods: {
            loadUsers: function() {
                
                var self = this;

                axios.get('users_server.php')
                    .then(function(response){
                        self.users = response.data;
                    })
                    .catch(function(errors){
                        console.error(error);
                    });
            },
            deleteRecord: function(id) {

                if(!confirm('Do you really want to delete this record?')) {
                    return;
                }

                // axios, post, delete record
                var self = this;

                axios.post('users_server_delete.php', {id: id})
                .then(function(response){
                    console.log(response.data);
                    self.loadUsers();
                })
                .catch(function(error){
                    console.error(error);
                });
            },
            showRecord: function(user) {
                this.user = user;
            },
            pic: function(email) {
                return 'https://www.gravatar.com/avatar/' + md5(email);
            }

        },
        mounted: function() {
            this.loadUsers();
        }
    });



</script>
</body>
</html>


<!-- 

https://www.gravatar.com/avatar/HASH

-->