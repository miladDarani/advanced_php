# POST and GET from the Browser

1. `GET http://localhost/page.php`

2. `GET http://localhost/page.php?id=6`
    - All data sent in query string, must be URL Encoded
    - key=value pairs
    - separated by ampersand `&`
    - `id=6&cat=mystery&format=paper`
    - Accessibled in `$_GET` array in PHP

2. `POST Content-Type: x-www-form-urlencoded` Form Submission
    - `name=Dave&email=dave@example.com&age=12`
    - `$_POST`

3. `POST No Content Type Defined`
    - `{name: "Dave", email: "dave@example.com", age: 12}`
    - `php://input`
    - fopen, file_get_content

4. Unfortunately, no PUT, PATCH or DELETE natively from the Browser


