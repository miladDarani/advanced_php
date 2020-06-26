# Coding Challenge

1. Copy the registration form we were using earlier... first, last, email

2. Set each field to v-model="first", etc... reflecting variables in the Vue data object;

```javascript
    data: {
        first: '',
        last: '',
        email: ''
    }
```

3. Create an eventListener on submit, and use Axios to submit the data to your register.sqlite.

```javascript
    axios.post('server.php', app.data );
```

